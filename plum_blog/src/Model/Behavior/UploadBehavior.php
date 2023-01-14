<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Inflector;
use Cake\ORM\Behavior;
use Cake\Utility\Text;

class UploadBehavior extends Behavior
{
    protected $_defaultConfig = [
        'path' => WWW_ROOT,
        'folder' => 'upload',
        'field' => 'file',
    ];

    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        $config = $this->getConfig();

        if (isset($data[$config['field']])) {
            if (!$data[$config['field']]['error'] && $data[$config['field']]['size']) {
                $dirAbsolute = $config['path'] . str_replace('/', DS, $config['folder']);

                if (!is_dir($dirAbsolute)) {
                    $folder = new Folder();
                    if ($folder->create($dirAbsolute)) {
                        $folder->chmod($dirAbsolute, 0755, true);
                    }
                }
            }
        }

        $extension = explode('.', $data[$config['field']]['name']);
        $extension = $extension[1];

        $name = time() . '-' . Text::slug(str_replace(".{$extension}", '', $data[$config['field']]['name'])) . "{$extension}";

        $file = new File($dirAbsolute . DS . $name, false, 0644);
        $file->create();
        $file->write(file_get_contents($data[$config['field']]['tmp_name']));
        $file->close();

        $data[$config['field']] = DS . $config['folder'] . DS . $name;
    }
}

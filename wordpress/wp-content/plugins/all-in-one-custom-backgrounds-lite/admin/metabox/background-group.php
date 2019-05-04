<?php

// Background Type 
$fpbgType = "t";
$fpbgTypePrefix = $fpbgType . "_";

$backgroundGroupMetabox = array(
    'id' => 'aiocb_mb_bggroup',
    'types' => array('backgroundgroup'),
    'title' => 'Backgrounds',
    'priority' => 'high',
    'template' => array(
        array(
            'type' => 'group',
            'repeating' => false,
            'sortable' => false,
            'length' => 1,
            'name' => 'bg',
            'title' => 'Background',
            'fields' => include plugin_dir_path(__FILE__) . 'includes/fields.php',
        ),
        array(
            'type' => 'notebox',
            'name' => 'n',
            'label' => 'Pro Version Available',
            'description' => '<p>Learn more about the <a href="http://q.gs/83pjw">pro version</a> with additional support and features:</p>'
                . '<ul style="list-style: initial;"><li>Background image galleries</li>'
                . '<li>Vimeo support</li>'
                . '<li>Self-hosted video support</li>'
                . '<li>HD support for YouTube</li>'
                . '<li>Playlist out of YouTube videos</li>'
                . '<li>User restrictions</li>'
                . '<li>Support</li></ul>',
            'status' => 'normal',
        )
    )
);


return $backgroundGroupMetabox;
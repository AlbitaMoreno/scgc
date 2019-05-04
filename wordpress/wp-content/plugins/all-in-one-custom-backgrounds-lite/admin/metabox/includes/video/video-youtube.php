<?php

$fpbgVideoYoutube = array(
    array(
        'type'      => 'group',
        'repeating' => false,
        'sortable'  => false,
        'length'    => 1,
        'name'      => 'ytvg',
        'title'     => 'Youtube Video',
        'fields'    => array(),
        'dependency' => $fpbgTypeVideoYoutubeDependency,
    ),
);

fpbgAppend(include plugin_dir_path( __FILE__ ) . 'include/video-youtube.php', $fpbgVideoYoutube[0]['fields']);

return $fpbgVideoYoutube;
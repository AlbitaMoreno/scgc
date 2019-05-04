<?php

$fields = array(
    array(
        'type' => 'textbox',
        'name' => 's',
        'label' => 'Selector',
        'description' => 'Selector of element(s) where the background will be assigned.',
        'default' => 'body',
        'dependency' => array(
            'field'    => 't',
            'function' => 'is_not_video_type',
        )
    ),
    array(
        'type' => 'notebox',
        'name' => 'n',
        'label' => 'Selector "body" will be used.',
        'description' => 'Background video types only working in conjunction with "body" selector.',
        'status' => 'info',
        'dependency' => array(
            'field'    => 't',
            'function' => 'is_video_type',
        )
    ),
    array(
        'type' => 'select',
        'name' => $fpbgType,
        'label' => 'Type',
        'description' => 'Type of background for selection.',
        'items' => array(
            array(
                'value' => 'color',
                'label' => 'Color',
            ),
            array(
                'value' => 'gradient',
                'label' => 'Gradient',
            ),
            array(
                'value' => 'image',
                'label' => 'Image',
            ),
            array(
                'value' => 'video-youtube',
                'label' => 'Youtube Video',
            ),
        ),
        'default' => array(
            'color',
        ),
    ),
);

// Color Type
$fpbgTypeColorDependency = array(
    'field'    => $fpbgType,
    'function' => 'is_color',
);
$fpbgTypeColor = include plugin_dir_path( __FILE__ ) . 'color/color.php';
fpbgAppend($fpbgTypeColor, $fields);

// Gradient Type
$fpbgTypeGradientDependency = array(
    'field'    => $fpbgType,
    'function' => 'is_gradient',
);
$fpbgTypeGradient = include plugin_dir_path( __FILE__ ) . 'color/color-gradient.php';
fpbgAppend($fpbgTypeGradient, $fields);

// Image Type
$fpbgTypeImageDependency = array(
    'field'    => $fpbgType,
    'function' => 'is_image',
);
$fpbgTypeImage = include plugin_dir_path( __FILE__ ) . 'image/image.php';
fpbgAppend($fpbgTypeImage, $fields);

// Video Youtube Type
$fpbgTypeVideoYoutubeDependency = array(
    'field'    => $fpbgType,
    'function' => 'is_video_youtube',
);
$fpbgTypeVideoYoutube = include plugin_dir_path( __FILE__ ) . 'video/video-youtube.php';
fpbgAppend($fpbgTypeVideoYoutube, $fields);

// Restriction
$fpbgRestriction = include plugin_dir_path( __FILE__ ) . 'restriction.php';
fpbgAppend($fpbgRestriction, $fields);

return $fields;
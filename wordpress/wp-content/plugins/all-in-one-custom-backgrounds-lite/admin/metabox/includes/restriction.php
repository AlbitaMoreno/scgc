<?php

return array(
    array(
        'type' => 'notebox',
        'name' => 'ndt',
        'label' => 'Device Restriction is set to not mobile.',
        'description' => 'Background video types are only visible on non-mobile devices.',
        'status' => 'info',
        'dependency' => array(
            'field' => 't',
            'function' => 'is_video_type',
        )
    ),
    array(
        'type' => 'toggle',
        'name' => 'dr',
        'label' => 'Device Restriction',
        'description' => 'Background will be visible only with some devices.',
        'default' => '0',
        'dependency' => array(
            'field' => 't',
            'function' => 'is_not_video_type',
        )
    ),
    array(
        'type' => 'radiobutton',
        'name' => 'dt',
        'label' => 'Device Type',
        'description' => 'Background will be visible only on mobile or non-mobile devices.',
        'items' => array(
            array(
                'value' => 'mobile',
                'label' => 'Mobile',
            ),
            array(
                'value' => 'not-mobile',
                'label' => 'Not Mobile',
            ),
        ),
        'dependency' => array(
            'field' => 'dr',
            'function' => 'is_enabled'
        )
    )
);
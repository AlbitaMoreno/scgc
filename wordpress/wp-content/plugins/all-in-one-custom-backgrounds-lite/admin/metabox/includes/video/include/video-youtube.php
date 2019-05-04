<?php

return array(
    array(
        'type' => 'textbox',
        'name' => 'yt',
        'label' => 'Url/ID',
        'description' => 'Insert youtube url or id of video.',
    ),
    array(
        'type' => 'toggle',
        'name' => 'ap',
        'label' => 'Autoplay',
        'description' => 'Start video automatically.',
        'default' => '1',
    ),
    array(
        'type' => 'toggle',
        'name' => 'm',
        'label' => 'Mute',
        'description' => 'Mute the audio of video.',
        'default' => '1',
    ),
    array(
        'type' => 'slider',
        'name' => 'v',
        'label' => 'Volume',
        'description' => 'Volume level of video.',
        'min' => '1',
        'max' => '100',
        'step' => '1',
        'default' => '50',
        'dependency' => array(
            'field'    => 'm',
            'function' => 'is_disabled',
        ),
    ),
    array(
        'type' => 'toggle',
        'name' => 'l',
        'label' => 'Loop',
        'description' => 'Loop video once ended.',
        'default' => '1',
    ),
    array(
        'type' => 'toggle',
        'name' => 'sc',
        'label' => 'Show Controls',
        'description' => 'Show or hide controls of video player.',
        'default' => '0',
    ),
    array(
        'type' => 'select',
        'name' => 'r',
        'label' => 'Ratio',
        'description' => 'Aspect ratio of the video.',
        'items' => array(
            array(
                'value' => '16/9',
                'label' => '16/9',
            ),
            array(
                'value' => '4/3',
                'label' => '4/3',
            ),
        ),
        'default' => array(
            '16/9',
        ),
    ),
    array(
        'type' => 'textbox',
        'name' => 'sa',
        'label' => 'Start Time',
        'description' => 'Time in seconds where the video should start.',
        'default' => '0',
    ),
    array(
        'type' => 'textbox',
        'name' => 'ea',
        'label' => 'Stop Time',
        'description' => 'Time in seconds where the video should stop.',
        'default' => '0',
    ),
    array(
        'type' => 'slider',
        'name' => 'o',
        'label' => 'Opacity',
        'description' => 'Opacity of video to background behind.',
        'min' => '0.1',
        'max' => '1',
        'step' => '0.01',
        'default' => '1',
    ),
    array(
        'type' => 'select',
        'name' => 'q',
        'label' => 'Quality',
        'description' => 'Quality of video streaming.',
        'items' => array(
            array(
                'value' => 'default',
                'label' => 'Default',
            ),
            array(
                'value' => 'small',
                'label' => 'Small',
            ),
            array(
                'value' => 'medium',
                'label' => 'Medium',
            ),
            array(
                'value' => 'large',
                'label' => 'Large',
            )
        ),
        'default' => array(
            'default',
        ),
    ),
);
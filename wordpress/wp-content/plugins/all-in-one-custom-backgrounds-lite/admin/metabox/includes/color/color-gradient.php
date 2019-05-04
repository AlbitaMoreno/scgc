<?php

return array(
    array(
        'type'      => 'group',
        'repeating' => false,
        'length'    => 1,
        'name'      => 'gg',
        'title'     => 'Gradient',
        'fields'    => array(
            array(
                'type' => 'color',
                'name' => 'sc',
                'label' => 'Start Colorpicker',
                'description' => 'Pick start color or insert color as hex value.',
                'default' => 'rgba(238,238,238,1)',
                'format' => 'rgba',
            ),
            array(
                'type' => 'color',
                'name' => 'ec',
                'label' => 'End Colorpicker',
                'description' => 'Pick end color or insert color as hex value.',
                'default' => 'rgba(238,238,238,1)',
                'format' => 'rgba',
            ),
            array(
                'type' => 'select',
                'name' => 'o',
                'label' => 'Orientation',
                'description' => 'Orientation from start color to end color.',
                'items' => array(
                    array(
                        'value' => 'horizontal',
                        'label' => '→ Horizontal',
                    ),
                    array(
                        'value' => 'vertical',
                        'label' => '↓ Vertical',
                    ),
                    array(
                        'value' => 'diagonal-tl-to-br',
                        'label' => '↘ Diagonal',
                    ),
                    array(
                        'value' => 'diagonal-bl-to-tr',
                        'label' => '↗ Diagonal',
                    ),
                    array(
                        'value' => 'radial',
                        'label' => 'o Radial',
                    ),
                ),
                'default' => array(
                    'horizontal',
                ),
            ),
        ),
        'dependency' => $fpbgTypeGradientDependency,
    ),
);
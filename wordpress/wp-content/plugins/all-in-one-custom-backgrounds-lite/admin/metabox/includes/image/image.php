<?php

$fpbgIsAdvancedDependency = array(
    'field'    => 'm',
    'function' => 'is_custom',
);

return array(
    array(
        'type'      => 'group',
        'repeating' => false,
        'length'    => 1,
        'name'      => 'ig',
        'title'     => 'Image',
        'fields'    => array(
            array(
                'type' => 'upload',
                'name' => 'src',
                'label' => 'Url',
                'description' => 'Image from media library, upload or url.',
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'm',
                'label' => 'Mode',
                'description' => 'Mode for customization of image. Default mode stretchs background image to fullscreen.',
                'items' => array(
                    array(
                        'value' => 'stretch',
                        'label' => 'Stretch',
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom',
                    ),
                ),
                'default' => array(
                    'stretch',
                ),
            ),
            array(
                'type'      => 'group',
                'repeating' => false,
                'sortable'  => false,
                'length'    => 1,
                'name'      => 'pg',
                'title'     => 'Position',
                'fields'    => array(
                    array(
                        'type' => 'select',
                        'name' => 'h',
                        'label' => 'Horizontal',
                        'description' => 'Horizontal position of image.',
                        'items' => array(
                            array(
                                'value' => 'left',
                                'label' => 'Left',
                            ),
                            array(
                                'value' => 'center',
                                'label' => 'Center',
                            ),
                            array(
                                'value' => 'right',
                                'label' => 'Right',
                            ),
                        ),
                        'default' => array(
                            'center',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'name' => 'v',
                        'label' => 'Vertical',
                        'description' => 'Vertical position of image.',
                        'items' => array(
                            array(
                                'value' => 'top',
                                'label' => 'Top',
                            ),
                            array(
                                'value' => 'center',
                                'label' => 'Center',
                            ),
                            array(
                                'value' => 'bottom',
                                'label' => 'Bottom',
                            )
                        ),
                        'default' => array(
                            'center',
                        ),
                    ),
                ),
                'dependency' => $fpbgIsAdvancedDependency,
            ),
            array(
                'type' => 'select',
                'name' => 'r',
                'label' => 'Repeat',
                'description' => 'Sets if/how image will be repeated.',
                'items' => array(
                    array(
                        'value' => 'repeat',
                        'label' => 'Repeat',
                    ),
                    array(
                        'value' => 'repeat-x',
                        'label' => 'Repeat X',
                    ),
                    array(
                        'value' => 'repeat-y',
                        'label' => 'Repeat Y',
                    ),
                    array(
                        'value' => 'no-repeat',
                        'label' => 'No Repeat',
                    )
                ),
                'default' => array(
                    'repeat',
                ),
                'dependency' => $fpbgIsAdvancedDependency,
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'b',
                'label' => 'Behavior',
                'description' => 'Image is fixed or scrolls with the rest of the page.',
                'items' => array(
                    array(
                        'value' => 'scroll',
                        'label' => 'Scroll',
                    ),
                    array(
                        'value' => 'fixed',
                        'label' => 'Fixed',
                    ),
                ),
                'default' => array(
                    'scroll',
                ),
                'dependency' => $fpbgIsAdvancedDependency,
            ),
            array(
                'type' => 'textarea',
                'name' => 'css',
                'label' => 'CSS Properties',
                'description' => 'Define or overwrite custom CSS properties.',
                'height' => '200',
                'dependency' => $fpbgIsAdvancedDependency,
            ),
        ),
        'dependency' => $fpbgTypeImageDependency,
    )
);
<?php

return array(
    'title' => 'All-in-One Custom Backgrounds Lite',
    'logo' => plugin_dir_url(__FILE__) . '../images/thumbnail.png',
    'menus' => array(
        array(
            'title' => 'Background Options',
            'name' => 'aiocb',
            'icon' => 'font-awesome:fa-cogs',
            'controls' => array(
                array(
                    'type' => 'select',
                    'name' => 'default',
                    'label' => __('Default Background Group'),
                    'items' => array(
                        'data' => array(
                            array(
                                'source' => 'function',
                                'value' => 'aiocb_get_backgroundGroups'
                            )
                        )
                    )
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
        )
    )
);
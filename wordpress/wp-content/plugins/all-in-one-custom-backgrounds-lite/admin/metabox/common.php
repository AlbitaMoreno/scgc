<?php

// Background Type 
$fpbgType = "t";
$fpbgTypePrefix = $fpbgType . "_";

$fpbg_post_types = array('moewe_smart_snippets', 'portfolio');
if (isset($_REQUEST['post_type'])) {
    $fpbg_post_types[] = $_REQUEST['post_type'];
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit' && isset($_REQUEST['post'])) {
    $fpbg_post_type = get_post_type($_REQUEST['post']);
    $fpbg_post_types[] = $fpbg_post_type;
}

$fpbg_post_types = array_merge(
    $fpbg_post_types,
    get_post_types(array('capability_type' => 'post'), 'names'),
    get_post_types(array('capability_type' => 'page'), 'names')
);

$fpbg_background_group_key = array_search('backgroundgroup', $fpbg_post_types);
if ($fpbg_background_group_key !== false) {
    unset($fpbg_post_types[$fpbg_background_group_key]);
}

$commonMetabox = array(
    'id' => 'aiocb_mb_common',
    'types' => $fpbg_post_types,
    'title' => 'Background',
    'priority' => 'high',
    'template' => array(
        array(
            'type' => 'radiobutton',
            'name' => 'bgg',
            'label' => 'Background Group',
            'items' => array(
                array(
                    'value' => 'default',
                    'label' => 'Default',
                ),
                array(
                    'value' => 'group',
                    'label' => 'Group',
                ),
                array(
                    'value' => 'custom',
                    'label' => 'Custom',
                ),
                array(
                    'value' => 'none',
                    'label' => 'None',
                ),
            ),
            'default' => array(
                'global',
            ),
        ),
        array(
            'type' => 'select',
            'name' => 'g',
            'label' => 'Group',
            'items' => array(
                'data' => array(
                    array(
                        'source' => 'function',
                        'value' => 'aiocb_get_backgroundGroups',
                    ),
                ),
            ),
            'dependency' => array(
                'field' => 'bgg',
                'function' => 'is_group',
            )
        ),
        array(
            'type' => 'group',
            'repeating' => false,
            'sortable' => false,
            'length' => 1,
            'name' => 'bg',
            'title' => 'Background',
            'fields' => include plugin_dir_path(__FILE__) . 'includes/fields.php',
            'dependency' => array(
                'field' => 'bgg',
                'function' => 'is_custom',
            )
        )
    )
);

return $commonMetabox;
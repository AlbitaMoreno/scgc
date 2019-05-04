<?php
/*
Plugin Name: All-in-One Custom Backgrounds Lite
Plugin URI: http://demo.moewe-studio.com/wp/easy-custom-backgrounds/?utm_source=wp_backend
Description: All-in-One Custom Backgrounds Lite allows you to define separate backgrounds for each post or page. There is also a <a href="http://q.gs/83pjw" target="_blank">pro version</a> with support and more features available.
Version: 2.2.2
Author: MOEWE GbR
Author URI: http://www.moewe-studio.com/?utm_source=wp_backend
*/


if (!defined('ABSPATH')) {
    die("Don't touch this.");
}

class All_In_One_Custom_Backgrounds_Lite
{
    private $backgroundMeta = null;
    private $version = '2.2.2';

    function __construct()
    {
        register_activation_hook(__FILE__, array($this, 'table_update'));

        add_action('init', array($this, 'register_backgroundgroup_type'));
        add_action('after_setup_theme', array($this, 'after_setup_theme'), 1000, 0);
        add_action('wp_enqueue_scripts', array($this, 'init_scripts'));

        if (is_admin()) {
            add_filter('plugin_row_meta', array($this, 'plugin_row_meta'), 10, 2);
            add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'plugin_action_links'), 10, 1);
        }
    }

    function table_update()
    {
        global $wpdb;
        $version = get_option('aiocb_db_version', 0);
        if ($version < 1) {
            add_option("aiocb_db_version", 1);
            $table_name = $wpdb->prefix . 'postmeta';
            $wpdb->update(
                $table_name,
                array('meta_key' => 'aiocb_mb_common'),
                array('meta_key' => 'ecbgs')
            );
        }
    }


    /**
     * Add additional useful links.
     * @param $links array Already existing links.
     * @param $file string The current file.
     * @return array Links including new ones.
     */
    function plugin_row_meta($links, $file)
    {
        if (strpos($file, plugin_basename(__FILE__)) !== false) {
            return array_merge(
                $links,
                array(
                    '<a href="http://demo.moewe-studio.com/wp/all-in-one-custom-backgrounds/?utm_source=wp_backend" target="_blank">' . __('Documentation', 'all-in-one-custom-backgrounds-lite') . '</a>',
                    '<a href="http://q.gs/83pjw" target="_blank">' . __('Get Pro Version', 'all-in-one-custom-backgrounds-lite') . '</a>'
                )
            );
        }
        return $links;
    }

    function plugin_action_links($links)
    {
        if (defined('VP_VERSION')) {
            $links[] = '<a href="' . admin_url('edit.php?post_type=backgroundgroup') . '">Groups</a>';
            $links[] = '<a href="' . admin_url('themes.php?page=all-in-one-custom-backgrounds') . '">Options  </a>';
        } else {
            $links[] = '<br /><a href="' . admin_url('themes.php?page=tgmpa-install-plugins') . '" style="color: red;">Please install required Vafpress</a>';
        }

        return $links;
    }

    function after_setup_theme()
    {
        require_once "modules/tgm-plugin-activation.php";

        if (!defined('VP_VERSION')) {
            return;
        }

        function fpbgAppend($type, &$fields)
        {
            foreach ($type as $typeField) {
                array_push($fields, $typeField);
            }
        }

        require_once plugin_dir_path(__FILE__) . 'admin/data_sources.php';

        new VP_Metabox(plugin_dir_path(__FILE__) . 'admin/metabox/common.php');
        new VP_Metabox(plugin_dir_path(__FILE__) . 'admin/metabox/background-group.php');

        new VP_Option(
            array(
                'option_key' => 'aiocb_options',
                'page_slug' => 'all-in-one-custom-backgrounds',
                'template' => plugin_dir_path(__FILE__) . 'admin/option.php',
                'menu_page' => 'themes.php',
                'use_util_menu' => false,
                'layout' => 'fluid',
                'page_title' => __('Background Options', 'all-in-one-custom-backgrounds-lite'),
                'menu_label' => __('Background Options', 'all-in-one-custom-backgrounds-lite')
            )
        );
    }

    function register_backgroundgroup_type()
    {
        register_post_type('backgroundgroup',
            array(
                'labels' => array(
                    'name' => __('Background Group', 'all-in-one-custom-backgrounds-lite'),
                    'singular_name' => __('Background Group', 'all-in-one-custom-backgrounds-lite'),
                    'add_new_item' => __('Add New Background Group', 'all-in-one-custom-backgrounds-lite'),
                    'edit_item' => __('Edit Background Group', 'all-in-one-custom-backgrounds-lite'),
                ),
                'show_ui' => true,
                'show_in_menu' => 'themes.php',
                'supports' => array('title'),
                'menu_position' => 1,
                'publicly_queryable' => false,
                'public' => false
            )
        );
    }

    private function get_background_group_metabox($backgroundGroup)
    {
        global $post;
        $tempPost = $post;
        $post = $backgroundGroup;
        $meta = vp_metabox('aiocb_mb_bggroup');
        $post = $tempPost;
        return $meta;
    }

    private function get_default_background_group_metabox()
    {
        $options = vp_option('aiocb_options');
        return $this->get_the_background_group_metabox($options['default']);
    }

    private function get_the_background_group_metabox($postId)
    {
        $backgroundGroup = get_post($postId);
        return $this->get_background_group_metabox($backgroundGroup);
    }

    public function get_background_meta()
    {
        if (!defined('VP_VERSION')) {
            return;
        }

        if ($this->backgroundMeta == null) {
            $commonMetabox = vp_metabox('aiocb_mb_common');
            if (is_array($commonMetabox->meta)) {

                switch ($commonMetabox->meta['bgg']) {
                    case 'custom':
                        $this->backgroundMeta = $commonMetabox->meta;
                        break;
                    case 'group':
                        $groupId = $commonMetabox->meta['g'];
                        $this->backgroundMeta = $this->get_the_background_group_metabox($groupId)->meta;
                        break;
                    case 'none':
                        break;
                    default:
                        // BEGIN SUPPORT VERSION < 1.1.1
                        if ($commonMetabox->meta['a'] == 1) {
                            $this->backgroundMeta = $commonMetabox->meta;
                        } else {
                            // END
                            $this->backgroundMeta = $this->get_default_background_group_metabox()->meta;
                        }
                        break;
                }
            } else {
                $this->backgroundMeta = $this->get_default_background_group_metabox()->meta;
            }
        }


        return $this->backgroundMeta;
    }

    public function has_background_meta()
    {
        $meta = $this->get_background_meta();
        return is_array($meta) && sizeof($meta) > 0;
    }

    public function get_meta_value($path, $default = null)
    {
        $array = $this->get_background_meta();

        if (!empty($path)) {
            $keys = explode('.', $path);
            foreach ($keys as $key) {
                if (isset($array[$key])) {
                    $array = $array[$key];
                } else {
                    return $default;
                }
            }
        }

        return $array;
    }

    function init_scripts()
    {
        $videoType = null;
        $hasImageType = false;

        if ($this->has_background_meta()) {
            $backgroundsKey = 'bg';
            $backgrounds = $this->get_meta_value($backgroundsKey);
            $backgroundsPrefix = $backgroundsKey . '.';
            $backgroundsSize = sizeof($backgrounds);
            if ($backgroundsSize > 0) {
                for ($i = 0; $i < $backgroundsSize; $i++) {
                    $backgroundPrefix = $backgroundsPrefix . $i . '.';
                    if (fpbg_is_visible($backgroundPrefix)) :

                        $type = $this->get_meta_value($backgroundPrefix . 't');

                        if ($videoType == null && strpos($type, 'video') !== false) :
                            $videoType = $type;
                        elseif (!$hasImageType && strpos($type, 'image') !== false) :
                            $hasImageType = true;
                        endif;
                    endif;
                }
            }
        }

        if ($hasImageType) {
            // Image Gallery - Backstretch
            wp_enqueue_script(
                'ecbg-backstretch',
                plugins_url('/assets/javascript/jquery.backstretch.min.js', __FILE__),
                array('jquery'), $this->version
            );
        }

        if ($videoType == 'video-youtube') :
            wp_enqueue_script(
                'ecbg-ytplayer',
                plugins_url('/assets/javascript/jquery.mb.YTPlayer.js', __FILE__),
                array('jquery'), $this->version
            );
            wp_enqueue_style('ecbg-ytplayer', plugins_url('/assets/css/YTPlayer.css', __FILE__), array(), $this->version);
        endif;
    }
}


$aiocb = new All_In_One_Custom_Backgrounds_Lite();

function fpbg_value($value, $default = '')
{
    if (isset($value) && $value != '') {
        return $value;
    }
    return $default;
}

function fpbg_b_value($value)
{
    if (isset($value) && $value == 1) {
        return "true";
    }
    return "false";
}

function fpbg_metabox_value($key, $default = '')
{
    global $aiocb;
    return $aiocb->get_meta_value($key, $default);
}

function fpbg_metabox_is_enabled($key, $default)
{
    return (fpbg_metabox_value($key, $default) == '1');
}

function fpbg_is_visible($backgroundPrefix)
{
    global $current_user, $aiocb;

    $isVisibleForDevice = true;
    $isVisibleForUser = true;

    if (fpbg_metabox_is_enabled($backgroundPrefix . 'dr', '0')) {

        $isMobile = include plugin_dir_path(__FILE__) . 'includes/detectmobilebrowser.php';

        $deviceType = $aiocb->get_meta_value($backgroundPrefix . 'dt');
        if (($deviceType == 'mobile' && !$isMobile) ||
            ($deviceType == 'not-mobile' && $isMobile)
        ) {
            $isVisibleForDevice = false;
        }

    }

    if (fpbg_metabox_is_enabled($backgroundPrefix . 'ur', '0')) {

        $isVisible = fpbg_metabox_is_enabled($backgroundPrefix . 'urg.0.v', '0');

        $hasRole = false;
        $hasUserId = false;

        $roles = $aiocb->get_meta_value($backgroundPrefix . 'urg.0.r');
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if (in_array($role, $current_user->roles)) {
                    $hasRole = true;
                    break;
                }
            }
        }

        if (!$hasRole) {
            $userIds = $aiocb->get_meta_value($backgroundPrefix . 'urg.0.u');
            if (is_array($userIds)) {
                foreach ($userIds as $userId) {
                    if ($userId == $current_user->ID) {
                        $hasUserId = true;
                        break;
                    }
                }
            }
        }

        $isRestrictedUser = ($hasRole || $hasUserId);
        $isVisibleForUser = ($isVisible && $isRestrictedUser) || (!$isVisible && !$isRestrictedUser);
    }

    return ($isVisibleForDevice && $isVisibleForUser);
}

function fpbg_video_youtube_json($values, $selector)
{
    return '{videoURL: \'' . $values["videoURL"] . '\', containment: \'' . $selector . '\', autoPlay: ' . $values['autoPlay'] . ', mute: ' . $values['mute'] . (isset($values['startAt']) && $values['startAt'] != '' ? (', startAt: ' . $values['startAt']) : '') . (isset($values['stopAt']) && $values['stopAt'] != '' ? (', stopAt: ' . $values['stopAt']) : '') . ', opacity: ' . $values['opacity'] . ', showControls: ' . $values['showControls'] . ', loop: ' . $values['loop'] . ', ratio: \'' . $values['ratio'] . '\', quality: \'' . $values['quality'] . '\', vol: ' . $values['vol'] . ', realfullscreen: false}';
}

require_once plugin_dir_path(__FILE__) . 'includes/head.php';
require_once plugin_dir_path(__FILE__) . 'includes/footer.php';

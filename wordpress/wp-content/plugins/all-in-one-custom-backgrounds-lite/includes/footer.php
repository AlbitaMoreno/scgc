<?php

add_action( 'wp_footer', 'fpbg_footer' );

function fpbg_footer(){
    global $aiocb;

    if (!defined('VP_VERSION') && !$aiocb->has_background_meta()) {
        return;
    }

    $hasVideoType = false;
    
    // Video Youtube
    $isMobile = include plugin_dir_path( __FILE__ ) . 'detectmobilebrowser.php';
	
    $backgroundsPrefix = 'bg';
    $backgrounds = $aiocb->get_meta_value( $backgroundsPrefix );
    $backgroundsSize = sizeof($backgrounds);
      
    if ($backgroundsSize > 0) : 

        for ($i = 0; $i < $backgroundsSize; $i++) : 
            
            $backgroundPrefix = $backgroundsPrefix . '.' . $i . '.';

            if(fpbg_is_visible( $backgroundPrefix )) :
                $type = fpbg_metabox_value($backgroundPrefix.'t');
                if( $type == 'image' && fpbg_metabox_value($backgroundPrefix.'ig.0.m','stretch') == 'stretch' ) :
                    require_once plugin_dir_path( __FILE__ ) . 'footer/image/image.php';
                    fpbg_footer_image( $backgroundPrefix . 'ig.0.', fpbg_metabox_value( $backgroundPrefix.'s', 'body' ) );
                elseif ($type == 'video-youtube' && !$isMobile && !$hasVideoType ) :
                    require_once plugin_dir_path( __FILE__ ) . 'footer/video/video-youtube.php';
                    fpbg_footer_video_youtube( $backgroundPrefix );
                    $hasVideoType= true;
                endif; ?>
            <?php endif;  ?>
        <?php  endfor; ?>
    <?php endif;  ?> 
<?php }
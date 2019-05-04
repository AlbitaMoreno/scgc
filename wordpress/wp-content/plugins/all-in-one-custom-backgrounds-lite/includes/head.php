<?php

add_action( 'wp_head', 'fpbg_head' );

function fpbg_head(){
    global $aiocb;
            
    if (!defined('VP_VERSION') && !$aiocb->has_background_meta()) {
        return;
    }

    $backgroundsPrefix = 'bg';
    $backgrounds = $aiocb->get_meta_value( $backgroundsPrefix );
    $backgroundsSize = sizeof($backgrounds);

    if ($backgroundsSize > 0) :

        for ($i = 0; $i < $backgroundsSize; $i++) :

            $backgroundPrefix = $backgroundsPrefix . '.' . $i . '.';

            if(fpbg_is_visible( $backgroundPrefix )) :

                $selector = fpbg_metabox_value($backgroundPrefix.'s', 'body');

                $selectorArray = explode( ",", $selector );

                $hasBodySelector = false;

                foreach ($selectorArray as $selectorValue) :
                    if(trim($selectorValue) == 'body'){
                        $hasBodySelector = true;
                        break;
                    }
                endforeach;

    $type = fpbg_metabox_value($backgroundPrefix.'t');
                    
    ?>
    <style type="text/css">

         <?php
        // Gradient
        if ($type == 'gradient' ) :?>
        body {
            background-attachment: fixed !important;
        }
        <?php
        // Video Youtube
        elseif ($type == 'video-youtube') :
            include plugin_dir_path( __FILE__ ) . 'head/video/youtube.php'; ?>
            
         <?php  endif;  ?>
        
        <?= $selector ?> {

            <?php
            // Color
            if ($type == 'color' ) : ?>
               background-color: <?= fpbg_metabox_value($backgroundPrefix.'cg.0.cp','#EEEEEE') ?>;
               
            <?php
            // Gradient
            elseif ($type == 'gradient' ) :
                require_once plugin_dir_path( __FILE__ ) . 'head/color/color-gradient.php';
                fpbg_head_gradient( $backgroundPrefix . 'gg.0.' ); ?>

            <?php
            // Image
            elseif ($type == 'image' && fpbg_metabox_value($backgroundPrefix.'ig.0.m','stretch') == 'custom') :
                include plugin_dir_path( __FILE__ ) . 'head/image/image.php'; ?>
            <?php  endif;  ?>
        }

    </style>

                <?php  endif;  ?>
            <?php  endfor; ?>
        <?php endif;  ?>
<?php }
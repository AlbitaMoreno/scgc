<?php

function fpbg_footer_video_youtube( $prefix ) {
    
    $videoYoutubePrefix = $prefix.'ytvg.0.'; 
    
    $videoYoutube = array (
        'videoURL' => fpbg_metabox_value( $videoYoutubePrefix.'yt', ''),
        'autoPlay' => fpbg_b_value(fpbg_metabox_value(  $videoYoutubePrefix.'ap', 1)),
        'mute' => fpbg_b_value(fpbg_metabox_value( $videoYoutubePrefix.'m', 1)),
        'opacity' => fpbg_metabox_value( $videoYoutubePrefix.'o', 1),
        'startAt' => fpbg_metabox_value( $videoYoutubePrefix.'sa', 0),
        'stopAt' => fpbg_metabox_value( $videoYoutubePrefix.'ea', 0),
        'showControls' => fpbg_b_value(fpbg_metabox_value( $videoYoutubePrefix.'sc', 0)),
        'loop' => fpbg_b_value(fpbg_metabox_value( $videoYoutubePrefix.'l', 1)),
        'ratio' => fpbg_metabox_value( $videoYoutubePrefix.'r', '16/9'),
        'quality' => fpbg_metabox_value( $videoYoutubePrefix.'q', 'default'),
        'vol' => fpbg_metabox_value( $videoYoutubePrefix.'v', 50),
    );
    
    ?>

    <script>
        jQuery(function(){
            <?php $selector = 'body' ?>
            
            var selector = jQuery('<?= $selector ?>');
            var dataPropertyValue = "<?=fpbg_video_youtube_json( $videoYoutube, $selector ) ?>";
            selector.attr("data-property", dataPropertyValue);
            var timer; // prevent black screen on video loading
            
            selector.on( "YTPUnstarted", function() {
                clearTimeout(timer);
                jQuery( '.mbYTP_wrapper' , this ).css('visibility','hidden');
            });

            selector.on( "YTPStart", function() {
                var self = this;
                timer = setTimeout(function(){ jQuery( '.mbYTP_wrapper' , self ).css('visibility','visible'); }, 1000);
            });

            selector.on( "YTPBuffering", function() {
                clearTimeout(timer);
                jQuery( '.mbYTP_wrapper' , this ).css('visibility','hidden');
            });
            
            selector.YTPlayer();
        });
    </script>
    
<?php }
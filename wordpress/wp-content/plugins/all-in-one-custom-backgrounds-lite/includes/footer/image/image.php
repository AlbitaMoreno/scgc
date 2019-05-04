<?php
function fpbg_footer_image( $prefix, $selector ) { 
    ?>
    <script>
        <?php 
        $imagePaths = '["' . fpbg_metabox_value( $prefix.'src', '') . '"]';?> 
            
        jQuery('<?= $selector ?>').backstretch(
            <?= $imagePaths ?>, {
            duration: 0,
            fade: 0,
            fadeFirstImage: false
        });
    </script>
<?php }

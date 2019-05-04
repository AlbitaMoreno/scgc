<?php

function fpbg_head_gradient( $prefix ) {
    $startColor = fpbg_metabox_value($prefix.'sc','#EEEEEE');
    $endColor = fpbg_metabox_value($prefix.'ec','#EEEEEE');
    $orientation = fpbg_metabox_value($prefix.'o','horizontal');
    
    if($orientation == 'horizontal') : 
        fpbg_head_gradient_horizontal($startColor,$endColor);
    elseif($orientation == 'vertical') : 
        fpbg_head_gradient_vertical($startColor,$endColor);
    elseif($orientation == 'diagonal-tl-to-br') : 
        fpbg_head_gradient_diagonal_tl_to_br($startColor,$endColor);
    elseif($orientation == 'diagonal-bl-to-tr') : 
        fpbg_head_gradient_diagonal_bl_to_tr($startColor,$endColor);
    elseif($orientation == 'radial') : 
        fpbg_head_gradient_radial($startColor,$endColor);
    endif;
}

function fpbg_head_gradient_horizontal( $startColor, $endColor ) { ?>
background: <?= $startColor ?>;
background: -moz-linear-gradient(left,  <?= $startColor ?> 0%, <?= $endColor ?> 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%,<?= $startColor ?>), color-stop(100%,<?= $endColor ?>));
background: -webkit-linear-gradient(left,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -o-linear-gradient(left,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -ms-linear-gradient(left,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: linear-gradient(to right,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?= $startColor ?>', endColorstr='<?= $endColor ?>',GradientType=1 );
<?php }

function fpbg_head_gradient_vertical( $startColor, $endColor ) { ?>
background: <?= $startColor ?>;
background: -moz-linear-gradient(top, <?= $startColor ?> 0%, <?= $endColor ?> 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?= $startColor ?>), color-stop(100%,<?= $endColor ?>));
background: -webkit-linear-gradient(top, <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -o-linear-gradient(top, <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -ms-linear-gradient(top, <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: linear-gradient(to bottom, <?= $startColor ?> 0%,<?= $endColor ?> 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?= $startColor ?>', endColorstr='<?= $endColor ?>',GradientType=0 );
<?php }

function fpbg_head_gradient_diagonal_tl_to_br( $startColor, $endColor ) { ?>
background: <?= $startColor ?>;
background: -moz-linear-gradient(-45deg,  <?= $startColor ?> 0%, <?= $endColor ?> 100%);
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,<?= $startColor ?>), color-stop(100%,<?= $endColor ?>));
background: -webkit-linear-gradient(-45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -o-linear-gradient(-45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -ms-linear-gradient(-45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: linear-gradient(135deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?= $startColor ?>', endColorstr='<?= $endColor ?>',GradientType=1 );
<?php }

function fpbg_head_gradient_diagonal_bl_to_tr( $startColor, $endColor ) { ?>
background: <?= $startColor ?>;
background: -moz-linear-gradient(45deg,  <?= $startColor ?> 0%, <?= $endColor ?> 100%);
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,<?= $startColor ?>), color-stop(100%,<?= $endColor ?>));
background: -webkit-linear-gradient(45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -o-linear-gradient(45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -ms-linear-gradient(45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: linear-gradient(45deg,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?= $startColor ?>', endColorstr='<?= $endColor ?>',GradientType=1 );
<?php }

function fpbg_head_gradient_radial( $startColor, $endColor ) { ?>
background: <?= $startColor ?>;
background: -moz-radial-gradient(center, ellipse cover,  <?= $startColor ?> 0%, <?= $endColor ?> 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,<?= $startColor ?>), color-stop(100%,<?= $endColor ?>));
background: -webkit-radial-gradient(center, ellipse cover,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -o-radial-gradient(center, ellipse cover,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: -ms-radial-gradient(center, ellipse cover,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
background: radial-gradient(ellipse at center,  <?= $startColor ?> 0%,<?= $endColor ?> 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?= $startColor ?>', endColorstr='<?= $endColor ?>',GradientType=1 );
<?php }
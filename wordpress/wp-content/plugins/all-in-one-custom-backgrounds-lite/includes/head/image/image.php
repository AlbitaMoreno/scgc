<?php $ecbgImagePrefix = $backgroundPrefix.'ig.0.' ?>
background-image: url('<?= fpbg_metabox_value($ecbgImagePrefix.'src','') ?>');
background-repeat: <?= fpbg_metabox_value($ecbgImagePrefix.'r','repeat') ?>;
background-position: <?= fpbg_metabox_value($ecbgImagePrefix.'pg.0.h','center') ?> <?= fpbg_metabox_value($ecbgImagePrefix.'pg.0.v','center') ?>; 
background-attachment: <?= fpbg_metabox_value($ecbgImagePrefix.'b','scroll') ?> !important;
<?= fpbg_metabox_value($ecbgImagePrefix.'css','') ?>
<?php include_once 'functions/RootURL.php'; ?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb customBreacrumb">
    <?php
        if(isset($_GET['url']))
        {
            $breadcrumbUrls = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            $subURL = '';
            for ($i = 0; $i < sizeof($breadcrumbUrls); $i++): ?>
                <?php $subURL .= $breadcrumbUrls[$i] . '/' ?>
                <li><a href="<?=root()?>/<?=$subURL?>"><?=$breadcrumbUrls[$i]?></a></li>
            <?php endfor;
        }
    ?>
</ul>
<?php if(isset($data['message']['type'])):?>
<div class="alert alert-<?=$data['message']['type']?>" id="session-alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?=$data['message']['title']?>!</strong> <?=$data['message']['message']?>
</div>
<?php endif;?>
<!-- END BREADCRUMB -->
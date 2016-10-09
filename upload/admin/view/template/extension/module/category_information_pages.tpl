<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-puzzle-piece"></i> <?php echo $heading_title; ?></h3>
            </div>
            <div class="panel-body">
                <div class="content">
                    <div class="success">
                        <?php echo $entry_success; ?>
                    </div>
                    <div class="usage-description">
                        <?php echo $entry_description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer; ?>


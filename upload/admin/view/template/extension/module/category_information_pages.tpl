<?php echo $header; ?>

<div id="content">

<div class="breadcrumb">

  <?php foreach ($breadcrumbs as $breadcrumb) { ?>

  <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>

  <?php } ?>

</div>

<?php if ($error_warning) { ?>

<div class="warning"><?php echo $error_warning; ?></div>

<?php } ?>

<div class="box">

  <div class="heading">

    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>

    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>

  </div>
  <div class="content">
  <div class="success"> 
  <?php echo $entry_success; ?>
  </div>
  <div class="usage-description"> 
  <?php echo $entry_description; ?>
  </div>
  
	
</div>
<?php echo $footer; ?>


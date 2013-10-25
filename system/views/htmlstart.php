<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>
	<link href="<?php echo url('css/style.css'); ?>" rel="stylesheet" type="text/css" media="screen,print" />
	<link href="<?php echo url('css/form.css'); ?>" rel="stylesheet" type="text/css" media="screen,print" />
	<link href="<?php echo url('css/slider.css'); ?>" rel="stylesheet" type="text/css" media="screen,print" />
	<link href="<?php echo url('css/jquery-ui-1.9.2.custom.min.css'); ?>" rel="stylesheet" type="text/css" media="screen,print" />
    <script src="<?php echo url('javascript/jquery.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo url('javascript/jquery.slides.min.js'); ?>"></script>
    <script src="<?php echo url('javascript/jquery-ui-1.9.2.custom.min.js'); ?>"></script>
    <script src="<?php echo url('javascript/ajaxframe.js'); ?>" type="text/javascript" ></script>
    <script>
    $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 210,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true
        }
      });
    });
    </script>
</head>
<body>
<?php
	if($GLOBALS['auth']->getUser() == null)
		include 'system/views/loginform.php';
	else
		include 'system/views/logininfo.php';
?>
<?php include 'system/views/header.php'; ?>
<?php include 'system/views/menu.php'; ?>

	<div id="content">

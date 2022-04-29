<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- userprofile14:04-->

<head>
	<!-- Basic need -->
	<title><?= $this->fetch('title') ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<?= $this->Html->css(['client/style', 'client/plugins', 'jquery.rateyo.min', 'admin/jquery-ui.css']) ?>
	<?php echo $this->Html->script(['jquery.min', 'admin/jquery-ui', 'jquery.rateyo.min']) ?>

</head>
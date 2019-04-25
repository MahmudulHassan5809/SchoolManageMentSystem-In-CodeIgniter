<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<!-- Bootstrap CSS -->
	<?php echo link_tag('assets/css/bootstrap.min.css') ;?>

	<?php echo link_tag('assets/css/style.css') ;?>
</head>
<body>


<header>
	<?php $this->load->view('partials/navbar'); ?>


</header>

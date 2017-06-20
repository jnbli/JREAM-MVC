<!doctype html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'JREAM MVC'; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo URL?>favicon.ico" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
	<script type="text/javascript" src="<?php //echo URL; ?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

	<?php
		if (isset($this->js))
		{
			foreach ($this->js as $js)
				echo '<script type="text/javascript" src="'.URL. 'views/' .$js.'"></script>';
		}
	?>
</head>
<body>

<?php Session::init(); ?>
	
<div id="header">
	<h3 id="title">JREAM MVC</h3>
	<br />
	<?php //if (Session::get('loggedIn') == false):?>
		<a href="<?php echo URL; ?>index">Index</a>
		<a href="<?php echo URL; ?>about-us">About Us</a>
		<a href="<?php echo URL; ?>help">Help</a>
	<?php //endif; ?>
	<?php if (Session::get('loggedIn') == true):?>
		<a href="<?php echo URL; ?>dashboard">Dashboard</a>
		<a href="<?php echo URL; ?>note">Notes</a>
		<?php if (Session::get('role') == 'owner'):?>
			<a href="<?php echo URL; ?>user">User</a>
		<?php endif; ?>
		<a href="<?php echo URL; ?>dashboard/logout">Logout</a>
	<?php else: ?>
		<a href="<?php echo URL; ?>login">Login</a>
	<?php endif; ?>
</div>
	
<div id="content">
	
	
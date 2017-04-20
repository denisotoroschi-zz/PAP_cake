<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<!--Login Template:
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<html>
	<head>
		<title>Marcação Refeições</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
		<?=$this->Html->css('frontend/login/style.css')?>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<?=$this->Html->css('frontend/main.css')?>
		<!--<link rel="stylesheet" href="assets/css/main.css" />-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<?=$this->fetch('content')?>
					</div>
					<?php
					if($this->request->params['action']!= 'login'){
						echo $this->element('sidemenu');
						}?>
			</div>

		<!-- Scripts -->
			<?=$this->Html->script('frontend/jquery.min.js')?>
			<!--<script src="assets/js/jquery.min.js"></script>-->
			<?=$this->Html->script('frontend/skel.min.js')?>
			<!--<script src="assets/js/skel.min.js"></script>-->
			<?=$this->Html->script('frontend/util.js')?>
			<!--<script src="assets/js/util.js"></script>-->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<?=$this->Html->script('frontend/main.js')?>
			<!--<script src="assets/js/main.js"></script>-->

	</body>
</html>
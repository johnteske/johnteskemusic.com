<!DOCTYPE HTML>
<html>
	<head>
		<title>John Teske, composer<?php if ($class != 'home') {echo " | " . $title;}?></title>
		<meta charset="UTF-8">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-layers.min.js"></script>
		<script src="/js/init.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-8930161-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<noscript>
			<link rel="stylesheet" href="/css/skel.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-large.css" />
		</noscript>
	</head>
	<body id="top">
		<section id="banner-wrapper" class="wrapper <?php echo $class; ?>">
			<div id="banner">
				<div id="logo">
					<a href="#main">
						<h2><?php echo $title; ?></h2><?php if ($class == 'home'): ?><p>composer</p><?php endif?>
					</a>
				</div>
			</div>
		</section>
		<header id="header" class="skel-layers-fixed">
			<nav id="nav" class="container">
				<ul class="row">
					<li class="<?php if($class == 'home') {echo 'site-title';} else {echo '3u 12u$(2)';} ?>"><a href="/">John Teske, composer</a></li>
					<li class="<?php if($class == 'home') {echo 'main-nav';} else {echo '3u 12u$(2)';} ?>"><a href="/performances/">Performances</a></li>
					<li class="<?php if($class == 'home') {echo 'main-nav';} else {echo '3u 12u$(2)';} ?>"><a href="/compositions/">Compositions</a></li>
					<li class="<?php if($class == 'home') {echo 'main-nav';} else {echo '3u 12u$(2)';} ?>"><a href="/about.php">About</a></li>
  					<li class="only-medium"><a href="/about.php#contact">Contact</a></li>
				</ul>
			</nav>
		</header>
		<main id="main" class="container">

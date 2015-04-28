<html>
	<head>
		<title><?php bloginfo('name');?> - <?php bloginfo('description');?></title>
		<meta name="generator" content="WordPress <?php bloginfo('version');?> />
		<meta http-equiv="content-type" content="<?php bloginfo('html_type');?>" charset="<?php bloginfo('charset');?>"/>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" media="all" type="text/css"/>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url');?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url');?>"/>
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url');?>" />
		<?php wp_head();?>
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<a href="<?php echo get_option('home');?>"><img alt="Logo" src="<?php echo get_bloginfo('template_directory');?>/img/logo.png"/></a>
			</div>
			<div class="menu">
				<ul class="drop_menu">
					<li><a href="#">inspire-se</a>
						<ul>
							<?php wp_list_categories('title_li=');?>
						</ul>					
					</li>
				<?php wp_list_pages('title_li=');?>
				</ul>
			</div>
			<div class="nav-fixed" id="nav-fixed">
			
			</div>
		</div>
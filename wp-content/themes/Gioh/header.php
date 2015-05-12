<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<title><?php bloginfo('name');?> - <?php bloginfo('description');?></title>
		<meta name="generator" content="WordPress <?php bloginfo('version');?> />
		<meta http-equiv="content-type" content="<?php bloginfo('html_type');?>" charset="<?php bloginfo('charset');?>"/>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" media="all" type="text/css"/>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url');?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url');?>"/>
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url');?>" />
		<?php wp_head();?>
		<style>
			@media screen and (max-width: 768px) {
				.meteor-slides .meteor-nav a{
					display: none;
				}
			}	
		</style>
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
				<div class="navbar">
					<a href="javascript:mostraEsconde();"><img title="Menu" src="<?php echo get_bloginfo('template_directory');?>/img/navbar.png"/></a>
				</div>				
				<div class="logo_menu_fixo">
					<a href="<?php echo get_option('home');?>"><img src="<?php echo get_bloginfo('template_directory');?>/img/logo_menu_fixo.png"/></a>
				</div>
				<div class="midias_menu_fixo">
					<a href=""><img src="<?php echo get_bloginfo('template_directory');?>/img/twiter_menu_fixo.png"/></a>
					<a href=""><img src="<?php echo get_bloginfo('template_directory');?>/img/facebook_menu_fixo.png"/></a>
					<a href=""><img src="<?php echo get_bloginfo('template_directory');?>/img/instagram_menu_fixo.png"/></a>
				</div>
			</div>
			<div id='cssmenu'>
				<ul>
				  <li><a href="#">inspire-se</a>
						<ul>
							<?php wp_list_categories('title_li=');?>
						</ul>					
					</li>
					<?php wp_list_pages('title_li=');?>
				</ul>
			</div>
		</div>
		<div class="header_mobile">
			<div class="navbar_mobile">
					<a href="javascript:mostraEscondeMobile();"><img title="Menu" src="<?php echo get_bloginfo('template_directory');?>/img/navbar.png"/></a>
				</div>				
				<div class="logo_menu_fixo_mobile">
					<a href="<?php echo get_option('home');?>"><img src="<?php echo get_bloginfo('template_directory');?>/img/logo_menu_fixo.png"/></a>
				</div>
			</div>
			<div id='cssmenu_mobile'>
				<ul>
				  <li><a href="#">inspire-se</a>
						<ul>
							<?php wp_list_categories('title_li=');?>
						</ul>					
					</li>
					<?php wp_list_pages('title_li=');?>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(function(){   
			var nav = jQuery('#nav-fixed');   
			jQuery(window).scroll(function () { 
				if (jQuery(this).scrollTop() > 156) { 
					nav.addClass("f-nav"); 
				} else { 
					nav.removeClass("f-nav");
					jQuery('#cssmenu').hide(); 
				} 
			});  
		});
			jQuery(function(){
				jQuery( document ).ready(function() {
					
					jQuery('#cssmenu > ul > li > ul').parent().addClass('hashub');
					jQuery('#cssmenu > ul > li > a').click(function() {
					  jQuery('#cssmenu li').removeClass('active');
					  jQuery(this).closest('li').addClass('active');	
					  var checkElement = jQuery(this).next();
					  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
						jQuery(this).closest('li').removeClass('active');
						checkElement.slideUp('normal');
					  }
					  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
						jQuery('#cssmenu ul ul:visible').slideUp('normal');
						checkElement.slideDown('normal');
					  }
					  if(jQuery(this).closest('li').find('ul').children().length == 0) {
						return true;
					  } else {
						return false;	
					  }		
					});
				});
			});
			jQuery(function(){
				jQuery( document ).ready(function() {
					
					jQuery('#cssmenu_mobile > ul > li > ul').parent().addClass('hashub');
					jQuery('#cssmenu_mobile > ul > li > a').click(function() {
					  jQuery('#cssmenu_mobile li').removeClass('active');
					  jQuery(this).closest('li').addClass('active');	
					  var checkElement = jQuery(this).next();
					  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
						jQuery(this).closest('li').removeClass('active');
						checkElement.slideUp('normal');
					  }
					  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
						jQuery('#cssmenu_mobile ul ul:visible').slideUp('normal');
						checkElement.slideDown('normal');
					  }
					  if(jQuery(this).closest('li').find('ul').children().length == 0) {
						return true;
					  } else {
						return false;	
					  }		
					});
				});
			});
			function mostraEsconde(){
				jQuery('#cssmenu').toggle();
			}
			function mostraEscondeMobile(){
				jQuery('#cssmenu_mobile').toggle();
			}
			
	</script>
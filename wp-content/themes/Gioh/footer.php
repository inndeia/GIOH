	<div style="clear: both;margin-bottom: 120px;margin-bottom: 160px;"></div>
	<div class="footer">
		<div class="bola_logo">
			<a href="<?php echo get_option('home');?>"><img src="<?php echo get_bloginfo('template_directory');?>/img/logo_footer.png"/></a>
		</div>
		<div class="menu_footer">
				<ul>
					<li><a href="#">inspire-se</a>
						<ul>
							<?php wp_list_categories('title_li=');?>
						</ul>					
					</li>
				<?php wp_list_pages('title_li=');?>
				</ul>
			</div>
		<div class="div_midias">
			<p>+ redes socias</p>
			<a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/img/twiter.png"/></a>
			<a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/img/facebook.png"/></a>
			<a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/img/instagram.png"/></a>
			<a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/img/rede.png"/></a>
			<hr>
			<div class="direitos">
				<p> &copy; <?php echo date('Y');?>. Todos os direitos reservados.</p><a href="http://www.inndeia.com"><img src="<?php echo get_bloginfo('template_directory');?>/img/logo_inndeia.png"/></a>
			</div>
		</div>
	</div>
	<?php wp_footer()?>
	</body>
</html>

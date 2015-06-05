<!--?php /* Template name: COLABORADORES */ ?-->
<?php get_header(); ?>



<div class="content_texto_contribuidores">
	<div class="fundo_branco_contribuidores">
		<div class="texto_contribuidores">
			<p>COLABORADORES</p>
		</div>
	</div>
	<hr>
</div>
<div class="container">
	<div class="header_img_border">
		<img src="<?php echo get_bloginfo('template_directory');?>/img/bg_contribuidores.png"/>		
	</div>
	<?php echo do_shortcode('[colaboradores_page]'); ?>
</div>
</div>

<?php get_footer(); ?>
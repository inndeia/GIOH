<!--?php /* Template name: CONTRIBUIDORES */ ?-->
<?php get_header(); ?>



<div class="content_texto_contribuidores">
	<div class="fundo_branco_contribuidores">
		<div class="texto_contribuidores">
			<p>CONTRIBUIDORES</p>
		</div>
	</div>
	<hr>
</div>
<div class="container">
	<div class="header_img_border">
		<img src="<?php echo get_bloginfo('template_directory');?>/img/bg_contribuidores.png"/>		
	</div>
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo_contribuidores">
	<?php the_content();?>
</div>
<?php
	endwhile;
	else:
?>
<p>Nenhum post encontrado!</p>
<?php
	endif;
?>
</div>
</div>

<?php get_footer(); ?>
<!--?php /* Template name: CONTRIBUIDORES */ ?-->
<?php get_header(); ?>


<div class="container_contribuidores">
	<div class="content_texto_contribuidores">
			<hr class="left">
			<div class="texto_contribuidores">
				<p>CONTRIBUIDORES</p>
			</div>
			<hr class="right">
	</div>
	<div class="left_container_boutique">
	<div class="header_contato">
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
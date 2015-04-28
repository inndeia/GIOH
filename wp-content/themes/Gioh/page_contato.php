<!--?php /* Template name: CONTATO */ ?-->
<?php get_header(); ?>


<div class="container_contato">
	<div class="header_contato">
		<img src="<?php echo get_bloginfo('template_directory');?>/img/bg_contato.png"/>
		<div class="nome_contato">
			<p>Contato</p>
		</div>
	</div>
	<div class="left_container_contato">
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo_contato">
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
<div class="right_container_contato">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Contato') ) : ?>
		<?php endif; ?>
</div>
</div>

<?php get_footer(); ?>
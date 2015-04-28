<?php get_header(); ?>
<div class="slide_home">
	<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
	<hr>
</div>
<div class="div_mais_vistos">
	<hr class="left">
	<div class="texto_mais_vistos">
		<p>Mais Vistos</p>
	</div>
	<hr class="right">
</div>
<div class="slide_post_mais_lidos">
<hr class="hr_cima">
<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
</div>
<hr class="hr_baixo">
<div class="container">
<div class="left_container">
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo">
<?php if ( has_post_thumbnail() ) {?>
	<div class="img_artigo">
		<div class="bola_data">		
			<p><?php the_time('d M');?></p>
			<?php the_category('title_a=');?>
		</div>
		<div class="div_img">
			<?php the_post_thumbnail(array(619,619));?>
		</div>
	</div>	
<?php }?> 
	<div class="container_artigo">
		<a href="<?php the_permalink();?>" class="title"><h1><?php the_title(); ?></h1></a>
		<hr>
		<div class="resumo_artigo">
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>" class="leia_mais">leia mais ></a>			
			 
		</div>
		<div class="post_tag">
			<p>
				<span class="texto_tag">tags </span>
				<?php the_tags( '', ' / ', '<br />' ); ?>
			</p>
		</div>
	</div>
</div>
<?php
	endwhile;
	
	$paginas = paginacao();
	if ( ! empty( $paginas ) ):
	?>
		<div class="paginacao">
			<p><?php echo $paginas;?></p>
		</div>
	<?php endif; 
	else:
?>
<p>Nenhum post encontrado!</p>
<?php
	endif;
?>
</div>
<div class="right_container">
	<?php get_sidebar();?>
</div>
</div>
	<div class="instagram">
		<div class="content_texto_instagram">
			<hr class="left">
			<div class="texto_instagram">
				<p>instagram</p>
			</div>
			<hr class="right">
		</div>
		<div class="imagem_instagram">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Instagram') ) : ?>
		<?php endif; ?>
		</div>
		<div class="texto_follow">
			<p><a target="_blanck" href="https://instagram.com/gio_ewbank">follow @gio_ewbank</a></p>
		</div>
</div>
<?php get_footer(); ?>
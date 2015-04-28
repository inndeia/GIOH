<?php get_header(); ?>
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
			<?php the_content();?>
		</div>
		
	</div>
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
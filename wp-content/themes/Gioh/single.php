<?php get_header(); ?>
<div class="container">
<div class="left_container">
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo">

	<div class="img_artigo">
		<div class="bola_data">		
			<p><?php the_time('d M');?></p>
			<?php the_category('title_a=');?>
		</div>
		<?php if ( has_post_thumbnail() ) {?>
		<div class="div_img">
			<a href="<?php the_permalink();?>" ><?php the_post_thumbnail(array(619,619));?></a>
		</div>
		<?php }?>
	</div>
	<?php if (!has_post_thumbnail() ) {?>
 		<div style="margin-top:35px;margin-bottom: 60px; ">
		</div>
	<?php }?>
	<div class="container_artigo">
		<a href="<?php the_permalink();?>" class="title"><h1><?php the_title(); ?></h1></a>
		<hr>
		<div class="resumo_artigo">
			<?php the_content();?>
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
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true );
                ?>
<?php
	endwhile;
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

<?php get_footer(); ?>
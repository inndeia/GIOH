<!--?php /* Template name: BOUTIQUE */ ?-->
<?php get_header(); ?>


<div class="container_boutique">
	<div class="content_texto_boutique">
			<hr class="left">
			<div class="texto_boutique">
				<p>BOUTIQUE</p>
			</div>
			<hr class="right">
	</div>
	<div class="left_container_boutique">
	<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow("boutique", ""); } ?>
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo_boutique">
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
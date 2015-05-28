<!--?php /* Template name: BOUTIQUE */ ?-->
<?php get_header(); ?>

<div class="content_texto_boutique">
	<div class="fundo_branco_boutique">
		<div class="texto_boutique">
			<p>BOUTIQUE</p>
		</div>
	</div>
	<hr >
</div>
<div class="container">
	<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow("boutique", ""); } ?>


	<?php echo do_shortcode('[boutique_page]'); ?>


</div>

<?php get_footer(); ?>
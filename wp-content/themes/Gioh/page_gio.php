<!--?php /* Template name: GIO */ ?-->
<?php get_header(); ?>

<div class="header_gio">
	<img src="<?php echo get_bloginfo('template_directory');?>/img/bg_gio.png"/>
	<div class="nome_gio">
		<p>Giovanna <span>Ewbank</span></p>
	</div>
	<hr>
</div>
<div class="container">
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo_gio">
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
	<div class="content_texto_bju_gio">
		<div class="fundo_branco_bju_gio">
			<div class="texto_bju_gio">
				<p>Bju!, Gio.</p>
			</div>
		</div>
		<hr>
	</div>
</div>
<div class="instagram">
	<div class="content_texto_instagram">
			<div class="fundo_branco_instagram">
				<div class="texto_instagram">
					<p>instagram</p>
				</div>
			</div>
			<hr>
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
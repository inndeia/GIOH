<?php get_header(); ?>
<div class="topo_categoria">
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
	<div class="bola_categoria">
		<p><?php the_time('d M');?></p>
		<?php the_category('title_a=');?>
	</div>

		<div class="artigo_categoria">
			<div class="container_artigo categoria">
					<a><h1><?php the_title(); ?></h1></a>
					<hr>
			</div>
			<div class="desktop">
				<div class="post_tag_categoria">
					<div class="nome_tag_categoria"><span>tags </span></div>
					<div class="tags_categoria">
						<?php the_tags( '', ' / ', '<br />' ); ?>
					</div>
				</div>
			</div>
			<div class="mobile">
				<div class="post_tag_artigo_mobile">
					<div class="texto_tag__artigo_mobile">tags </div>
					<p>					
						<?php the_tags( ' ', ' / ', '<br />' ); ?>
					</p>
				</div>
			</div>
				<div class="img_artigo">					
					<div class="div_img">
					<a href="<?php the_permalink();?>" ><?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image')) :
						    MultiPostThumbnails::the_post_thumbnail(
						        get_post_type(),
						        'secondary-image'
						    );
						else:
							the_post_thumbnail(array(619,619));
						endif;?></a>
					</div>
				</div>	
			
		</div>
</div>
<div class="container">
<div class="left_container">
<div class="artigo_single">
	<div class="container_artigo">		
		
		<div class="resumo_artigo">
			<?php the_content();?>			
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
<div class="desktop">
	<div style="clear: both;"></div>
	<div class="content_texto_veja_tambem">
		<div class="fundo_branco_veja_tambem">
			<div class="texto_veja_tambem">
				<p>VEJA TAMBÉM</p>
			</div>
		</div>
			<hr>		
	</div>

<?php show_related_posts_by_tag(); ?>
</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<div class="topo_categoria">
	<div class="bola_categoria">
		<p><span><?php single_cat_title( '', true );?></span></p>
	</div>
	<div class="desktop">
		<?php $recent = new WP_Query("cat=".$cat."&showposts=1"); 
			  while($recent->have_posts()) : $recent->the_post();?>
			<div class="artigo_categoria">
				<div class="container_artigo categoria">
						<a href="<?php the_permalink();?>" class="title"><h1><?php the_title(); ?></h1></a>
						<hr>
				</div>
				<div class="post_tag_categoria">
					<div class="nome_tag_categoria"><span>tags </span></div>
					<div class="tags_categoria">
						<?php the_tags( '', ' / ', '<br />' ); ?>
					</div>
				</div>	
					<div class="img_artigo">
						
						<div class="div_img">
						<a href="<?php the_permalink();?>" ><?php if (class_exists('MultiPostThumbnails')) :
							    MultiPostThumbnails::the_post_thumbnail(
							        get_post_type(),
							        'secondary-image'
							    );
							endif; ?></a>
						</div>
					</div>	
				<div class="resumo_artigo_categoria">
					<a href="<?php the_permalink();?>" class="leia_mais_categoria">leia mais ></a>			
				 </div>
			</div>
		
		<?php endwhile; ?>
	</div>
</div>
<div class="container">
<div class="left_container">
<?php 
	if(have_posts()): while(have_posts()) : the_post();
?>
<div class="artigo">
		<div class="mobile">
			<div class="data_mobile">
				<div class="bola_data_mobile">		
					<p><?php the_time('d M');?></p>
					<?php the_category('title_a=');?>				
				</div>
				<hr>
			</div>
		</div>
	<div class="img_artigo">
		<div class="desktop">
			<div class="bola_data">		
				<p><?php the_time('d M');?></p>
				<?php the_category('title_a=');?>
			</div>
		</div>
		<?php if ( has_post_thumbnail() ) {?>
		<div class="div_img">
			<a href="<?php the_permalink();?>" ><?php the_post_thumbnail(array(619,619));?></a>
		</div>
		<?php }?> 
	</div>	
	<?php if (!has_post_thumbnail() ) {?>
 		<div style="height: 70px">
		</div>
	<?php }?>
	<div class="container_artigo">
		<a href="<?php the_permalink();?>" class="title"><h1><?php the_title(); ?></h1></a>
		<hr>
		<div class="resumo_artigo">
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>" class="leia_mais">leia mais ></a>			
			 
		</div>
		<div class="desktop">
			<div class="post_tag">
				<div class="nome_tag_artigo"><span>tags </span></div>
				<div class="tags_artigo">
					<?php the_tags( '', ' / ', '<br />' ); ?>
				</div>
			</div>
		</div>
		<div class="mobile">
			<div class="post_tag_mobile">
				<div class="texto_tag_mobile">tags </div>
				<p>					
					<?php the_tags( ' ', ' / ', '<br />' ); ?>
				</p>
			</div>
		</div>
	</div>
</div>
<?php
	endwhile;
	?>	
	<div class="nav-next"><?php next_posts_link( __( 'Próximo <span class="meta-nav">></span>' )); ?></div>
    <div class="nav-previous"><?php previous_posts_link( __( '<span class="meta-nav"><</span> Anterior') ); ?></div>
    
<?php else:
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
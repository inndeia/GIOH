<?php get_header(); ?>
<div class="slide_home">
	<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow("inicial", ""); } ?>
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
<?php
$nova_consulta = new WP_Query( 
    array(
        'posts_per_page'      => 10,                 // Máximo de 5 artigos
        'no_found_rows'       => true,              // Não conta linhas
        'post_status'         => 'publish',         // Somente posts publicados
        'ignore_sticky_posts' => true,              // Ignora posts fixos
        'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
        'meta_key'            => 'tp_post_counter', // A nossa post meta
        'order'               => 'DESC'             // Ordem decrescente
    )
);
?>
	<button class="prev_mais_vistos">&laquo;</button>	
	<button class="next_mais_vistos">&raquo;</button>
	<div class="pattern_left_mais_vistos"></div>
	<div class="pattern_right_mais_vistos"></div>
	<div class="carousel-no-style">
	    <ul>
	    <?php if ( $nova_consulta->have_posts() ): ?>
        <?php while ( $nova_consulta->have_posts() ): ?>
        
            <?php $nova_consulta->the_post(); ?>
            <?php $tp_post_counter = get_post_meta( $post->ID, 'tp_post_counter', true );?>
            	 <?php if( has_post_thumbnail() ): ?>
	        		<li><a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('mais-visto-thumbnail'); ?>
                        </a></li>
                  <?php endif; // has_post_thumbnail ?>
        <?php endwhile; ?>
    <?php endif; // have_posts ?>
 
    <?php wp_reset_postdata(); ?>
	    </ul>
	</div>
	
</div>
<script type="text/javascript"src="<?php echo get_bloginfo('template_directory');?>/js/jquery.jcarousellite.js"></script>
<script type="text/javascript">
jQuery(".carousel-no-style").jCarouselLite({
    btnNext: ".next_mais_vistos",
    btnPrev: ".prev_mais_vistos",
    visible: 6.5
});
</script>
	<hr class="hr_baixo">
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
				<p>
					<span class="texto_tag">tags </span>
					<?php the_tags( ' ', ' / ', '<br />' ); ?>
				</p>
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
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PaginaInicial') ) : ?>
		<?php endif; ?>
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
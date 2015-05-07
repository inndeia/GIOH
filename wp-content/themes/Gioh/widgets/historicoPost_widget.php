<?php
class HistoricoPost_Widget extends WP_Widget{
	function __construct() {
		parent::__construct(
			'HistorioPost_Widget', // Base ID
			__( 'Historico de publicao Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Os cinso posts mais recentes.', 'text_domain' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		<h2>histórico <br><b>de publicações</b></h2>
		<div class="caixa_post_mais_recente">
		<?php
		$aRecentPosts = new WP_Query("showposts=5"); 
		while($aRecentPosts->have_posts()) : $aRecentPosts->the_post();?>
		<div class="mais_recente_post">
			<a href="<?php the_permalink() ?>"><?php if (class_exists('MultiPostThumbnails')) :
						    MultiPostThumbnails::the_post_thumbnail(
						        get_post_type(),
						        'secondary-image',
						    	null,
						    	'post-secondary-image-thumbnail',
						    	null
						    );
						endif; ?></a><br>
			<a href="<?php the_permalink() ?>" class="mais_recente_post_titulo"><?php the_title();?></a></li>
		</div>
		<?php endwhile; ?>
		</div>
		<div class="button_widget"><a href="index.php?paged=2">MAIS ANTIGAS</a></div>
		<hr>
	<?php 
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		
		
		}
	public function update( $new_instance, $old_instance ) {
			
		}
}
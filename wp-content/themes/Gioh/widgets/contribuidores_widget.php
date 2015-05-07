<?php
class Contribuidores_Widget extends WP_Widget{
	function __construct() {
		parent::__construct(
			'Contribuidores_Widget', // Base ID
			__( 'Contribuidores Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Foto e link para a p�gina Contribuidores.', 'text_domain' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo '<div class="img_widget"><img src="'.esc_url($instance['image_uri']).'" /></div>';
		echo'<div class="button_widget"><a href="index.php?page_id=17">CONTRIBUIDORES</a></div>';
		echo '<hr>';
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		$image_uri = ! empty( $instance['image_uri'] ) ? $instance['image_uri'] : __( 'New imagem', 'text_domain' );
		?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
		      <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
		      <input type="text" class="img" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo esc_attr( $image_uri ); ?>" />
		      <input type="button" class="select-img" value="Select Image" />
		    </p>
			<?php 
		}
	public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
		
			return $instance;
		}
}
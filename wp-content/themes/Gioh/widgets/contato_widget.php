<?php
class Contato_Widget extends WP_Widget{
	function __construct() {
		parent::__construct(
			'Contato_Widget', // Base ID
			__( 'Contato Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Endereço, email e telefone para Contato.', 'text_domain' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo "<div class='contato_widget'><div class='fundo_widget'>";
		echo "<img src='". get_bloginfo('template_directory') ."/img/telefone.png'/>";
		echo '<div class="texto_contato"><p>'.$instance['email'].'</p><hr><p>'.$instance['endereco'].'</p><p>'.$instance['telefone'].'</p></div>';
		echo "</div></div>";
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$email = ! empty( $instance['email'] ) ? $instance['email'] : __( '', 'text_domain' );
		$endereco = ! empty( $instance['endereco'] ) ? $instance['endereco'] : __( '', 'text_domain' );
		$telefone = ! empty( $instance['telefone'] ) ? $instance['telefone'] : __( '', 'text_domain' );
		?>
			<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'endereco' ); ?>"><?php _e( 'Endereco:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'endereco' ); ?>" name="<?php echo $this->get_field_name( 'endereco' ); ?>" type="text" value="<?php echo esc_attr( $endereco ); ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'telefone' ); ?>"><?php _e( 'Telefone:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'telfone' ); ?>" name="<?php echo $this->get_field_name( 'telefone' ); ?>" type="text" value="<?php echo esc_attr( $telefone ); ?>">
			</p>
			<?php 
		}
	public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
			$instance['endereco'] = ( ! empty( $new_instance['endereco'] ) ) ? strip_tags( $new_instance['endereco'] ) : '';
			$instance['telefone'] = ( ! empty( $new_instance['telefone'] ) ) ? strip_tags( $new_instance['telefone'] ) : '';
		
			return $instance;
		}
}
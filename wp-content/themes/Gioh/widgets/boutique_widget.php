<?php
class Boutique_Widget extends WP_Widget{
	function __construct() {
		parent::__construct(
			'Boutique_Widget', // Base ID
			__( 'Boutique Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Galeria de imagem Boutique.', 'text_domain' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		
		<h1>destacados na<br/><b>boutique</b></h1>
		<div class="widget_boutique" id="widget_boutique">
			<figure>
			   <span id="next_boutique" class="next_boutique">></span>
			   <span id="prev_boutique" class="prev_boutique"><</span>
			 
			   <div id="slider_boutique">
			   <?php if($instance['image_uri_1'] != 'Nova Imagem 1'){?>
			      <a href="<?php echo $instance['link1']?>" target="_blanck" class="trs"><img src="<?php echo esc_url($instance['image_uri_1'])?>" alt="<?php echo $instance['descricao1']?>" /></a>
			    <?php }
			    	if($instance['image_uri_2'] != 'Nova Imagem 2'){?>
			      <a href="<?php echo $instance['link2']?>" target="_blanck" class="trs"><img src="<?php echo esc_url($instance['image_uri_2'])?>" alt="<?php echo $instance['descricao2']?>" /></a>
			    <?php }
			    	if($instance['image_uri_3'] != 'Nova Imagem 3'){?>
			      <a href="<?php echo $instance['link3']?>" target="_blanck" class="trs"><img src="<?php echo esc_url($instance['image_uri_3'])?>" alt="<?php echo $instance['descricao3']?>" /></a>
			      <?php }?>
			   </div>
			 
			   <figcaption></figcaption>
			</figure>
		</div>
		<script type="text/javascript">
		function setaImagem(){
			var settings = {
				primeiraImg: function(){
					
					elemento = document.querySelector("#slider_boutique a:first-child");
					elemento.classList.add("ativo");
					this.legenda(elemento);
				},
				slide: function(){
					
					elemento = document.querySelector(".ativo");
					if(elemento.nextElementSibling){
						elemento.nextElementSibling.classList.add("ativo");
						settings.legenda(elemento.nextElementSibling);
						elemento.classList.remove("ativo");
					}else{
						elemento.classList.remove("ativo");
						settings.primeiraImg();
					}
				},
				proximo: function(){
					clearInterval(intervalo);
					elemento = document.querySelector(".ativo");
					
					if(elemento.nextElementSibling){
						elemento.nextElementSibling.classList.add("ativo");
						settings.legenda(elemento.nextElementSibling);
						elemento.classList.remove("ativo");
					}else{
						elemento.classList.remove("ativo");
						settings.primeiraImg();
					}
					intervalo = setInterval(settings.slide,4000);
				},
				anterior: function(){
					clearInterval(intervalo);
					elemento = document.querySelector(".ativo");
					
					if(elemento.previousElementSibling){
						elemento.previousElementSibling.classList.add("ativo");
						settings.legenda(elemento.previousElementSibling);
						elemento.classList.remove("ativo");
						console.log('teste1');
					}else{
						console.log('teste2');
						elemento.classList.remove("ativo");						
						elemento = document.getElementById("widget_boutique").querySelector("a:last-child");
						elemento.classList.add("ativo");
						settings.legenda(elemento);
					}
					intervalo = setInterval(settings.slide,4000);
				},
				legenda: function(obj){
					var legenda = obj.querySelector("img").getAttribute("alt");
					document.querySelector("figcaption").innerHTML = legenda;
				}
			}
			//chama o slide
			settings.primeiraImg();
			//chama a legenda
			settings.legenda(elemento);
			//chama o slide à um determinado tempo
			var intervalo = setInterval(settings.slide,2000);

			document.getElementById("next_boutique").addEventListener("click", settings.proximo);
			document.getElementById("prev_boutique").addEventListener("click", settings.anterior);
		}
		window.addEventListener("load",setaImagem,false);
	</script>
		<?php
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$descricao1 = ! empty( $instance['descricao1'] ) ? $instance['descricao1'] : __( 'Nova Descrição 1', 'text_domain' );
		$link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : __( 'Novo link 1', 'text_domain' );
		$image_uri_1 = ! empty( $instance['image_uri_1'] ) ? $instance['image_uri_1'] : __( 'Nova Imagem 1', 'text_domain' );
		$descricao2 = ! empty( $instance['descricao2'] ) ? $instance['descricao2'] : __( 'Nova Descrição 2', 'text_domain' );
		$link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : __( 'Novo link 2', 'text_domain' );
		$image_uri_2 = ! empty( $instance['image_uri_2'] ) ? $instance['image_uri_2'] : __( 'Nova Imagem 2', 'text_domain' );
		$descricao3 = ! empty( $instance['descricao3'] ) ? $instance['descricao3'] : __( 'Nova Descrição 3', 'text_domain' );
		$link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : __( 'Novo link 3', 'text_domain' );
		$image_uri_3 = ! empty( $instance['image_uri_3'] ) ? $instance['image_uri_3'] : __( 'Nova Imagem 3', 'text_domain' );
		?>
			<p>
			<label for="<?php echo $this->get_field_id( 'descricao1' ); ?>"><?php _e( 'Descrição 1:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'descricao1' ); ?>" name="<?php echo $this->get_field_name( 'descricao1' ); ?>" type="text" value="<?php echo esc_attr( $descricao1 ); ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e( 'Link 1:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text" value="<?php echo esc_attr( $link1 ); ?>">
			</p>
			<p>
		      <label for="<?php echo $this->get_field_id('image_uri_1'); ?>">Imagem 1:</label><br />
		      <input type="text" class="img1" name="<?php echo $this->get_field_name('image_uri_1'); ?>" id="<?php echo $this->get_field_id('image_uri_1'); ?>" value="<?php echo esc_attr( $image_uri_1 ); ?>" />
		      <input type="button" class="select-img-1" value="Selecione imagem 1" />
		    </p>
		    
		    <p>
			<label for="<?php echo $this->get_field_id( 'descricao2' ); ?>"><?php _e( 'Descrição 2:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'descricao2' ); ?>" name="<?php echo $this->get_field_name( 'descricao2' ); ?>" type="text" value="<?php echo esc_attr( $descricao2 ); ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e( 'Link 2:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text" value="<?php echo esc_attr( $link2 ); ?>">
			</p>
			<p>
		      <label for="<?php echo $this->get_field_id('image_uri_2'); ?>">Imagem 1:</label><br />
		      <input type="text" class="img2" name="<?php echo $this->get_field_name('image_uri_2'); ?>" id="<?php echo $this->get_field_id('image_uri_2'); ?>" value="<?php echo esc_attr( $image_uri_2 ); ?>" />
		      <input type="button" class="select-img-2" value="Selecione imagem 2" />
		    </p>
		    
		    <p>
			<label for="<?php echo $this->get_field_id( 'descricao3' ); ?>"><?php _e( 'Descrição 3:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'descricao3' ); ?>" name="<?php echo $this->get_field_name( 'descricao3' ); ?>" type="text" value="<?php echo esc_attr( $descricao3 ); ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e( 'Link 3:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" type="text" value="<?php echo esc_attr( $link3 ); ?>">
			</p>
			<p>
		      <label for="<?php echo $this->get_field_id('image_uri_3'); ?>">Imagem 3:</label><br />
		      <input type="text" class="img3" name="<?php echo $this->get_field_name('image_uri_3'); ?>" id="<?php echo $this->get_field_id('image_uri_3'); ?>" value="<?php echo esc_attr( $image_uri_3 ); ?>" />
		      <input type="button" class="select-img-3" value="Selecione imagem 3" />
		    </p>
		    
			<?php 
		}
	public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['descricao1'] = ( ! empty( $new_instance['descricao1'] ) ) ? strip_tags( $new_instance['descricao1'] ) : '';
			$instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link1'] ) : '';
			$instance['image_uri_1'] = ( ! empty( $new_instance['image_uri_1'] ) ) ? strip_tags( $new_instance['image_uri_1'] ) : '';
			$instance['descricao2'] = ( ! empty( $new_instance['descricao2'] ) ) ? strip_tags( $new_instance['descricao2'] ) : '';
			$instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? strip_tags( $new_instance['link2'] ) : '';
			$instance['image_uri_2'] = ( ! empty( $new_instance['image_uri_2'] ) ) ? strip_tags( $new_instance['image_uri_2'] ) : '';
			$instance['descricao3'] = ( ! empty( $new_instance['descricao3'] ) ) ? strip_tags( $new_instance['descricao3'] ) : '';
			$instance['link3'] = ( ! empty( $new_instance['link3'] ) ) ? strip_tags( $new_instance['link3'] ) : '';
			$instance['image_uri_3'] = ( ! empty( $new_instance['image_uri_3'] ) ) ? strip_tags( $new_instance['image_uri_3'] ) : '';
		
			return $instance;
		}
}
<?php
if(function_exists('register_sidebar'))
	register_sidebar(array(
			'before_widget'	=>	'<div class="widgets">',
			'after_widget'	=>	'</div>',
			'before_title'	=>	'<h2>',
			'after_title'	=>	'</h2>',
		));
add_theme_support('post-thumbnails');
add_image_size( 'pequena', 250, 150, true );
add_image_size( 'mais-visto-thumbnail', 300, 190, true );
if ( function_exists('register_sidebar') ) {
		    register_sidebar( array(
		        //nome da nova sidebar
		        'name' => __( 'Instagram' ),
		        //identifica a nova sidebar no html
		        'id' => 'Instagram',		
		        //identifica a nova sidebar no wp-admin
		        'description' => __( 'Instagram local' )
  		 ));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
	//nome da nova sidebar
	'name' => __( 'PaginaInicial' ),
	//identifica a nova sidebar no html
	'id' => 'PaginaInicial',
	//identifica a nova sidebar no wp-admin
	'description' => __( 'Home local' ),
	'before_widget'	=>	'<div class="widgets">',
	'after_widget'	=>	'</div>',
	'before_title'	=>	'<h2>',
	'after_title'	=>	'</h2>'
	));
}
if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(
			array(
					'label' => 'Imagem Destacada Interna (Tamanho Imagem 1366x547)',
					'id' => 'secondary-image',
					'post_type' => 'post'
			)
	);
}
add_image_size('post-secondary-image-thumbnail', 252, 105);
if ( function_exists('register_sidebar') ) {
		 register_sidebar( array(
		  //nome da nova sidebar
		 'name' => __( 'Contato' ),				
		 //identifica a nova sidebar no html
		 'id' => 'Contato',		
		  //identifica a nova sidebar no wp-admin
		  'description' => __( 'Contato local' )
		));
} 
include 'widgets/gio_widget.php';
add_action('widgets_init', create_function('', 'return register_widget("Gio_Widget");'));

include 'widgets/contribuidores_widget.php';
add_action('widgets_init', create_function('', 'return register_widget("Contribuidores_Widget");'));

include 'widgets/contato_widget.php';
add_action('widgets_init', create_function('', 'return register_widget("Contato_Widget");'));

include 'widgets/historicoPost_widget.php';
add_action('widgets_init', create_function('', 'return register_widget("HistoricoPost_Widget");'));

include 'widgets/boutique_widget.php';
add_action('widgets_init', create_function('', 'return register_widget("Boutique_Widget");'));

function hrw_enqueue($hook)
{
if ( 'widgets.php' != $hook ) {
        return;
    }
  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  // moved the js to an external file, you may want to change the path
  wp_enqueue_script('hrw', '/wp-content/themes/Gioh/js/script.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue');
function paginacao() {
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$big = 999999999;

	return paginate_links(
			array(
					'base' => @add_query_arg('paged','%#%'),
					'format' => '?paged=%#%',
					'current' => $current,
					'total' => $wp_query->max_num_pages,
					'prev_text' => __('<'),
        			'next_text' => __('>')
			)
	);
}

function boutique_shortcode( $atts, $content = null ) {
	return '<div class="boutique">' . $content . '<hr></div>';
}
add_shortcode( 'boutique', 'boutique_shortcode' );

function contribuidores_shortcode( $atts, $content = null ) {
	return '<div class="contribuidores">' . $content . '</div>';
}
add_shortcode( 'contribuidores', 'contribuidores_shortcode' );
function get_the_twitter_excerpt(){
	$excerpt = get_the_content();
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$the_str = substr($excerpt, 0, 60);
	return $the_str."...";
}
function show_related_posts_by_tag(){
	global $post;

	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag)
			$tag_ids[] = $individual_tag->term_id;

		$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page' => 3 // Number of related posts that will be shown.
		);
		$my_query = new wp_query($args);
		if( $my_query->have_posts() ) {

			echo '<div id="postsRelacionados">';
			while ($my_query->have_posts()) {
				$my_query->the_post(); 
				?>
						<div class="conteudoRelacionados">
							<div class="categoriasRelacionados">
								<?php the_category('title_a=');?>
							</div>
							<div class="fotoRelacionados">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'pequena' ); } ?></a>
							</div>
							<div class="tituloRelacionados">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="textoRelacionados">
								<?php echo get_the_twitter_excerpt(); ?>
							</div>
							
						</div>
				<?php
			
			} 
			echo '</div>';

                       wp_reset_query(); //reseting custom query...
		} 
	} 
}
if ( ! function_exists( 'inndeia_session_start' ) ) {
	// Cria a função
	function inndeia_session_start() {
		// Inicia uma sessão PHP
		if ( ! session_id() ) session_start();
	}
	// Executa a ação
	add_action( 'init', 'inndeia_session_start' );
}
// Verifica se não existe nenhuma função com o nome tp_count_post_views
if ( ! function_exists( 'tp_count_post_views' ) ) {
	// Conta os views do post
	function tp_count_post_views () {
		// Garante que vamos tratar apenas de posts
		if ( is_single() ) {

			// Precisamos da variável $post global para obter o ID do post
			global $post;

			// Se a sessão daquele posts não estiver vazia
			if ( empty( $_SESSION[ 'tp_post_counter_' . $post->ID ] ) ) {

				// Cria a sessão do posts
				$_SESSION[ 'tp_post_counter_' . $post->ID ] = true;

				// Cria ou obtém o valor da chave para contarmos
				$key = 'tp_post_counter';
				$key_value = get_post_meta( $post->ID, $key, true );

				// Se a chave estiver vazia, valor será 1
				if ( empty( $key_value ) ) { // Verifica o valor
					$key_value = 1;
					update_post_meta( $post->ID, $key, $key_value );
				} else {
					// Caso contrário, o valor atual + 1
					$key_value += 1;
					update_post_meta( $post->ID, $key, $key_value );
				} // Verifica o valor

			} // Checa a sessão

		} // is_single

		return;

	}
	add_action( 'get_header', 'tp_count_post_views' );
}
?>
<?php
/* Plugin Name: Colaboradores
   Plugin URI: http://www.inndeia.com
   Decription: Cadastro de colaboradores para a pagina de colcaboradores
   Version: 1.0
   Author: Paulo Cesar
   Author URI: http://www.paulocesar.net.br	
 */
function colaboradores_activation() {
}
register_activation_hook(__FILE__, 'colaboradores_activation');
function colaboradores_deactivation() {
}
register_deactivation_hook(__FILE__, 'colaboradores_deactivation');

add_action('wp_enqueue_scripts', 'colaboradores_styles');
function colaboradores_styles() {
	wp_register_style('colaboradores_example', plugins_url('css/example.css', __FILE__));
	wp_enqueue_style('colaboradores_example');

}

add_action('init', 'colaboradores_register');

function colaboradores_register() {

	$labels = array(

			'menu_name' => _x('Colaboradores', 'colaboradores'),
			'name' => _x('Colaboradores', 'colaboradores'),
			'add_new_item' => __('Adicionar Novo Colaborador'),
			'edit_item'         => __( 'Editar Colaborador' ),
	);

	$args = array(

			'labels' => $labels,

			'hierarchical' => true,

			'description' => 'Cadastro de colaboradores para pagina colaboradores',

			'supports' => array('title', 'editor','thumbnail'),

			'public' => true,

			'show_ui' => true,

			'show_in_menu' => true,

			'show_in_nav_menus' => true,

			'publicly_queryable' => true,

			'exclude_from_search' => false,

			'has_archive' => true,

			'query_var' => true,

			'can_export' => true,

			'rewrite' => true,

			'capability_type' => 'post'

	);

	register_post_type('colaboradores', $args);

}

add_shortcode( 'colaboradores_page', 'colaboradores_shortcode' );
function colaboradores_shortcode( $atts ) {
	ob_start();
	$query = new WP_Query( array(
			'post_type' => 'colaboradores',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title',
	) );
    if ( $query->have_posts() ) { ?>
    	<?php $i = 0;
    		$margin='';
    	?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            	<?php $i++;
            		if($i == 3){
            			$margin='style="margin-right:0;"';
            			
            		}
            	
            	?>
            	<div class="colaboradores_page" <?php echo $margin;?>>
            		<?php the_post_thumbnail('boutique_page');?>
            		<div class="caixa_colaboradores_nome">
			            <div class="colaboradores_nome">
			            	<h1><?php the_title(); ?></h1>
			            </div>
		            </div>
		            <p><?php the_content();?></p>
		        </div>
		        <?php 
		        if($i == 3){?>
		        	<div style="clear:both;"></div>
		        <?php 	$i=0;
		        }
		        $margin='';?>
            <?php endwhile;
            wp_reset_postdata(); ?>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

?>
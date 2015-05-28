<?php
/* Plugin Name: Boutique
   Plugin URI: http://www.inndeia.com
   Decription: Cadastro de produtos para a pagina de boutique
   Version: 1.0
   Author: Paulo Cesar
   Author URI: http://www.paulocesar.net.br	
 */
function boutique_activation() {
}
register_activation_hook(__FILE__, 'boutique_activation');
function boutique_deactivation() {
}
register_deactivation_hook(__FILE__, 'boutique_deactivation');

add_action('wp_enqueue_scripts', 'boutique_styles');
function boutique_styles() {
	wp_register_style('boutique_example', plugins_url('css/example.css', __FILE__));
	wp_enqueue_style('boutique_example');

}

add_action('init', 'boutique_register');

function boutique_register() {

	$labels = array(

			'menu_name' => _x('Boutique', 'boutique'),
			'name' => _x('Boutique', 'boutique'),
			'add_new_item' => __('Adicionar Nova Boutique'),
			'edit_item'         => __( 'Editar Boutique' ),
	);

	$args = array(

			'labels' => $labels,

			'hierarchical' => true,

			'description' => 'Cadastro de produtos par pagina boutique',

			'supports' => array('title', 'thumbnail'),

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

	register_post_type('boutique', $args);

}

add_action('add_meta_boxes', 'boutique_meta_box');

function boutique_meta_box() {

	add_meta_box("boutique-url", "URL", 'boutique_url_box', "boutique", "normal");

}

function boutique_url_box() {
	global $post;

	$url = get_post_meta($post->ID, "_boutique_url", true);
	// print_r($gallery_images);exit;
	$url = ($url != '') ? json_decode($url) : '';

	// Use nonce for verification
	$html =  '<input type="hidden" name="boutique_box_nonce" value="'. wp_create_nonce(basename(__FILE__)). '" />';

	$html .= ''; 
	$html .= '<table class="form-table">
				<tbody>
					<tr>
						<th><label for="Url boutique">URL</label></th>
						<td><input id="boutique_url_text" type="text" name="url" value="'.$url.'" /></td>
					</tr>
				</tbody>
			</table>';

	echo $html;

}
add_action('save_post', 'boutique_info');

function boutique_info($post_id) {

	// verify nonce
	ini_set('display_errors', 0);
	if (!wp_verify_nonce($_POST['boutique_box_nonce'], basename(__FILE__))) {

		return $post_id;

	}

	// check autosave

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {

		return $post_id;

	}

	// check permissions

	if ('boutique' == $_POST['post_type'] && current_user_can('edit_post', $post_id)) {

		/* Save Slider Images */

		//echo "";print_r($_POST['gallery_img']);exit;

		$url = (isset($_POST['url']) ? $_POST['url'] : '');

		$url = strip_tags(json_encode($url));

		update_post_meta($post_id, "_boutique_url", $url);

	} else {

		return $post_id;

	}

}

add_shortcode( 'boutique_page', 'boutique_shortcode' );
function boutique_shortcode( $atts ) {
	ob_start();
	$query = new WP_Query( array(
			'post_type' => 'boutique',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title',
	) );
    if ( $query->have_posts() ) { ?>
    	<?php $i = 0;
    		$margin='';
    	?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            	<?php $url = get_post_meta(get_the_ID(), '_boutique_url', true);?>
            	<?php $i++;
            		if($i ==3){
            			$margin='style="margin-right:0;"';
            			$i=0;
            		}
            	
            	?>
            	<div class="boutique_page" <?php echo $margin;?>>
            		<?php the_post_thumbnail('boutique_page');?>
		            <div class="boutique_link">
		            	<a href=<?php echo $url ?> target="_blanck"><?php the_title(); ?></a>
		            </div>
		        </div>
		        <?php $margin='';?>
            <?php endwhile;
            wp_reset_postdata(); ?>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

?>
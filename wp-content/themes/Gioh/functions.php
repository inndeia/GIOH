<?php
if(function_exists('register_sidebar'))
	register_sidebar(array(
			'before_widget'	=>	'<div class="widgets">',
			'after_widget'	=>	'</div>',
			'before_title'	=>	'<h2>',
			'after_title'	=>	'</h2>',
		));
add_theme_support('post-thumbnails');
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
?>
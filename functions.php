<?php
function punchng_election_monitor_load_css(){
    //enqueue css
    wp_register_style('fonts','https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;600;700&family=Alegreya:wght@100;300;400;500;600;700&family=Cheltenham:wght@100;300;400;500;600;700&adisplay=swap',array(), false, 'all');
    wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css',array(), false, 'all');
    wp_register_style('custom-css', get_template_directory_uri().'/assets/css/custom.css', array(), false, 'all');

    
    wp_enqueue_style('fonts');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom-css');
}
add_action('wp_enqueue_scripts', 'punchng_election_monitor_load_css');


function punchng_election_monitor_load_js(){
    // enqueue js
    wp_register_script('jquery-slim','https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js','jquery',false,true);
    wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js',array(),false,true);
    wp_register_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js',array(),false,true);
    // wp_register_script('bootstrap-bundle', get_template_directory_uri().'/assets/js/bootstrap.bundle.js', array(),false,true);

    wp_enqueue_script('bootstrap');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-slim');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('bootstrap-bundle');
}
add_action('wp_enqueue_scripts', 'punchng_election_monitor_load_js');



function punchng_election_monitor_custom_excerpt_length( $excerpt ) {
    return 20;
}
add_filter( 'excerpt_length', 'punchng_election_monitor_custom_excerpt_length', 10 );

function punchng_election_monitor_menus(){
    $locations = array(
        'top-menu' => "Top menu location"
    );
    register_nav_menus( $locations);
}
add_action( 'init', 'punchng_election_monitor_menus');


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

add_image_size( 'medium-size-img', 300, 400, false );

?>
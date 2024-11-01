<?php
/*
  Plugin Name: WP Creative Portfolio
  Plugin URI: http://www.e2soft.com/blog/wp-creative-portfolio/
  Description: WordPress Portfolio Plugin is a wordpress portfolio plugin. Use this shortcode <strong>[CREATIVE-PORTFOLIO]</strong> in the post/page" where you want to display slider.
  Version: 1.9
  Author: S M Hasibul Islam
  Author URI: http://www.e2soft.com
  Copyright: 2018 S M Hasibul Islam http:/`/www.e2soft.com
  License URI: license.txt
  Text Domain: wpcp
 */


#######################	eWP Portfolio Plugin ###############################

if ( ! function_exists('creative_register_portfolio_post') ) {
// Register Custom Post Type
function creative_register_portfolio_post() {

	$labels = array(
		'name'                => _x( 'Portfolios', 'Post Type General Name', 'wpcp' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'wpcp' ),
		'menu_name'           => __( 'Portfolio', 'wpcp' ),
		'parent_item_colon'   => __( 'Parent Portfolio:', 'wpcp' ),
		'all_items'           => __( 'All Portfolios', 'wpcp' ),
		'view_item'           => __( 'View Portfolio', 'wpcp' ),
		'add_new_item'        => __( 'Add New Portfolio', 'wpcp' ),
		'add_new'             => __( 'Add New', 'wpcp' ),
		'edit_item'           => __( 'Edit Portfolio', 'wpcp' ),
		'update_item'         => __( 'Update Portfolio', 'wpcp' ),
		'search_items'        => __( 'Search Portfolio', 'wpcp' ),
		'not_found'           => __( 'Not found', 'wpcp' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'wpcp' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'wpcp' ),
		'description'         => __( 'Portfolio Description', 'wpcp' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );
}
// Hook into the 'init' action
add_action( 'init', 'creative_register_portfolio_post', 0 );
}

// Register Custom Taxonomy
function creativwpcp_category_rgister() {

	$labels = array(
		'name'                       => _x( 'Portfolios', 'Taxonomy General Name', 'wpcp' ),
		'singular_name'              => _x( 'Portfolio', 'Taxonomy Singular Name', 'wpcp' ),
		'menu_name'                  => __( 'Portfolio Category', 'wpcp' ),
		'all_items'                  => __( 'All Portfolios', 'wpcp' ),
		'parent_item'                => __( 'Parent Portfolio', 'wpcp' ),
		'parent_item_colon'          => __( 'Parent Portfolio:', 'wpcp' ),
		'new_item_name'              => __( 'New Portfolio Name', 'wpcp' ),
		'add_new_item'               => __( 'Add New Portfolio', 'wpcp' ),
		'edit_item'                  => __( 'Edit Portfolio', 'wpcp' ),
		'update_item'                => __( 'Update Portfolio', 'wpcp' ),
		'separate_items_with_commas' => __( 'Separate portfolios with commas', 'wpcp' ),
		'search_items'               => __( 'Search portfolios', 'wpcp' ),
		'add_or_remove_items'        => __( 'Add or remove portfolios', 'wpcp' ),
		'choose_from_most_used'      => __( 'Choose from the most used portfolios', 'wpcp' ),
		'not_found'                  => __( 'Not Found', 'wpcp' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'creativwpcp_category_rgister', 0 );

// Register Custom Taxonomy
function creativwpcp_skills_rgister() {

	$labels = array(
		'name'                       => _x( 'Technologies', 'Taxonomy General Name', 'wpcp' ),
		'singular_name'              => _x( 'Technology', 'Taxonomy Singular Name', 'wpcp' ),
		'menu_name'                  => __( 'Technologies', 'wpcp' ),
		'all_items'                  => __( 'All Technologies', 'wpcp' ),
		'parent_item'                => __( 'Parent Technology', 'wpcp' ),
		'parent_item_colon'          => __( 'Parent Technology:', 'wpcp' ),
		'new_item_name'              => __( 'New Technology Name', 'wpcp' ),
		'add_new_item'               => __( 'Add New Technology', 'wpcp' ),
		'edit_item'                  => __( 'Edit Technology', 'wpcp' ),
		'update_item'                => __( 'Update Technology', 'wpcp' ),
		'separate_items_with_commas' => __( 'Separate technologies with commas', 'wpcp' ),
		'search_items'               => __( 'Search technologies', 'wpcp' ),
		'add_or_remove_items'        => __( 'Add or remove technologies', 'wpcp' ),
		'choose_from_most_used'      => __( 'Choose from the most used technologies', 'wpcp' ),
		'not_found'                  => __( 'Not Found', 'wpcp' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'technology', array( 'portfolio' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'creativwpcp_skills_rgister', 0 );

// Register Script
function wpcp_scripts() {
    wp_enqueue_script('contentcarousel', plugins_url('/js/contentcarousel.js', __FILE__), array('jquery'), true);
	wp_enqueue_script('easing', plugins_url('/js/easing.js', __FILE__), array('jquery'), true);
	wp_enqueue_script('mousewheel', plugins_url('/js/mousewheel.js', __FILE__), array('jquery'), true);
    wp_enqueue_style('jscrollpane', plugins_url('/css/jscrollpane.css', __FILE__));
	wp_enqueue_style('wpts-style', plugins_url('/css/wpts-style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'wpcp_scripts');

// Register Admin Script
function wpcp_scripts_admin() {
    wp_enqueue_style('wpts-admin', plugins_url('/css/wpts-admin.css', __FILE__));
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
	wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
}
add_action('admin_enqueue_scripts', 'wpcp_scripts_admin');

function wpcp_content(){ 
	echo '<div id="ca-container" class="ca-container"><div class="ca-wrapper">';
	// WP_Query arguments
	$args = array (
		'post_type'              => 'portfolio',
		'post_status'            => 'publish',
	);
	// The Query
	$e_query = new WP_Query( $args );
	// The Loop
	if ( $e_query->have_posts() ) {
		while ( $e_query->have_posts() ) {
			$e_query->the_post(); ?>
        <div class="ca-item">
        <div class="ca-item-main">
        <?php $ewp_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true ); ?>
        <img src="<?php echo $ewp_img[0]; ?>" alt="<?php the_title(); ?>">
        <h3><?php the_title(); ?></h3>
		<?php $ewp_number_word = get_option('ewp_number_word'); ?>
        <p><span><?php echo e_excerpt($ewp_number_word); ?></span></p>
        <div class="ca-more-wrap"><a class="ca-more" href="<?php the_permalink(); ?>">More...</a></div>
        </div>
        <div class="ca-content-wrapper">
        <div class="ca-content">
        <a href="#" class="ca-close">Close</a>
        <div class="ca-content-text">
		<?php $ewp_content_word = get_option('ewp_content_word'); ?>
        <?php echo e_content($ewp_content_word); ?>
        <br />
        <a class="more-link" href="<?php the_permalink(); ?>">More...</a>
        </div>
        <ul>
        <?php 
		$portfolio_categories = get_terms('portfolio_category');
		foreach($portfolio_categories as $portfolio_category){
			echo '<li><a href="' .$portfolio_category->slug. '">' .$portfolio_category->name. '</a></li>';
		}
		?>
        </ul>
        </div>
        </div>
        </div>
        
        	<?php
		}
	} else {
		echo 'No posts found';
	}
	// Restore original Post Data
	wp_reset_query();
	echo '</div></div>';
 }

//Portfolio Slide Script
function wpcp_slide_script() {
    ?>
    <script type="text/javascript">
		jQuery('#ca-container').contentcarousel({
			sliderSpeed     : 500,
			sliderEasing    : 'easeOutExpo',
			itemSpeed       : 500,
			itemEasing      : 'easeOutExpo',
			scroll          : 3
		});
	</script>
    <?php
}
add_action('wp_footer', 'wpcp_slide_script', 100);


function wpcp_slides_options()
{
	echo get_option('wpcp_option1').get_option('wpcp_option2');
}
add_action('wp_footer', 'wpcp_slides_options', 100);

//Add Shortcode
function wpcp_content_exist() {
    return wpcp_content();
}
add_shortcode('CREATIVE-PORTFOLIO', 'wpcp_content_exist');

//Include PHP files
foreach ( glob( plugin_dir_path( __FILE__ )."lib/*.php" ) as $e_file )
    include_once $e_file;
	
// Page Redirect
register_activation_hook(__FILE__, 'ewp_plugin_activate');
add_action('admin_init', 'ewp_plugin_redirect');

function ewp_plugin_activate() {
    add_option('ewp_plugin_do_activation_redirect', true);
}

function ewp_plugin_redirect() {
    if (get_option('ewp_plugin_do_activation_redirect', false)) {
        delete_option('ewp_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("edit.php?post_type=portfolio&page=portfolio");
        }
    }
}

// Custom Excerpt 
function e_excerpt($limit) {
	$post_type = get_post_type( get_the_ID() );
	if ( $post_type == 'portfolio' ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		} 
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}else { return the_excerpt();}
}

// Custom Content 
function e_content($limit) {
	$post_type = get_post_type( get_the_ID() );
	if ( $post_type == 'portfolio' ) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content);
		} else {
		$content = implode(" ",$content);
		} 
		$content = preg_replace('`\[[^\]]*\]`','',$content);
		return $content;
	} else { return the_content();}
}
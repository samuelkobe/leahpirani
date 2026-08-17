<?php
/*
 *  Author: Sam Kobe | @samuelkobe
 *  URL: leahpirani.com
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
    acf_set_options_page_menu("Theme Settings");
}

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('menu', 600, 600, true); // Menu Hover Thumbnail
    add_image_size('mobile', 750, 1624, true); // Custom Thumbnail Size call using the_post_thumbnail('mobile');
    add_image_size('tablet', 1536, 2048, true); // Custom Thumbnail Size call using the_post_thumbnail('tablet');
    add_image_size('hero', 1640, '', true); // Custom Thumbnail Size call using the_post_thumbnail('hero');
    add_image_size('hero-large', 2560, '', true); // Custom Thumbnail Size call using the_post_thumbnail('hero');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu text-1.5xl lg:text-2xl leading-relaxed-2x lg:leading-relaxed-3x w-48',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
		'depth'           => 0,
    'add_li_class'    => '',
		'walker'          => false
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

  	// wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
    // wp_enqueue_script('conditionizr'); // Enqueue it!
    //
    // wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
    // wp_enqueue_script('modernizr'); // Enqueue it!

    wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('html5blankscripts'); // Enqueue it!
}
}

// Load HTML5 Blank footer scripts
function html5blank_footer_scripts()
{
  wp_register_script('menu-settings', get_template_directory_uri() . '/js/menu.js');
  wp_enqueue_script('menu-settings'); // Enqueue it!

  wp_register_script('focus-helper-settings', get_template_directory_uri() . '/js/focus-helper.js');
  wp_enqueue_script('focus-helper-settings'); // Enqueue it!

  //vh height adjustment script for ensuring tailwind h-screen(100vh) heights are not effected by mobile browser's UI and controls
  wp_register_script('h-vh', get_template_directory_uri() . '/js/h-vh.js');
  wp_enqueue_script('h-vh'); // Enqueue it!

  if (is_front_page()) {
    wp_register_script('homepage-swiper', get_template_directory_uri() . '/js/swiper/homepage-swiper.js'); // Conditional script(s)
    wp_enqueue_script('homepage-swiper'); // Enqueue it!
  }
  if (is_page('about')) {
    wp_register_script('about-page-settings', get_template_directory_uri() . '/js/gif-reveal.js'); // Conditional script(s)
    wp_enqueue_script('about-page-settings'); // Enqueue it!
  }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

/*Allow Span tags in editor*/
function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[id|name|class|style]';

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // Super important: return $init!
    return $init;
}

/*------------------------------------*\
	Web Ok - Navigation alterations
\*------------------------------------*/

// Remove and add custom navigation classes - Web Ok
function add_link_atts($atts, $item) {
  define( 'WP_DEBUG', true );
  $atts['class'] = "menu-anchor";
  $atts['data-title'] = $item->title;
  $atts['data-alt-text'] = $item->title;
  $atts['data-image-url'] = get_the_post_thumbnail_url( $item->object_id, 'menu' ) ;
  return $atts;
}

function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

function clear_nav_menu_item_class($classes, $item, $args) {
  if (in_array('current-menu-item', $classes) ){
    return array('active');
  } else {
    return array();
  }
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Head Scripts to wp_head
add_action('wp_footer', 'html5blank_footer_scripts'); // Add a Footer scripts to footer.php
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_work'); // Add Work Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('tiny_mce_before_init', 'myextensionTinyMCE' ); // add span tags to editors

add_filter('nav_menu_link_attributes', 'add_link_atts', 10, 2); // add attr to menu anchors - Web Ok
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3); // Remove id attr on menu items - Web Ok
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3); // Remove class attr on menu items - Web Ok
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 15, 3); // Reset/Add custom menu class - Web Ok

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Remove specific pages
function remove_menu_items() {
    if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php' ); // removes Posts for non-Admins
        remove_menu_page('edit-comments.php'); // removes Comments for non-Admins
        remove_menu_page('tools.php'); // removes Tools for non-Admins
    endif;
}
add_action( 'admin_menu', 'remove_menu_items' );

function hide_menu() {
 	$user = wp_get_current_user();

	// Check if the current user is an Editor
	if ( in_array( 'editor', (array) $user->roles ) ) {

		// They're an editor, so grant the edit_theme_options capability if they don't have it
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			$role_object = get_role( 'editor' );
			$role_object->add_cap( 'edit_theme_options' );
		}

		// Hide the Themes page
	    remove_submenu_page( 'themes.php', 'themes.php' );

	    // Hide the Widgets page
	    remove_submenu_page( 'themes.php', 'widgets.php' );

	    // Hide the Customize page
	    remove_submenu_page( 'themes.php', 'customize.php' );

	    // Remove Customize from the Appearance submenu
	    global $submenu;
	    unset($submenu['themes.php'][6]);
	}
}

add_action('admin_menu', 'hide_menu', 10);

/*------------------------------------*\
	Custom Work Post Type
\*------------------------------------*/

function create_post_type_work()
{
    register_taxonomy_for_object_type('category', 'work'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'work');
    register_post_type('work', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Works', 'work'),
            'singular_name' => __('Work', 'work'),
            'add_new' => __('Add Work', 'work'),
            'add_new_item' => __('Add New Work', 'work'),
            'edit' => __('Edit', 'work'),
            'edit_item' => __('Edit Work', 'work'),
            'new_item' => __('New Work', 'work'),
            'view' => __('View Work', 'work'),
            'view_item' => __('View Work', 'work'),
            'search_items' => __('Search Works', 'work'),
            'not_found' => __('No Works found', 'work'),
            'not_found_in_trash' => __('No Works found in Trash', 'work')
        ),
        'has_archive' => true,
        'public' => true,
        'menu_position' => 2,
        'rewrite' => array(
          'slug' => 'work-list'
        ),
        'menu_icon' => 'dashicons-star-filled',
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category',
        ) // Add Category and Post Tags support
    ));
}

//password protected Message

function custom_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<p class='text-2xl lg:text-3xl leading-none text-center'>This project is protected<br><span class='text-base lg:text-lg leading-tight text-secondary-dark mb-8 inline-block'>Please enter the password to continue.</span></p>" ) . '
    <div class="relative flex items-center justify-center">
    <label for="' . $label . '"></label>
    <input class="leading-normal text-input w-full h-12 bg-tertiary border-b-2 border-secondary px-2" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />
    <input class="submit-input w-11 h-11 leading-normal text-secondary text-2xl bg-transparent p-2 absolute right-0 top-0 cursor-pointer" type="submit" name="Submit" value="' . esc_attr__( "->" ) . '" /></div>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'custom_password_form' );

//lastest_work style implementation
function lastest_works_styles($count) {
  $classes;

  if($count % 2 == 0){
    $check = 'even';
  } else {
    $check = 'odd';
  }

  switch ($check) {
    case 'odd':
      if ($count == 1 || $count == 5) {
        $classes = 'justify-end md:mr-16 lg:mr-20 xl:mr-48 3xl:mr-80 md:max-h-16 lg:max-h-72 xl:max-h-96';
      } else {
        $classes = 'justify-end md:mr-16 lg:mr-20 xl:mr-48 3xl:mr-80';
      }
      break;
    case 'even':
      $classes = 'justify-start md:ml-16 lg:ml-20 xl:ml-48 3xl:ml-80';
      break;
    default:
      $classes = 'justify-start md:ml-16 lg:ml-20 xl:ml-48 3xl:ml-80';
      break;
  }
  return $classes;
}

// stripping function
function strip_gif_short_code_content($passed_content) {
	$content = str_replace(['.', ',', '–', '`', '~', '&', '?', '/', '\'', '"'], '', $passed_content);
	$content = str_replace([' '], '-', $content);
	return strtolower($content);
}

// ShortCodes

// Add Shortcode
function Add_Text_And_Gif( $atts = array() ) {

	// Attributes
  extract(shortcode_atts(array(
   'content' => 'You forgot the content.',
   'img' => 'https://media.giphy.com/media/ggnUjyuZ5h5WTwbykm/giphy.gif',
   'top' => 'auto',
   'bottom' => 'auto',
   'left' => 'auto',
   'right' => 'auto',
  ), $atts));
  $stripped_content = strip_gif_short_code_content($content);
  return
  "<span class=\"md:underline relative gif-child inline\" data-gif-content=\"$stripped_content\">$content</span>
    <img id=\"gif_$stripped_content\" class=\"hidden absolute z-20\" style=\"top:$top; bottom:$bottom; left:$left; right:$right; width:20vw; height: auto;\" src=\"$img\" data-gif-img-url=\"$stripped_content\" />";
}
add_shortcode( 'gif_insert', 'Add_Text_And_Gif' );

?>

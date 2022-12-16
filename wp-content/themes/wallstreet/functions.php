<?php
/* * Theme Name	: wallstreet
 * Theme Core Functions and Codes
 */
$wallstreet_theme = wp_get_theme();
if( $wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child' ) {
    if ( ! function_exists( 'wal_fs' ) ) {
        if ( function_exists( 'webriti_companion_activate' ) && defined( 'WC__PLUGIN_DIR' ) && file_exists(WC__PLUGIN_DIR . '/freemius/start.php') ) {
            // Create a helper function for easy SDK access.
            function wal_fs() {
                global $wal_fs;

                if ( ! isset( $wal_fs ) ) {
                    // Include Freemius SDK.
                    require_once WC__PLUGIN_DIR . '/freemius/start.php';

                    $wal_fs = fs_dynamic_init( array(
                        'id'                  => '11205',
                        'slug'                => 'wallstreet',
                        'type'                => 'theme',
                        'public_key'          => 'pk_d137ec37b3cb9ac46b97eba73ac6a',
                        'is_premium'          => false,                        
                        // If your theme is a serviceware, set this option to false.
                        'has_addons'          => false,
                        'has_paid_plans'      => true,
                        'menu'                => array(
                            'slug'           => 'wallstreet-welcome',
                            'account' => true,
							              'contact' => true,
							              'support' => false,
                        ),
                        'navigation'                     => 'menu',
						            'is_org_compliant'               => true,
                      
                    ) );
                }

                return $wal_fs;
            }

            // Init Freemius.
            wal_fs();
            // Signal that SDK was initiated.
            do_action( 'wal_fs_loaded' );
        }
    }
}
// Global variables define
if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}
/* * Includes reqired resources here* */
define('WALLSTREET_TEMPLATE_DIR_URI', get_template_directory_uri());
define('WALLSTREET_TEMPLATE_DIR', get_template_directory());
define('WALLSTREET_THEME_FUNCTIONS_PATH', WALLSTREET_TEMPLATE_DIR . '/functions');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/menu/wallstreet_nav_walker.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
//Customizer
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro-feature.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
//require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-home.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-social.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-blog.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-header-option.php' ); // adding width slider for site identity 
//Range Slider Control added in Site Indentity tab 
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/customizer-slider/customizer-slider.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/toggle/class-toggle-control.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/customizer-image-radio/customizer-image-radio.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/customizer-tabs/class/class-wallstreet-customize-control-tabs.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/upsell/class-customize.php');

if( $wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child' ) {
    require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-theme-mode.php');
    require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-header-layout.php' ); 
}
// add detect button
add_action('admin_init', 'wallstreet_detect_button');

function wallstreet_detect_button() {
    wp_enqueue_style('wallstreet-info-button', WALLSTREET_TEMPLATE_DIR_URI . '/css/import-button.css');
}
if ( ! function_exists( 'wallstreet_customizer_preview_scripts' ) ) {
    function wallstreet_customizer_preview_scripts() {
        wp_enqueue_script( 'wallstreet-customizer-preview', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
    }
}
add_action( 'customize_preview_init', 'wallstreet_customizer_preview_scripts' ); 
// add style
function wallstreet_custom_enqueue_css() {
    wp_enqueue_style('wallstreet-drag-drop', WALLSTREET_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}
add_action('admin_print_styles', 'wallstreet_custom_enqueue_css', 10);
//wp title tag starts here
function wallstreet_head($title, $sep) {
    global $paged, $page;
    if (is_feed())
        return $title;
// Add the site name.
    $title .= get_bloginfo('name', 'display');
// Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";
// Add a page number if necessary.
    if (( $paged >= 2 || $page >= 2 ) && !is_404())
        $title = "$title $sep " . sprintf(esc_html__('Page', 'wallstreet'), max($paged, $page));

    return $title;
}
add_filter('wp_title', 'wallstreet_head', 10, 2);
require_once('wallstreet_theme_setup_data.php');
add_action('after_setup_theme', 'wallstreet_setup');
function wallstreet_setup() {
    global $content_width;
    if (!isset($content_width))
        $content_width = 600; //In PX
// Load text domain for translation-ready
    load_theme_textdomain('wallstreet', WALLSTREET_TEMPLATE_DIR . '/language');
    add_theme_support('post-thumbnails'); //supports featured image
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', esc_html__('Primary Menu', 'wallstreet')); //Navigation
    // theme support
    $args = array('default-color' => '000000',);
    add_theme_support('custom-background', $args);
    add_theme_support('automatic-feed-links');
    // woocommerce support
    add_theme_support('woocommerce');
    //Added Woocommerce Galllery Support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    //Add theme Support Title Tag
    add_theme_support('title-tag');
    //Custom logo
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 250,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    add_editor_style();
    add_action('wp_enqueue_scripts', 'wallstreet_scripts');
    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }
    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Wallstreet' == $theme->name || 'Wallstreet child' == $theme->name || 'Wallstreet Child' == $theme->name) {
        if (is_admin()) {
            require get_template_directory() . '/admin/admin-init.php';
        }
    }
}
// Read more tag to formatting in blog page
function wallstreet_new_content_more($more) {
    global $post;
    return '<div class=\"blog-btn-col\"><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"blog-btn\">" . esc_html__('Read More', 'wallstreet') . '</a></div>';
}
add_filter('the_content_more_link', 'wallstreet_new_content_more');
/* sidebar */
add_action('widgets_init', 'wallstreet_widgets_init');
function wallstreet_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'wallstreet'),
        'id' => 'sidebar_primary',
        'description' => esc_html__('Sidebar widget area', 'wallstreet'),
        'before_widget' => '<div class="sidebar-widget" >',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer widget area', 'wallstreet'),
        'id' => 'footer-widget-area',
        'description' => esc_html__('Footer widget area', 'wallstreet'),
        'before_widget' => '<div class="col-md-3 col-sm-6 footer_widget_column">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer_widget_title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('WooCommerce sidebar widget area', 'wallstreet'),
        'id' => 'woocommerce',
        'description' => esc_html__('WooCommerce sidebar widget area', 'wallstreet'),
        'before_widget' => '<div class="sidebar-widget" >',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
function wallstreet_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive comment-img img-circle", $class);
    return $class;
}
add_filter('get_avatar', 'wallstreet_add_gravatar_class');
function wallstreet_scripts() {
    $current_options = get_option('wallstreet_pro_options');
    wp_enqueue_style('wallstreet-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', WALLSTREET_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_enqueue_style('wallstreet-default', WALLSTREET_TEMPLATE_DIR_URI . '/css/default.css');
    wp_enqueue_style('wallstreet-theme-menu', WALLSTREET_TEMPLATE_DIR_URI . '/css/theme-menu.css');
    wp_enqueue_style('wallstreet-media-responsive', WALLSTREET_TEMPLATE_DIR_URI . '/css/media-responsive.css');
    wp_enqueue_style('wallstreet-font-awesome-min', WALLSTREET_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('wallstreet-tool-tip', WALLSTREET_TEMPLATE_DIR_URI . '/css/css-tooltips.css');
    wp_enqueue_script('wallstreet-menu', WALLSTREET_TEMPLATE_DIR_URI . '/js/menu/menu.js', array('jquery'));
    wp_enqueue_script('wallstreet-bootstrap', WALLSTREET_TEMPLATE_DIR_URI . '/js/bootstrap.min.js');
    require_once('custom_style.php');
}
add_action('admin_init', 'wallstreet_customizer_css');
function wallstreet_customizer_css() {
    wp_enqueue_style('wallstreet-customizer-info', WALLSTREET_TEMPLATE_DIR_URI . '/css/pro-feature.css');
}
// code for comment
if (!function_exists('wallstreet_comment')) {

    function wallstreet_comment($comment, $args, $depth) {
        global $comment_data;
//translations
        $leave_reply = isset($comment_data['translation_reply_to_coment']) ? $comment_data['translation_reply_to_coment'] : esc_html__('Reply', 'wallstreet');
        ?>
        <div <?php comment_class('media comment_box'); ?> id="comment-<?php comment_ID(); ?>">
            <a class="pull-left-comment" href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar($comment, 70); ?></a>
            <div class="media-body">
                <div class="comment-detail">
                    <h4 class="comment-detail-title"><?php comment_author(); ?><span class="comment-date"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php esc_html_e('Posted on &nbsp;', 'wallstreet'); ?><?php echo esc_html(comment_time('g:i a')); ?><?php echo " - ";
                echo esc_html(comment_date('M j, Y')); ?></a></span></h4>
                    <?php comment_text(); ?>
        <?php edit_comment_link(esc_html__('Edit', 'wallstreet'), '<p class="edit-link">', '</p>'); ?>
                    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('reply_text' => $leave_reply, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
                    </div>
        <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'wallstreet'); ?></em>
                        <br/>
        <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
    }

}
// end of wallstreet_comment function
add_action('wp_head', 'wallstreet_head_enqueue_custom_css');
function wallstreet_head_enqueue_custom_css() {
    $current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
    if ($current_options['webrit_custom_css'] != '') {
        ?>
        <style>
        <?php echo esc_html($current_options['webrit_custom_css']); ?>
        </style>
    <?php
    }
}
function wallstreet_custmizer_style() {

    wp_enqueue_style('wallstreet-customizer-css', WALLSTREET_TEMPLATE_DIR_URI . '/css/cust-style.css');
}
add_action('customize_controls_print_styles', 'wallstreet_custmizer_style');
require_once get_template_directory() . '/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'wallstreet_register_required_plugins');
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function wallstreet_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => esc_html__('Webriti Companion','wallstreet'),
            'slug' => 'webriti-companion',
            'required' => false,
        )
    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'wallstreet', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

// add css on activate webriti-companion plugin

$wallstreet_pluginList = get_option('active_plugins');
$wallstreet_webriti_companion_plugin = 'webriti-companion/webriti-companion.php';
if (!in_array($wallstreet_webriti_companion_plugin, $wallstreet_pluginList)) :
    add_action('wp_head', 'wallstreet_homepage_blog_css');

    function wallstreet_homepage_blog_css() {
        echo '<style type="text/css">
			.home-blog-section {
			    padding: 140px 0 20px!important;
			}
	  	 </style>';
    }
endif;
//Set for old user
if (!get_option('wallstreet_user', false)) {
     //detect old user and set value
    $wallstreet_green_user = get_option('wallstreet_pro_options', array());
    if ((isset($wallstreet_green_user['service_title']) || isset($wallstreet_green_user['service_description']) || isset($wallstreet_green_user['home_blog_heading']) || isset($wallstreet_green_user['home_blog_description']))) {
        add_option('wallstreet_user', 'old');
    }
    else{
        if ( version_compare(wp_get_theme()->get('Version'), '2.1') <= 0 ) {
            add_option('wallstreet_user', 'new');
        }
        else {
            add_option('wallstreet_user', 'new_user');
        }
    }
}

//Custom CSS compatibility
$wallstreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
if ($wallstreet_current_options['webrit_custom_css'] != '' && $wallstreet_current_options['webrit_custom_css'] != 'nomorenow') {
    $wallstreet_css = '';
    $wallstreet_css .= $wallstreet_current_options['webrit_custom_css'];
    $wallstreet_css .= (string) wp_get_custom_css(get_stylesheet());
    $wallstreet_current_options['webrit_custom_css'] = 'nomorenow';
    update_option('wallstreet_pro_options', $wallstreet_current_options);
    wp_update_custom_css_post($wallstreet_css, array());
}
if( $wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child' ) {
    // Notice to add required plugin
    function wallstreet_admin_plugin_notice_warn() {
        $theme_name = wp_get_theme();
        if ( get_option( 'dismissed-wallstreet_comanion_plugin', false ) ) {
           return;
        }
        if ( function_exists('webriti_companion_activate')) {
            return;
        }?>

        <div class="updated notice is-dismissible wallstreet-theme-notice">

            <div class="owc-header">
                <h2 class="theme-owc-title">               
                    <svg height="60" width="60" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"><defs><style>.cls-1{font-size:33px;font-family:Verdana-Bold, Verdana;font-weight:700;}</style></defs><title>Artboard 1</title><text class="cls-1" transform="translate(-0.56 51.25)">WC</text></svg>
                    <?php echo esc_html('Webriti Companion','wallstreet');?>
                </h2>
            </div>

            <div class="wallstreet-theme-content">
                <h3><?php printf (esc_html__('Thank you for installing the %1$s theme.', 'wallstreet'), esc_html($theme_name)); ?></h3>

                <p><?php esc_html_e( 'We highly recommend you to install and activate the', 'wallstreet' ); ?>
                    <b><?php esc_html_e( 'Webriti Companion', 'wallstreet' ); ?></b> plugin.
                    <br>
                    <?php esc_html_e( 'This plugin will unlock enhanced features to build a beautiful website.', 'wallstreet' ); ?>
                </p>
                <?php
                $wallstreet_companion_about_page = Wallstreet_About_Page();            
                $wallstreet_actions = $wallstreet_companion_about_page->recommended_actions;
                $wallstreet_actions_todo = get_option( 'recommended_actions', false );
                if($wallstreet_actions): 
                    foreach ($wallstreet_actions as $key => $wallstreet_val):
                        if($wallstreet_val['id']=='install_webriti-companion'):
                            /* translators: %s: theme name */
                            echo '<p>'.wp_kses_post($wallstreet_val['link']).'</p>';
                        endif;
                    endforeach;
                endif;?>
            </div>
        </div>
        
        <script type="text/javascript">
            jQuery(function($) {
            $( document ).on( 'click', '.wallstreet-theme-notice .notice-dismiss', function () {
                var type = $( this ).closest( '.wallstreet-theme-notice' ).data( 'notice' );
                $.ajax( ajaxurl,
                  {
                    type: 'POST',
                    data: {
                      action: 'dismissed_notice_handler',
                      type: type,
                    }
                  } );
              } );
          });
        </script>
    <?php

    }
    add_action( 'admin_notices', 'wallstreet_admin_plugin_notice_warn' );
    add_action( 'wp_ajax_dismissed_notice_handler', 'wallstreet_ajax_notice_handler');

    function wallstreet_ajax_notice_handler() {
        update_option( 'dismissed-wallstreet_comanion_plugin', TRUE );
    }
    function wallstreet_notice_style(){?>
        <style type="text/css">
            label.tg-label.breadcrumbs img {
                width: 6%;
                padding: 0;
            }
            .wallstreet-theme-notice .theme-owc-title{
                display: flex;
                align-items: center;
                height: 100%;
                margin: 0;
                font-size: 1.5em;
            }
            .wallstreet-theme-notice p{
                font-size: 14px;
            }
            .updated.notice.wallstreet-theme-notice h3{
                margin: 0;
            }
            div.wallstreet-theme-notice.updated {
                border-left-color: #00c2a9;
            }
            .wallstreet-theme-content{
                padding: 0 0 1.2rem 3.57rem;
            }
        </style>
    <?php
    }
    add_action('admin_enqueue_scripts','wallstreet_notice_style');
}
if ( ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child') && (get_option('wallstreet_user', 'new') == 'new')) {
    if ( ! function_exists( 'wallstreet_customizer_custom_styles' ) ) {
        function wallstreet_customizer_custom_styles() {
            wp_enqueue_style( 'wallstreet-customizer-custom-css', WALLSTREET_TEMPLATE_DIR_URI . '/css/customize.css' );
        }
    }
    add_action( 'customize_controls_enqueue_scripts', 'wallstreet_customizer_custom_styles' );
}
?>
<?php 
/**
* Enqueue theme fonts.
*/
function wallstreet_theme_fonts() {
    $fonts_url = wallstreet_get_fonts_url();
    // Load Fonts if necessary.
    if( $fonts_url ) {
        require_once get_theme_file_path( 'wptt-webfont-loader.php' );
        wp_enqueue_style( 'wallstreet-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
    }
}
add_action( 'wp_enqueue_scripts', 'wallstreet_theme_fonts' );
add_action( 'enqueue_block_editor_assets', 'wallstreet_theme_fonts' );
/**
 * Retrieve webfont URL to load fonts locally.
 */
function wallstreet_get_fonts_url() {
    $font_families = array(
		'Roboto:100,300,400,500,700','900','italic',   
    );
    $query_args = array(
        'family'  => urlencode( implode( '|', $font_families ) ),
        'subset'  => urlencode( 'latin,latin-ext' ),
        'display' => urlencode( 'swap' ),
    );
    return apply_filters( 'wallstreet_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}
?>
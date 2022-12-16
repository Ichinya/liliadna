<style>
.custom-logo{width: <?php echo intval(get_theme_mod('wallstreet_logo_length',154));?>px; height: auto;}

body .navbar-header .wallstreet_title_head{
  	font-size: <?php echo intval( get_theme_mod('site_title_size', '38') ) . 'px'; ?> ;
 	color: <?php echo esc_attr( get_theme_mod('site_title_text_color', '#ffffff') ); ?>;
}

body .navbar-header .site-description {
 	font-size: <?php echo intval( get_theme_mod('site_tagline_size', '14') ) . 'px'; ?> ;
    color: <?php echo esc_attr( get_theme_mod('site_tagline_text_color', '#ffffff') ); ?>;
}
</style>
<?php
$wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() ); 
$wallstreet_theme_name = wp_get_theme();
if($wallstreet_theme_name == 'Wallstreet' || $wallstreet_theme_name == 'Wallstreet Child' || $wallstreet_theme_name == 'Wallstreet child' ) {

if(get_theme_mod('logo_layout','logo-title-tagline')=='logo-title-tagline' && get_theme_mod('header_layout','default')!='center' ) { ?>

<style>	
.logo-link-url { display: inline-block;padding:15px 15px 12px 15px;}
body .navbar-brand{margin-right: 0px;}
@media only screen and (min-width: 1100px){
	.navbar-header{
	display: flex;
	align-items: center;
	}
}
</style>
<?php } 

if(get_theme_mod('logo_layout','logo-title-tagline')=='title-tagline-logo' && get_theme_mod('header_layout','default')!='center') { ?>
<style>
.navbar-brand{ display: inline-block; }
.logo-link-url { display: inline-block;padding:15px 15px 12px 0px; float: left;}
.navbar > .container .navbar-brand {
    margin-right: 0px;
}
@media only screen and (min-width: 1100px){
	.navbar-header{
	display: flex;
	align-items: center;
}
}
@media only screen and (min-width: 200px) and (max-width: 480px){
.logo-link-url{
	float: none;
}
}
</style>
<?php } 
if(get_theme_mod('logo_layout','logo-title-tagline')=='top-logo-title-tagline' && get_theme_mod('header_layout','default')!='center' ) { ?>

<style>
.navbar .logo-link-url {display: block;clear: both;float: left;padding:4px 0px 8px 15px;}
.navbar .navbar-brand { display: inline-block;}
@media only screen and (max-width: 480px) and (min-width: 200px){
 .navbar .logo-link-url { float: none; text-align: center; }
}
</style>
<?php } 
if(get_theme_mod('logo_layout','logo-title-tagline')=='top-title-tagline-logo' && get_theme_mod('header_layout','default')!='center' ) {
	if(  (get_theme_mod('header_text')==true) && ( ( ($wallstreet_current_options['display_site_title'] ==true) || ($wallstreet_current_options['display_site_tagline'] == true) ))  ){ ?>

	<style>
	@media only screen and (min-width: 1023px){
	    body .navbar-brand {padding: 0 15px 25px 0;}
	}
	</style>
	<?php } ?>
	<style>
	@media only screen and (min-width: 1023px){
		.navbar .logo-link-url {
		   padding: 11px 0px;
		}
	}
	</style>
	<?php 
} 
if( get_theme_mod('header_layout','default')=='standard' ) { ?>
<style>
	body .navbar-wrapper { position: relative; }
	body .navbar.navbar-inverse{
	background-color: <?php echo esc_attr( get_theme_mod('header_background_color', '#000') ); ?>;	
}
</style>
<?php 
}

if( get_theme_mod('header_layout','default')=='center' ) { ?>
<style>
	.navbar.navbar5{
	background-color: <?php echo esc_attr( get_theme_mod('header_background_color', '#000') ); ?>;	
	}
	body .navbar .header-module{
		padding: 12px 0px;
	}
</style>
<?php 
 if( get_theme_mod('logo_layout','top-logo-title-tagline')=='logo-title-tagline' || get_theme_mod('logo_layout','top-logo-title-tagline')=='title-tagline-logo' ) { ?>
<style>
	body .index3 .logo-link-url {
		display: inline-block;
	}
	@media only screen and (min-width: 768px){
		body .navbar-header.index3{
			display: flex;
			align-items: center;
			justify-content: center;

		}
	}
</style>
<?php } 
if(get_theme_mod('logo_layout','top-logo-title-tagline')=='logo-title-tagline' ) { ?>
<style>
	@media only screen and (min-width: 768px){
		body .navbar-header.index3 .navbar-brand {
			margin-right: 20px;
		}
	}
</style>
<?php }

if(get_theme_mod('logo_layout','top-logo-title-tagline')=='title-tagline-logo' ) { ?>
<style>
	@media only screen and (min-width: 768px){
		body .navbar-header.index3 .navbar-brand {
			margin-left: 20px;
		}
	}
</style>
<?php }
}
?>
<style>
@media only screen and (min-width: 1200px){
.navbar .container{ width: <?php echo intval( get_theme_mod('header_container_width',1170));?>px; }
}
body .navbar .navbar-nav > li > a, body .navbar .navbar-nav > li > a:hover,body .navbar .navbar-nav > li > a:focus,
body .navbar .navbar-nav > .open > a, body .navbar .navbar-nav > .open > a:hover,body .navbar .navbar-nav > .open > a:focus,body .nav .active.open > a, body .nav .active.open > a:hover, body .nav .active.open > a:focus,body .search-box-outer a {
  	font-size: <?php echo intval( get_theme_mod('menus_size', '16') ) . 'px'; ?> ;
 	color: <?php echo esc_attr( get_theme_mod('menus_link_color', '#ffffff') ); ?>;
}
body .cart-header > a.cart-icon, body .cart-header > a.cart-total{
 	color: <?php echo esc_attr( get_theme_mod('menus_link_color', '#ffffff') ); ?>;
}
body .cart-header{
 	border-left-color: <?php echo esc_attr( get_theme_mod('menus_link_color', '#ffffff') ); ?>;
}
body .navbar .navbar-nav > li > a:hover, body .navbar .navbar-nav > li > a:focus, body .navbar .navbar-nav > .active > a:hover, body .navbar .navbar-nav > .active > a:focus, body .navbar .navbar-nav > .active > a, body .navbar .navbar-nav > .open > a, body .navbar .navbar-nav > .open > a:hover,body .navbar .navbar-nav > .open > a:focus, body .dropdown-menu > .active > a, body .dropdown-menu > .active > a:hover, body .dropdown-menu > .active > a:focus,
body .nav .active.open > a, body .nav .active.open > a:hover, body .nav .active.open > a:focus {
	background-color: <?php echo esc_attr( get_theme_mod('menus_link_hover_color', '#00c2a9') ); ?>;
}
body .navbar .navbar-nav > .active > a, body .navbar .navbar-nav > .active > a:hover, body .navbar .navbar-nav > .active > a:focus, body .dropdown-menu > .active > a, body .dropdown-menu > .active > a:hover, body .dropdown-menu > .active > a:focus {
	color: <?php echo esc_attr( get_theme_mod('menus_link_active_color', '#ffffff') ); ?>;
}
body .dropdown-menu > li > a{
	color: <?php echo esc_attr( get_theme_mod('submenus_link_color', '#ffffff') ); ?>;
	font-size: <?php echo intval( get_theme_mod('submenus_size', '15') ) . 'px'; ?> ;
}
body .dropdown-menu > li > a:hover,body .dropdown-menu > li > a:focus{
	color: <?php echo esc_attr( get_theme_mod('submenus_link_hover_color', '#00c2a9') ); ?>;
}
body .dropdown-menu{
	background-color: <?php echo esc_attr( get_theme_mod('submenus_background_color') ); ?>;
}

</style>
<?php
}
?>
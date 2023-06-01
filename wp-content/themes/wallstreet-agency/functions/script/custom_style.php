<style>

body .navbar5 .navbar-header .wallstreet_title_head{
    font-size: <?php echo intval( get_theme_mod('site_title_size', '38') ) . 'px'; ?> ;
    color: <?php echo esc_attr( get_theme_mod('site_title_text_color', '#ffffff') ); ?>;
}

body .navbar5 .navbar-header .site-description {
    font-size: <?php echo intval( get_theme_mod('site_tagline_size', '14') ) . 'px'; ?> ;
    color: <?php echo esc_attr( get_theme_mod('site_tagline_text_color', '#ffffff') ); ?>;
}

</style>

<?php 
$wallstreet_agency_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());

if(get_theme_mod('logo_layout','top-logo-title-tagline')=='logo-title-tagline' ){ ?>

<style>
@media (min-width: 1023px){
    body .index3 .logo-link-url{
        display: inline-block;
        padding: 15px 15px 12px 15px;
        text-align: left;

    }
    body .navbar5 .navbar-header .custom-logo-link img {
        margin: 0px;
    }
}
@media only screen and (min-width: 1100px){
    .navbar-header{
    display: flex;
    align-items: center;
    justify-content: center;
}
}
</style>

<?php }

if(get_theme_mod('logo_layout','top-logo-title-tagline')=='title-tagline-logo' ) { ?>

<style>

@media (min-width: 1023px){
    body .index3 .logo-link-url{
        display: inline-block;
        padding: 15px 15px 12px 15px;
        text-align: left;
    }
    body .navbar5 .navbar-header .custom-logo-link img {
        margin: 0px;
    }
}
@media only screen and (min-width: 1100px){
    .navbar-header{
    display: flex;
    align-items: center;
    justify-content: center;
    
}
}

<?php }
<?php
$wallstreet_agency_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ),wallstreet_theme_data_setup());
 ?>
<div class="navbar navbar-wrapper navbar-inverse navbar-static-top navbar5" role="navigation">
	 <div class="container">
	 		<!--Header Details Section-->
			<div class="navbar-header index3">
				<!-- <div class="container"> -->
				<?php
				if( (get_theme_mod('logo_layout','logo-title-tagline') =='logo-title-tagline') || (get_theme_mod('logo_layout','logo-title-tagline') =='top-logo-title-tagline' )) {
				the_custom_logo();
				}
					if( ( (get_option('blogname')!='') || (get_option('blogdescription')!='' ) ) && ( ($wallstreet_agency_options['display_site_title'] ==true) || ($wallstreet_agency_options['display_site_tagline'] == true) ))   : ?>
			      <div class="site-branding-text logo-link-url">
					<?php if(get_option('blogname')!='' && $wallstreet_agency_options['display_site_title'] ==true ): ?>
			        <h1 class="site-title">
			            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			                <div class="wallstreet_title_head"><?php bloginfo( 'name' ); ?></div>
			            </a>
			        </h1>
							<?php endif;
							$wallstreet_agency_description = get_bloginfo( 'description', 'display' );
							if(get_option('blogdescription')!='' && $wallstreet_agency_options['display_site_tagline'] ==true )
							{
									if ( $wallstreet_agency_description || is_customize_preview() ) : ?>
			    						<p class="site-description"><?php echo $wallstreet_agency_description; ?></p>
									<?php endif;
							} ?>
			      </div>
					<?php endif;

					if( (get_theme_mod('logo_layout','logo-title-tagline')=='title-tagline-logo') || (get_theme_mod('logo_layout','logo-title-tagline')=='top-title-tagline-logo') )
						{
							the_custom_logo();
						}

					?>
				<!-- </div> -->
			</div>

      <!--/Header Details Section-->
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
  			<span class="sr-only"> <?php esc_html_e('Toggle navigation','wallstreet-agency'); ?> </span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
      </button>

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-collapse collapse" id="navigation">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                'menu_class' => 'nav navbar-nav navbar-left',
                'fallback_cb' => 'wallstreet_fallback_page_menu',
                'walker' => new wallstreet_nav_walker()
                )
            );
            ?>
      </div>
   </div>
</div>

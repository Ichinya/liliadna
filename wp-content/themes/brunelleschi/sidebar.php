
	<?php if(brunelleschi_options('sidebar') !== 'none'): ?>
		<div id="sidebar" class="widget-area <?php brunelleschi_sidebar_class(); ?>" role="complementary">
			<ul class="xoxo sape">	
			<?php 
			 if (!defined('_SAPE_USER')){
					define('_SAPE_USER', '477a46df277c186a4afe8d21d9cab29ba7eb9e652710b7c1f81457a22149218d');
				 }
				 
			require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));	 
				 
			$options = [
                'force_show_code' => true,
                'charset' => 'UTF-8',
//                'verbose' => true,
            ];
			$sape = new SAPE_client($options);
			
			echo $sape->return_block_links(); 
			echo $sape->return_links(); 
			
			?>

<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'brunelleschi' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>


		<?php endif; // end primary widget area ?>
			</ul>
			
			
			<!-- Unified into one widget area, as of 1.1.8 -->
			<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
					
				<div class="widget-area" role="complementary">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
					</ul>
				</div><!-- #secondary .widget-area -->
			
			<?php endif; ?>
			
	
		</div><!-- #primary .widget-area -->
	<?php endif; ?>
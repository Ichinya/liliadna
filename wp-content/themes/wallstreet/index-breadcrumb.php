<div class="page-mycarousel">
	<img src="<?php echo esc_url(WALLSTREET_TEMPLATE_DIR_URI);?>/images/page-header-bg.jpg"  class="img-responsive">
	<div class="container page-title-col">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<?php
			 if ( class_exists( 'WooCommerce' ) ) {
			  if ( is_shop() || is_product_category() || is_product_tag() )  { ?>
					<h1><?php  echo esc_html(woocommerce_page_title() ); ?></h1>	
					<?php } else { ?>
					<h1><?php the_title(); ?></h1>
					<?php	
					}
			} else { ?>
				<h1><?php the_title(); ?></h1>	
			<?php } ?>	
			</div>	
		</div>
	</div>
	<div class="page-breadcrumbs">
		<div class="container">
			<div class="row">
				<?php if (get_previous_post_link() || get_next_post_link() ) : ?>
					<div class="col-md-12">
						<div class="navbar-collapse">
							<ul class="nav navbar-nav">
								<?php previous_post_link( '<li class="menu-item nav-item">%link</li>', '<span class="meta-nav">←</span> %title' ); ?>
								<?php next_post_link( '<li class="menu-item nav-item">%link</li>', '%title <span class="meta-nav">→</span>' ); ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
				<div class="col-md-12">
					<ol class="breadcrumbs">
						<?php if (function_exists('wallstreet_custom_breadcrumbs')) wallstreet_custom_breadcrumbs();?>
					</ol>
				</div>
			</div>	
		</div>
	</div>
</div>
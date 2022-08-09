<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'brunelleschi' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'brunelleschi' ), '<span class="edit-link">', '</span>' ); ?>
							<?php if ( function_exists( 'echo_crp' ) ) { echo_crp(); } ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

<!-- Yandex Native Ads C-A-386972-7 -->
<div id="id-C-A-386972-7"></div>
<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.renderWidget({
    renderTo: 'id-C-A-386972-7',
    blockId: 'C-A-386972-7'
  })
})</script>

	
				
				<?php comments_template( '', true ); ?>

<?php endwhile; ?>
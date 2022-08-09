<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<nav id="nav-above" class="navigation">
					<div class="navigation">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
					</div>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'brunelleschi' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'brunelleschi' ) . '</span>' ); ?></div>
				</nav><!-- #nav-above -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if(brunelleschi_options('posted-on') === __('Above Post','brunelleschi')): ?>
						<div class="entry-meta">
							<?php brunelleschi_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'brunelleschi' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->


<?php if ( get_the_author_meta( 'description' ) ) :  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'brunelleschi_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'brunelleschi' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'brunelleschi' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
						<?php if(brunelleschi_options('posted-on') === __('Below Post','brunelleschi')): ?>
						<div class="entry-meta">
							<?php brunelleschi_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
						<?php brunelleschi_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'brunelleschi' ), '<span class="edit-link">', '</span>' ); ?>
							<?php if ( function_exists( 'echo_crp' ) ) { echo_crp(); } ?>
					</div><!-- .entry-utility -->
				</article><!-- #post-## -->

<!-- #teaser-## -->				


<!-- Yandex Native Ads C-A-386972-7 -->
<div id="id-C-A-386972-7"></div>
<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.renderWidget({
    renderTo: 'id-C-A-386972-7',
    blockId: 'C-A-386972-7'
  })
})</script>



				<nav id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'brunelleschi' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'brunelleschi' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>
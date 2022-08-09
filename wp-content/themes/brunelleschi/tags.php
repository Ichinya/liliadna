<?php
/**
 * Template Name: Tags
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 */

get_header(); ?>
		
		<div id="main" role="main" class="<?php brunelleschi_content_class(); ?>">

			<?php get_template_part( 'loop' ); ?>




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
						
				<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>

<h2>Popular Tags</h2>
<ul>
<li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
</ul>

<?php endif; ?>		
						
						
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'brunelleschi' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'brunelleschi' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

<!-- #teaser-## -->				
<!-- RTB.Yandex -->
<!-- Yandex.RTB R-A-386972-6 -->
<div id="yandex_rtb_R-A-386972-6"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-386972-6",
                renderTo: "yandex_rtb_R-A-386972-6",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>			
				
				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

		</div><!-- #main -->
<?php if( brunelleschi_options('sidebar') === __('both','brunelleschi')
		|| brunelleschi_options('sidebar') === __('two left','brunelleschi')
		|| brunelleschi_options('sidebar') === __('two right','brunelleschi')){
			get_sidebar('secondary');
		} ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

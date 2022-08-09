			</div><!-- #container -->
			<footer id="footer" role="contentinfo" class="row">
				<div id="footerbar" class="twelvecol last">
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- #footerbar -->
				<div id="colophon" class="twelvecol last">
					<div id="site-info" class="sixcol">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div><!-- #site-info -->
					<div id="site-generator" class="sixcol last">
						<?php do_action( 'brunelleschi_credits' ); ?>
						Работает на WordPress. Перевод темы - k-notes
					</div><!-- #site-generator -->
				</div><!-- #colophon -->
			</footer><!-- #footer -->
		</div><!-- #wrapper -->
		<?php wp_footer(); ?>

<?php if ( current_user_can( 'manage_options' ) ) { ?>
    <div style="position:fixed;top:50px;left:5px;padding:5px;font-size:11px;color:#fff;background:#000;">
        <?php timer_stop(1); ?> /
        <?php echo get_num_queries(); ?> /
        <?php if (function_exists('memory_get_usage')) echo round(memory_get_usage()/1024/1024, 2) . 'MB'; ?>
    </div>
<?php } ?>

	</body>
</html>
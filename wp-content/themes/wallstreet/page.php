<?php get_header(); ?>
<!-- Page Title Section -->
<?php if(!is_front_page()){ get_template_part('index', 'breadcrumb'); }?>
<!-- /Page Title Section -->
<!-- Blog & Sidebar Section -->
<div class="container" id="content">
    <div class="row">		
        <!--Blog Area-->
        <div class="<?php
        if (is_active_sidebar('sidebar_primary')) {
            echo 'col-md-8';
        } else {
            echo 'col-md-12';
        }
        ?>" >
                 <?php
                 the_post();
                 ?>
            <div class="blog-detail-section">
                <?php if (has_post_thumbnail()) { ?>
                    <?php $wallstreet_defalt_arg = array('class' => "img-responsive"); ?>
                    <div class="blog-post-img">
                        <?php the_post_thumbnail('', $wallstreet_defalt_arg); ?>
                    </div>
                <?php } ?>
                <div class="clear"></div>
                <div class="blog-post-title">
                    <div class="blog-post-title-wrapper" style="width:100%";>
                        <?php the_content(); ?>
                    </div>
                </div>
				
				<div class="blog-author">
					<!-- Yandex Native Ads C-A-386972-7 -->
					<div id="id-C-A-386972-7"></div>
					<script>window.yaContextCb.push(()=>{
					  Ya.Context.AdvManager.renderWidget({
						renderTo: 'id-C-A-386972-7',
						blockId: 'C-A-386972-7'
					  })
					})</script>
				</div>
				
            </div>
            <?php comments_template('', true); ?>
        </div>
        <?php get_sidebar(); ?>
        <!--/Blog Area-->
    </div>
</div>
<?php
get_footer();

<!--Sidebar Area-->
<?php if (is_active_sidebar('sidebar_primary')) { ?>
    <div class="col-md-4">
        <div class="sidebar-section">
		
			<div class="sidebar-widget">
				<?php
					 if (!defined('_SAPE_USER')){
						define('_SAPE_USER', '477a46df277c186a4afe8d21d9cab29ba7eb9e652710b7c1f81457a22149218d');
					 }
					 require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));
					 $sape = new SAPE_client();
					 echo $sape->return_block_links();
					 echo $sape->return_links(); ?>
			</div>
		
            <?php dynamic_sidebar('sidebar_primary'); ?>
        </div>
    </div>
<?php
} 		
//	Sidebar Area
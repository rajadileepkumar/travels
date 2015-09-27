<?php 
/*
	404 Error Page
*/
	$page_background=ot_get_option('page_background');
get_header();?>
	<div class="row">
		<div class="container">
			<header class="page-header" style="background:url(<?php echo $page_background;?>) no-repeat">
				<h1 class="page-title"><?php _e('Not Found','travels');?></h1>
			</header>
			<div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'GoGetThemes'); ?></p>

                <?php get_search_form(); ?>
            </div>
		</div>
	</div>
<?php get_footer();?>
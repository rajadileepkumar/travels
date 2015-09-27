<?php
/*
Default Template index.php
*/
get_header();?>
<section class="inarvack">
	<?php
		if(has_post_thumbnail())
			the_post_thumbnail('full',array('class' => 'img-responsive'));
	?>
</section>
<section id="services" class="container">
	<div class="row">
		<div class="col-md-12 title">
			<?php the_title('<h2>','</h2>')?>
			<span class="underline">&nbsp;</span>
		</div>

		<div class="col-md-9">
			<div class="service-box wow fadeInLeft" data-wow-offset="100">
				<h3 class="service-title"><?php remove_filter('the_excerpt','wpautop'); the_excerpt();?></h3>
				<div class="clearfix"></div>
				<p class="service-content">
					<?php 
						if(have_posts()){
							while(have_posts())
								the_post();
								the_content();
						}
					?>
				</p>
			</div>
		</div>
		<div class="col-md-3">
			<?php
				add_image_size( 'custom-size', 263, 263 );
				if (class_exists('MultiPostThumbnails')) :
				    MultiPostThumbnails::the_post_thumbnail(
				        get_post_type(),
				        'feature-image-2',NULL,'custom-size'
				    );
				endif;
			?>
		</div>
	</div>
</section>
<section class="why">
	<div class="container">
		<div class="row" style="border-bottom:1px dotted #ccc">
			<?php
	            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	            $wp_query = new WP_Query( array('post_type' => 'post', 'showposts' => '8', 'paged' => $paged,'order' => 'ASC') );

	            if( $wp_query->have_posts() ):
	           
	              while ($wp_query->have_posts()) : 
	            
	                $wp_query->the_post();
          	?>
          	<?php
                echo '<div class="col-md-6 why-meher mission">';
                echo '<h1>';
                	the_title();
                	echo "&nbsp;".'<span>'.remove_filter('the_excerpt','wpautop'); the_excerpt().'</span>';
                echo '</h1>';
                echo '<p>'.the_content().'</p>';
                echo '</div>';
                endwhile;

              endif;
          ?>
		</div>
	</div>
</section>
<section class="packges">
	<?php echo do_shortcode('[package_shortcode]')?>
</section>
<?php get_footer();?>
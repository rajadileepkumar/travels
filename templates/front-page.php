<?php
/*
Template Name:Front Page
*/
get_header();?>
<section id="teaser">
		<?php echo do_shortcode('[booking_widget]')?>
</section>
  <div class="arrow-down"></div>
<section class="container" id="services">
	<div class="row">
		<div class="col=md-12 title">
			<?php 
				the_title('<h2>','</h2>');
				echo '<span class="underline">&nbsp;</span>';
			?>
		</div>
		<div class="col-md-9">
			<div class="service-box wow fadeInLeft" data-wow-offset="100">
				<h3 class="service-title"><?php the_excerpt();?></h3>
				<div class="clearfix"></div>
				<div class="service-content">
					<?php 
						if(have_posts()){
							while(have_posts()){
								the_post();
								the_content();
							}
						}
					?>
				</div>
				<center>
					<div class="read-more wow fadeInLeft" data-wow-offset="105">
					<img src="<?php bloginfo('template_url');?>/img/read-more.png" class="img-responsive">
					</div>
				</center>
				
			</div>
		</div>
		<div class="col-md-3">
			<?php
				if(has_post_thumbnail())
					the_post_thumbnail('large',array('class' => 'img-responsive'));
			?>
		</div>
	</div>
</section>
<section id="vehicles" class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="title wow fadeInDown" data-wow-offset="200">Our Vehicle - <span class="subtitle">Our rental fleet at a glance</span></h2>
		</div>
		<div class="col-md-3 vehicle-nav-row wow fadeInUp" data-wow-offset="100">
            <div id="vehicle-nav-container">
            	<ul class="vehicle-nav">
            		<?php
            			$args1=array('post_type' => 'vehicles','posts_per_page' => -1,'order' => 'ASC');
						$query1=new WP_Query($args1);
						if($query1->have_posts())
						while($query1->have_posts()){
							$query1->the_post();
            		?>
            		<li><a href="#<?php echo the_title();?>"><?php the_title();?></a><span class="active">&nbsp;</span></li>
            		<?php 
						}
						wp_reset_postdata();
					?>
            	</ul>
            </div>
            <div class="vehicle-nav-control">
              <a class="vehicle-nav-scroll" data-direction="up" href="#"><i class="fa fa-chevron-up"></i></a>
              <a class="vehicle-nav-scroll" data-direction="down" href="#"><i class="fa fa-chevron-down"></i></a>
          	</div>
        </div>
        <?php

			$args1=array('post_type' => 'vehicles','posts_per_page' => -1,'order' => 'ASC');
			$query2=new WP_Query($args1);
			if($query2->have_posts())
			while($query2->have_posts()){
				$query2->the_post();
        ?>
        <div class="vehicle-data" id="<?php echo the_title();?>">
            <div class="col-md-6 wow fadeIn" data-wow-offset="100">
              <div class="vehicle-img">
                <?php
                	if(has_post_thumbnail())
                		the_post_thumbnail('full',array('class' => 'img-responsive'));
                ?>
              </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-offset="200">
                  <div class="vehicle-price">&#8377; <?php 
								if(get_post_meta($post->ID,'my_meta_box_text3',true)){
									echo get_post_meta($post->ID,'my_meta_box_text3',true);
								}
							?> <span class="info">Extra km</span></div>
                  <table class="table vehicle-features">
                    <tr>
                    	<td>4 hrs & 40 km</td>
                     	 <td>
                     	 	<?php 
								if(get_post_meta($post->ID,'my_meta_box_text_area',true)){
									echo get_post_meta($post->ID,'my_meta_box_text_area',true);
								}
							?>
					 	</td>
                    </tr>
                    <tr>
	                	<td>8 hrs & 80 km</td>
	                	<td>
	                		<?php 
								if(get_post_meta($post->ID,'my_meta_box_text1',true)){
									echo get_post_meta($post->ID,'my_meta_box_text1',true);
								}
							?>
	                	</td>
                    </tr>
                    <tr>
                    	<td>Extra hrs</td>
                    	<td>
                    		<?php 
								if(get_post_meta($post->ID,'my_meta_box_text2',true)){
									echo get_post_meta($post->ID,'my_meta_box_text2',true);
								}
							?>
                    	</td>
                    </tr>
                    <tr>
	                    <td>OUT STATION PER KM</td>
	                    <td>
	                    	<?php 
								if(get_post_meta($post->ID,'my_meta_box_text3',true)){
									echo get_post_meta($post->ID,'my_meta_box_text3',true);
								}
							?>
	                    </td>
                    </tr>
                    <tr>
	                    <td>Luggage 	</td>
	                    <td>
	                    	<?php 
								if(get_post_meta($post->ID,'my_meta_box_text4',true)){
									echo get_post_meta($post->ID,'my_meta_box_text4',true);
								}
							?>
	                    </td>
                    </tr>
                    <tr>
	                    <td>Air conditioning</td>
	                    <td>
	                    	<?php 
								if(get_post_meta($post->ID,'my_meta_box_text5',true)){
									echo get_post_meta($post->ID,'my_meta_box_text5',true);
								}
							?>
	                    </td>
                    </tr>
                    <tr>
	                    <td>Driver Bhata(D/N)</td>
	                    <td>
	                    	<?php 
								if(get_post_meta($post->ID,'my_meta_box_text6',true)){
									echo get_post_meta($post->ID,'my_meta_box_text6',true);
								}
							?>
	                    </td>
                    </tr>
                  </table>
                  <a href="#teaser" class="reserve-button scroll-to"><span class="glyphicon glyphicon-calendar"></span> Reserve now</a>
                </div>
        </div>
        <?php
        	}
        	wp_reset_postdata();
        ?>
	</div>
</section>
<section class="packges">
	<?php echo do_shortcode('[package_shortcode]')?>
</section>

<?php get_footer();?>
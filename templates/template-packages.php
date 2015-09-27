<?php
/*
Template Name:Packages
*/
get_header();?>
	<section class="inarvack">
		<?php
			if(has_post_thumbnail())
				the_post_thumbnail('full',array('class' => 'img-responsive'));
		?>
	</section>
	<section class="packges">
		<?php echo do_shortcode('[package_shortcode]')?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="ch-grid">
						<?php 
							$i=1;
							global $post;
							$args=array('post_type' => 'packages','order' => 'ASC');
				            $query=new WP_Query($args);
				            if($query->have_posts())
				              while($query->have_posts()){
				                $query->the_post();
				        ?>
				        <li>
				        	<div class="ch-item">
				        		<div class="ch-info">
				        			<?php the_title('<h3>','</h3>');?>
				        			<p>
				        				<a href="<?php echo get_post_permalink()?>">Read More</a>
				        			</p>
				        		</div>
				        		<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),array(220,220),false, '' );?>
				        		<div class="ch-thumb ch-img-<?php echo $i ?>" style="background:url(<?php echo $src[0];?>) no-repeat"></div>
				        	</div>
				        </li>
			            <?php
			                $i=$i+1;
			              }

						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();?>
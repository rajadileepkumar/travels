<?php
/*
Template Name:Contact Page
*/
$customer_care_image=ot_get_option('customer_care_image');
$customer_center=ot_get_option('customer_center');
$customer_care_number=ot_get_option('customer_care_number');
$customer_care_email=ot_get_option('customer_care_email');
$name=ot_get_option('name');
$change_or_cancel_reservation_number=ot_get_option('change_or_cancel_reservation_number');
$change_or_cancel_reservation_email=ot_get_option('change_or_cancel_reservation_email');
$change_or_cancel_reservation_image=ot_get_option('change_or_cancel_reservation_image');

get_header();?>
<section class="inarvack">
	<?php
		if(has_post_thumbnail())
			the_post_thumbnail('full',array('class' => 'img-responsive'));
	?>
</section>
<section id="contact" class="container wow bounceInUp" data-wow-offset="50">
          <div class="row">
            <div class="col-md-12">
              <h2>Contact Us</h2>
            </div>
            <div class="col-md-4 col-xs-12 pull-right">
              <h4 class="contact-box-title">Customer Center</h4>
              <div class="contact-box">
                <img src="<?php echo $customer_care_image;?>" alt="contact-img">
                <div class="contact-box-name"><?php echo $customer_center;?></div>
                <div class="contact-box-phon"><span class="highlight">Phone:</span><?php echo $customer_care_number;?></div>
                <div class="contact-box-email"><span class="highlight">Email:</span><?php echo $customer_care_email;?></div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>

              <div class="contact-box-divider">&nbsp;</div>

              <h4 class="contact-box-title">Change or Cancel Reservation</h4>
              <div class="contact-box">
                <img src="<?php echo $change_or_cancel_reservation_image;?>" alt="contact-img">
                <div class="contact-box-name"><?php echo $name;?></div>
                <div class="contact-box-phon"><span class="highlight">Phone:</span><?php echo $change_or_cancel_reservation_number; ?></div>
                <div class="contact-box-email"><span class="highlight">Email:</span><?php echo $change_or_cancel_reservation_email;?></div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>

              <!-- <div class="contact-box">
                <img src="img/contact-box-img3.jpg" alt="contact-img">
                <div class="contact-box-name">Jane Doe</div>
                <div class="contact-box-phon"><span class="highlight">Phone:</span> 666-999-888</div>
                <div class="contact-box-email"><span class="highlight">Email:</span> connor@example.com</div>
                <div class="clearfix"></div>
              </div> -->
              <!-- <div class="contact-box-border">&nbsp;</div> -->
            </div>
            <div class="col-md-8 col-xs-12 pull-left">
              <p class="contact-info">You have any questions or need additional information? <br>
                <span class="address"><span class="highlight">Address:</span>  Car|Rental / 3861 Sepulveda Blvd. / Culver City, CA 90230</span></p>
                <form action="#" method="post" id="contact-form" name="contact-form">

                  <div class="alert hidden" id="contact-form-msg"></div>

                  <div class="form-group">
                    <input type="text" class="form-control first-name text-field" name="first-name" placeholder="First Name:">
                    <input type="text" class="form-control last-name text-field" name="last-name" placeholder="Last Name:">
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <input type="tel" class="form-control telephone text-field" name="telephone" placeholder="Telephone:">
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control email text-field" name="email" placeholder="Email:">
                  </div>

                  <div class="form-group">
                    <textarea class="form-control message" name="message" placeholder="Message:"></textarea>
                  </div>

                    <input type="submit" class="btn submit-message" name="submit-message" value="Submit Message">


                </form>
              </div>

            </div>
</section>
<section class="packges">
	<?php echo do_shortcode('[package_shortcode]')?>
</section>
<?php get_footer();?>
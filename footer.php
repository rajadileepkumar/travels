<?php 
   /*Footer template*/
   $footer_text_area=ot_get_option('footer_text_area');
   // $date = new Date('Y');
   // echo $date;
?>
	<footer class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="first-footer">
						<?php 

							if(is_active_sidebar('footer')){
								dynamic_sidebar('footer');
							}
						?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="second-footer">
						<?php
							if(is_active_sidebar('footer-1')){
								dynamic_sidebar('footer-1');
							}
							$social_links=ot_get_option('social_links',array());
							//print_r($social_links);
							echo '<ul>';
								if(!empty($social_links)){
	                        		foreach ($social_links as $link) {
	                        			
	                        			echo '<li id="' . $link['title'] .'"><a  href="' . $link['href'] . '"/><i class="fa fa-'. $link['title'] . '"></i></a></li>';
	                       
	                   				}
	                			}
							echo '</ul>';
						?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="third-footer">
						<?php 
							if(is_active_sidebar('footer-2')){
								dynamic_sidebar('footer-2');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<footer>
		<div class="container">
			<div class="col-md-12 text-center">
				<?php
					$defaults = array(
						'theme_location'  => 'footer_menu',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'footer-nav',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => new wp_bootstrap_navwalker(),
					);
					wp_nav_menu( $defaults );
					?>
					<div class="clearfix"></div>
					<p class="copyright"><?php echo "&copy;".date("Y")."&nbsp;".$footer_text_area;?></p>
			</div>
		</div>
	</footer>

	<a href="#" class="scrollup">ScrollUp</a>
	
	<?php wp_footer();?>
	<script type="text/javascript">
		var companyName = "Car Rental Station"; // Enter your event title

		$('.carousel-inner .item').first().addClass('active');

		$('.autocomplete-location').autocomplete({
		  lookup: locations
		});

		$('#drop-off-time').datetimepicker({
			datepicker:false,
			format:'H:i',
			step:5,
		});

		$('#pick-up-time').datetimepicker({
			datepicker:false,
			format:'H:i',
			step:5,
		});

		$('#pick-up-date').datetimepicker({
		
			startDate:new Date(),
			timepicker:false,
			format:'d/m/Y',
			formatDate:'Y/m/d',
			todayButton:true,
			
		});
		$('#drop-off-date').datetimepicker({
		
			startDate:new Date(),
			timepicker:false,
			format:'d/m/Y',
			formatDate:'Y/m/d',
			todayButton:true,
			
		});

		// Toggle Drop-Off Location
		$(".input-group.drop-off").hide();
		$(".different-drop-off").on("click", function(){
			$(".input-group.drop-off").toggle();
		  $(".autocomplete-suggestions").css("width", $('.pick-up .autocomplete-location').outerWidth());
		  return false;
		});

		(function($) {
			$(function() {
				$("#scroller").simplyScroll();
			});
		})(jQuery);

		// Initialize Tooltip  
		//-------------------------------------------------------------

		$('.my-tooltip').tooltip();

		// Vehicles Tabs / Slider  
//-------------------------------------------------------------
		$('.vehicle-nav li').first().addClass('active');	
		$(".vehicle-data").hide();
		var activeVehicleData = $(".vehicle-nav .active a").attr("href");
		// console.log(activeVehicleData);
		$(activeVehicleData).show();
	
	
		$('.vehicle-nav-scroll').click(function(){
	    var direction = $(this).data('direction');
	    var scrollHeight = $('.vehicle-nav li').height() + 1;
	    var navHeight = $('#vehicle-nav-container').height() + 1;
	    var actTopPos = $(".vehicle-nav").position().top;

	    // Scroll Down
	    if(direction == 'down' && -navHeight <= actTopPos - (scrollHeight * 2)){
	        topPos = actTopPos - scrollHeight;
	        $(".vehicle-nav").css('top', topPos);
	    }

	    // Scroll Up
	    if(direction == 'up' && 0 > actTopPos){
	        topPos = actTopPos + scrollHeight;
	        $(".vehicle-nav").css('top', topPos);
	    }
	    return false;
	});




	$(".vehicle-nav li").on("click", function(){

	  $(".vehicle-nav .active").removeClass("active");
	  $(this).addClass('active');

	  $(activeVehicleData).fadeOut( "slow", function() {
	    activeVehicleData = $(".vehicle-nav .active a").attr("href");
	    $(activeVehicleData).fadeIn("slow", function() {});
	  });

	  return false;
	});



	// Vehicles Responsive Nav  
	//-------------------------------------------------------------

	$("<div />").appendTo("#vehicle-nav-container").addClass("styled-select-vehicle-data");
	$("<select />").appendTo(".styled-select-vehicle-data").addClass("vehicle-data-select");
	$("#vehicle-nav-container a").each(function() {
	  var el = $(this);
	  $("<option />", {
	    "value"   : el.attr("href"),
	    "text"    : el.text()
	  }).appendTo("#vehicle-nav-container select");
	});

	$(".vehicle-data-select").change(function(){
	  $(activeVehicleData).fadeOut( "slow", function() {
	    activeVehicleData = $(".vehicle-data-select").val();
	    $(activeVehicleData).fadeIn("slow", function() {});
	  });

	  return false;
	});

	// Scroll to Top Button
//-------------------------------------------------------------------------------

	$(window).scroll(function(){
	  if ($(this).scrollTop() > 100) {
	    $('.scrollup').removeClass("animated fadeOutRight");
	    $('.scrollup').fadeIn().addClass("animated fadeInRight");
	  } else {
	    $('.scrollup').removeClass("animated fadeInRight");
	    $('.scrollup').fadeOut().addClass("animated fadeOutRight");
	  }
	});

	$('.scrollup, .navbar-brand').click(function(){
	  $("html, body").animate({ scrollTop: 0 }, 'slow', function(){
	    $("nav li a").removeClass('active');
	  });
	  return false;
	});

	// Scroll To Animation
//-------------------------------------------------------------------------------

	var scrollTo = $(".scroll-to");

	scrollTo.click( function(event) {
	  $('.modal').modal('hide');
	  var position = $(document).scrollTop();
	  var scrollOffset = 110;

	  if(position < 39)
	  {
	    scrollOffset = 260;
	  }

	  var marker = $(this).attr('href');
	  $('html, body').animate({ scrollTop: $(marker).offset().top - scrollOffset}, 'slow');

	  return false;
	});


	$( "#car-select-form" ).submit(function() {

  var selectedCar = $("#car-select").find(":selected").text();
  var selectedCarVal = $("#car-select").find(":selected").val();
  var selectedCarImage = $("#car-select").val();
  var pickupLocation = $("#pick-up-location").val();
  var dropoffLocation = $("#drop-off-location").val();
  var pickUpDate = $("#pick-up-date").val();
  var pickUpTime = $("#pick-up-time").val();
  var dropOffDate = $("#drop-off-date").val();
  var dropOffTime = $("#drop-off-time").val();

  var error = 0;

  if(validateNotEmpty(selectedCarVal)) { error = 1; }
  if(validateNotEmpty(pickupLocation)) { error = 1; }
  if(validateNotEmpty(pickUpDate)) { error = 1; }
  if(validateNotEmpty(dropOffDate)) { error = 1; }

  if(0 == error)
  {

    $("#selected-car-ph").html(selectedCar);
    $("#selected-car").val(selectedCar);
    $("#selected-vehicle-image").attr('src', selectedCarImage);

    $("#pickup-location-ph").html(pickupLocation);
    $("#pickup-location").val(pickupLocation);
    
    if("" == dropoffLocation)
    {
      $("#dropoff-location-ph").html(pickupLocation);
      $("#dropoff-location").val(pickupLocation);
    }
    else
    {
      $("#dropoff-location-ph").html(dropoffLocation);
      $("#dropoff-location").val(dropoffLocation);
    }
    
    $("#pick-up-date-ph").html(pickUpDate);
    $("#pick-up-time-ph").html(pickUpTime);
    $("#pick-up").val(pickUpDate+' at '+pickUpTime);

    $("#drop-off-date-ph").html(dropOffDate);
    $("#drop-off-time-ph").html(dropOffTime);
    $("#drop-off").val(dropOffDate+' at '+dropOffTime);

    $('#checkoutModal').modal();
  }
  else
  {
    $('#car-select-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').delay(2000).fadeOut();
  }

  return false;
});

$( "#checkout-form" ).submit(function() {

  $('#checkout-form-msg').addClass('hidden');
  $('#checkout-form-msg').removeClass('alert-success');
  $('#checkout-form-msg').removeClass('alert-danger');

  $('#checkout-form input[type=submit]').attr('disabled', 'disabled');
   var urlMail = '<?php bloginfo('template_url'); ?>/inquiry.php';
  $.ajax({
    type: "POST",
    url: urlMail,
    data: $("#checkout-form").serialize(),
    dataType: "json",
    success: function(data) {

      if('success' == data.result)
      {
        $('#checkout-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
        $('#checkout-form-msg').html(data.msg[0]);
        $('#checkout-form input[type=submit]').removeAttr('disabled');

        setTimeout(function(){
          $('.modal').modal('hide');
          $('#checkout-form-msg').addClass('hidden');
          $('#checkout-form-msg').removeClass('alert-success');

          $('#checkout-form')[0].reset();
          $('#car-select-form')[0].reset();
        }, 5000);

      }

      if('error' == data.result)
      {
        $('#checkout-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
        $('#checkout-form-msg').html(data.msg[0]);
        $('#checkout-form input[type=submit]').removeAttr('disabled');
      }

    }
  });

return false;
});



// Not Empty Validator Function
//-------------------------------------------------------------------------------

function validateNotEmpty(data){
  if (data == ''){
    return true;
  }else{
    return false;
  }
}

$( "#contact-form" ).submit(function() {

  $('#contact-form-msg').addClass('hidden');
  $('#contact-form-msg').removeClass('alert-success');
  $('#contact-form-msg').removeClass('alert-danger');

  $('#contact-form input[type=submit]').attr('disabled', 'disabled');
  var urlMail1='<?php bloginfo('template_url'); ?>/contact.php';
  $.ajax({
    type: "POST",
    url: urlMail1,
    data: $("#contact-form").serialize(),
    dataType: "json",
    success: function(data) {

      if('success' == data.result)
      {
        $('#contact-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
        $('#contact-form-msg').html(data.msg[0]);
        $('#contact-form input[type=submit]').removeAttr('disabled');
        $('#contact-form')[0].reset();
      }

      if('error' == data.result)
      {
        $('#contact-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
        $('#contact-form-msg').html(data.msg[0]);
        $('#contact-form input[type=submit]').removeAttr('disabled');
      }

    }
  });

  return false;
});


$( "#newsletter-form" ).submit(function() {

  $('#newsletter-form-msg').addClass('hidden');
  $('#newsletter-form-msg').removeClass('alert-success');
  $('#newsletter-form-msg').removeClass('alert-danger');

  $('#newsletter-form input[type=submit]').attr('disabled', 'disabled');
  var urlMail2='<?php bloginfo('template_url'); ?>/newsletter.php';
  $.ajax({
    type: "POST",
    url: urlMail2,
    data: $("#newsletter-form").serialize(),
    dataType: "json",
    success: function(data) {

      if('success' == data.result)
      {
        $('#newsletter-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
        $('#newsletter-form-msg').html(data.msg[0]);
        $('#newsletter-form input[type=submit]').removeAttr('disabled');
        $('#newsletter-form')[0].reset();
      }

      if('error' == data.result)
      {
        $('#newsletter-form-msg').css('visibility','visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
        $('#newsletter-form-msg').html(data.msg[0]);
        $('#newsletter-form input[type=submit]').removeAttr('disabled');
      }

    }
  });

  return false;
});


	</script>
</body>
</html>
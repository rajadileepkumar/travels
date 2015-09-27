<?php
/*
Car Travel Modules with descriptions
*/

require_once('lib/multi-post-thumbnails.php');
require_once('wp_bootstrap_navwalker.php');

// require_once('lib/inc/class.simple_mail.php');
// include('lib/inc/gump.class.php');
// include('lib/mail-config.php');
// include_once('lib/contact.php');


flush_rewrite_rules();
add_action('after_setup_theme','travel_setup');

function travel_setup(){

	add_editor_style();

	/*Featured image*/
	add_theme_support('post-thumbnails');

	/*Excerpt Support*/
	add_post_type_support('page','excerpt');


	/*post format */
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ,'link','image','quote','status','video','audio','chat') );

	add_post_type_support('page','post-formats');
}


add_action('wp_enqueue_scripts','travel_scripts_styles');

function travel_scripts_styles(){

	wp_register_style('style',get_template_directory_uri().'/style.css');
	wp_enqueue_style('style');

	wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap');

	wp_register_style('animate',get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style('animate');

	wp_register_style('common',get_template_directory_uri().'/css/common.css');
	wp_enqueue_style('common');

	wp_register_style('datepicker',get_template_directory_uri().'/css/datepicker.css');
	wp_enqueue_style('datepicker');

	wp_register_style('demo',get_template_directory_uri().'/css/demo.css');
	wp_enqueue_style('demo');

	wp_register_style('font-awesome',get_template_directory_uri().'/css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');

	wp_register_style('ie8fix',get_template_directory_uri().'/css/ie8fix.css');
	wp_enqueue_style('ie8fix');

	wp_register_style('normalize',get_template_directory_uri().'/css/normalize.css');
	wp_enqueue_style('normalize');

	wp_register_style('simplyscroll',get_template_directory_uri().'/css/simplyscroll.css');
	wp_enqueue_style('simplyscroll');

	wp_register_style('style3',get_template_directory_uri().'/css/style3.css');
	wp_enqueue_style('style3');

	wp_register_style('styles-green',get_template_directory_uri().'/css/styles-green.css');
	wp_enqueue_style('styles-green');

	wp_register_style('styles-red',get_template_directory_uri().'/css/styles-red.css');
	wp_enqueue_style('styles-red');

	wp_register_style('styles',get_template_directory_uri().'/css/styles.css');
	wp_enqueue_style('styles');

	wp_register_style('datetimepicker',get_template_directory_uri().'/css/jquery.datetimepicker.css');
	wp_enqueue_style('datetimepicker');

	wp_register_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),true,false);
	wp_enqueue_script('bootstrap');

	wp_register_script('datepicker',get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),true,false);
	wp_enqueue_script('datepicker');

	wp_register_script('bootstrap3',get_template_directory_uri().'/js/bootstrap3-typeahead.min.js',array(),true,false);
	wp_enqueue_script('bootstrap3');

	wp_register_script('custom',get_template_directory_uri().'/js/custom.js',array(),true,false);
	wp_enqueue_script('custom');

	// wp_register_script('custom1',get_template_directory_uri().'/js/custom.min.js',array(),true,false);
	// wp_enqueue_script('custom1');

	wp_register_script('gmap3',get_template_directory_uri().'/js/gmap3.min.js',array(),true,false);
	wp_enqueue_script('gmap3');

	wp_register_script('autocomplete',get_template_directory_uri().'/js/jquery.autocomplete.min.js',array(),true,false);
	wp_enqueue_script('autocomplete');

	wp_register_script('placeholder',get_template_directory_uri().'/js/jquery.placeholder.js',array(),true,false);
	wp_enqueue_script('placeholder');

	wp_register_script('simplyscroll',get_template_directory_uri().'/js/jquery.simplyscroll.js',array(),true,false);
	wp_enqueue_script('simplyscroll');

	wp_register_script('location',get_template_directory_uri().'/js/locations-autocomplete.js',array(),true,false);
	wp_enqueue_script('location');

	wp_register_script('modernizr',get_template_directory_uri().'/js/modernizr.custom.79639.js',array(),true,false);
	wp_enqueue_script('modernizr');

	wp_register_script('style-switcher',get_template_directory_uri().'/js/style-switcher.js',array(),true,false);
	wp_enqueue_script('style-switcher');

	wp_register_script('typeahead',get_template_directory_uri().'/js/typeahead.bundle.js',array(),true,false);
	wp_enqueue_script('typeahead');

	wp_register_script('waypoints',get_template_directory_uri().'/js/waypoints.min.js',array(),true,false);
	wp_enqueue_script('waypoints');

	wp_register_script('wow',get_template_directory_uri().'/js/wow.min.js',array(),true,false);
	wp_enqueue_script('wow');

	wp_register_script('datetimepicker',get_template_directory_uri().'/js/jquery.datetimepicker.js',array(),true,false);
	wp_enqueue_script('datetimepicker');
  ?>
      
  <?php


}

add_action('init','travel_menu');

function travel_menu(){
	register_nav_menus(
		array(
			'primar_menu' => 'Primary Menu',
			'footer_menu' => 'Footer Menu',
		));		
}

add_shortcode('booking_widget','booking_widget_banner');

function booking_widget_banner(){
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12 pull-right">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
                $slider=ot_get_option('slider',array());
                //print_r($slider);
                if(!empty($slider)){
                  foreach($slider as $slides){
                    echo '<div class="item">';
                      echo '<h1 class="title">';
                        echo $slides['title'];
                        echo '<span class="subtitle">'.$slides['description'].'</span>';
                      echo '</h1>';
                      echo '<div class="car-img">';
                        echo '<img src="'.$slides['image'].'" class="img-responsive" alt="'.$slides['title'].'">';
                      echo '</div>';
                    echo '</div>';
                  }
                }
              ?>
            </div>
              <!-- Slider Controls start -->
                      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                      <!-- Slider Controls end -->
          </div>
        </div>
        <div class="col-md-5 col-xs-12 pull-left">
          <div class="reservation-form-shadow">
            <form action="#" method="post" name="car-select-form" id="car-select-form">
              <div class="alert alert-danger hidden" id="car-select-form-msg">
                <button type="button" class="close" data-dismiss="alert" area-hidden="true">×</button>
                <strong>NOTE:</strong>All fields required!
              </div>
              <div class="styled-select-car">
                        <select name="car-select" id="car-select">
                          <option value="">Select your car type</option>
                          <?php 
                            $args=array('post_type' => 'vehicles','posts_per_page' => -1,'order' => 'ASC');
                              $query=new WP_Query($args);
                              if($query->have_posts())
                                while($query->have_posts()){
                                  $query->the_post();
                                  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),array(220,220),false, '' );
                                ?>
                                  <option value="<?php echo $src[0]; ?>" id="<?php the_title()?>">
                                    <?php the_title();?>
                                  </option>
                                <?php 
                                }
                              wp_reset_postdata();
                          ?>
                        </select>
                      </div>
                      <!-- Pick-up location start -->
                    <div class="location">
                      <div class="input-group pick-up">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span> Pick-up</span>
                        <input type="text" name="pick-up-location" id="pick-up-location" class="form-control autocomplete-location" placeholder="Enter a City or Airport">
                      </div>
                      <!-- Pick-up location end -->

                      <a class="different-drop-off" href="#">Need a different drop-off location?</a>

                      <!-- Drop-off location start -->
                      <div class="input-group drop-off">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span> Drop-off</span>
                        <input type="text" name="drop-off-location" id="drop-off-location" class="form-control autocomplete-location" placeholder="Enter a City or Airport">
                      </div>
                    </div>
                    <!-- Drop-off location end -->

                    <!-- Pick-up date/time start -->
                    <div class="datetime pick-up">
                      <div class="date pull-left">
                        <div class="input-group">
                          <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Pick-up</span>
                          <input type="text" name="pick-up-date" id="pick-up-date" class="form-control datetimepicker2" placeholder="mm/dd/yyyy">
                        </div>
                      </div>
                      <div class="time pull-right">
                        <div class="input-group">
                          <input type="text" name="pick-up-time" id="pick-up-time" class="form-control datetimepicker1">
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- Pick-up date/time end -->

                    <!-- Drop-off date/time start -->
                    <div class="datetime drop-off">
                      <div class="date pull-left">
                        <div class="input-group">
                          <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Drop-off</span>
                          <input type="text" name="drop-off-date" id="drop-off-date" class="form-control datetimepicker2" placeholder="mm/dd/yyyy">
                        </div>
                      </div>
                      <div class="time pull-right">
                        <div class="input-group">
                          <input type="text" name="drop-off-time" id="drop-off-time" class="form-control datetimepicker1">
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- Drop-off date/time end -->

                    <input type="submit" class="submit" name="submit" value="continue car reservation" id="checkoutModalLabel">
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Checkout Modal Start -->
          <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="#" method="post" id="checkout-form" name="checkout-form">

                  <!-- Modal header start -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Complete reservation</h4>
                  </div>
                  <!-- Modal header end -->

                  <!-- Modal body start -->
                  <div class="modal-body">

                    <!-- Checkout Info start -->
                    <div class="checkout-info-box">
                      <h3><i class="fa fa-info-circle"></i> Upon completing this reservation enquiry, you will receive::</h3>
                      <p>Your rental voucher to produce on arrival at the rental desk and a toll-free customer support number.</p>
                    </div>
                    <!-- Checkout Info end -->

                    <!-- Checkout Rental Info start -->
                    <div class="checkout-vehicle-info">
                      <div class="location-date-info">
                        <h3>Location & Date</h3>
                        <div class="info-box">
                          <span class="glyphicon glyphicon-calendar"></span>
                          <h4 class="info-box-title">Pick-Up Time</h4>
                          <p class="info-box-description"><span id="pick-up-date-ph"></span> at <span id="pick-up-time-ph"></span></p>
                          <input type="hidden" name="pick-up" id="pick-up" value="">
                        </div>
                        <div class="info-box">
                          <span class="glyphicon glyphicon-calendar"></span>
                          <h4 class="info-box-title">Drop-Off Time</h4>
                          <p class="info-box-description"><span id="drop-off-date-ph"></span> at <span id="drop-off-time-ph"></span></p>
                          <input type="hidden" name="drop-off" id="drop-off" value="">
                        </div>
                        <div class="info-box">
                          <span class="glyphicon glyphicon-map-marker"></span>
                          <h4 class="info-box-title">Pick-Up Location</h4>
                          <p class="info-box-description" id="pickup-location-ph"></p>
                          <input type="hidden" name="pickup-location" id="pickup-location" value="">
                        </div>
                        <div class="info-box">
                          <span class="glyphicon glyphicon-map-marker"></span>
                          <h4 class="info-box-title">Drop-Off Location</h4>
                          <p class="info-box-description" id="dropoff-location-ph"></p>
                          <input type="hidden" name="dropoff-location" id="dropoff-location" value="">
                        </div>
                      </div>

                      <div class="vehicle-info">
                        <h3>CAR: <span id="selected-car-ph"></span></h3> <a href="#vehicles" class="scroll-to">[ Vehicle Models ]</a>
                        <input type="hidden" name="selected-car" id="selected-car" value="">
                        <div class="clearfix"></div>
                        <div class="vehicle-image">
                           <img class="img-responsive" id="selected-vehicle-image" src="img/vehicle1.jpg" alt="Vehicle">
                        </div>
                      </div>

                      <div class="clearfix"></div>

                    </div>
                    <!-- Checkout Rental Info end -->

                    <hr>

                    <!-- Checkout Personal Info start -->
                    <div class="checkout-personal-info">
                      <div class="alert hidden" id="checkout-form-msg">
                        test
                      </div>
                      <h3>PERSONAL INFORMATION</h3>
                      
                      <div class="form-group left">
                        <label for="first-name">First Name:</label>
                        <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter your first name">
                      </div>
                      <div class="form-group right">
                        <label for="last-name">Last Name:</label>
                        <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter your last name">
                      </div>
                      <div class="form-group left">
                        <label for="phone-number">Phone Number:</label>
                        <input type="text" class="form-control" name="phone-number" id="phone-number" placeholder="Enter your phone number">
                      </div>
                      <div class="form-group right age">
                        <label for="age">Age:</label>
                        <div class="styled-select-age">
                          <select name="age" id="age">
                          <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                           <option value="31">31</option>
                           <option value="32">32</option>
                           <option value="33">33</option>
                           <option value="34">34</option>
                           <option value="35">35</option>
                           <option value="36">36</option>
                           <option value="37">37</option>
                           <option value="38">38</option>
                           <option value="39">39</option>
                           <option value="40">40</option>
                           <option value="41">41</option>
                           <option value="42">42</option>
                           <option value="43">43</option>
                           <option value="44">44</option>
                           <option value="45">45</option>
                           <option value="46">46</option>
                           <option value="47">47</option>
                           <option value="48">48</option>
                           <option value="49">49</option>
                           <option value="50">50</option>
                           <option value="51">51</option>
                           <option value="52">52</option>
                           <option value="53">53</option>
                           <option value="54">54</option>
                           <option value="55">55</option>
                           <option value="56">56</option>
                           <option value="57">57</option>
                           <option value="58">58</option>
                           <option value="59">59</option>
                           <option value="50">50</option>
                           <option value="61">61</option>
                           <option value="62">62</option>
                           <option value="63">63</option>
                           <option value="64">64</option>
                           <option value="65">65</option>
                           <option value="66">66</option>
                           <option value="67">67</option>
                           <option value="68">68</option>
                           <option value="69">69</option>
                           <option value="70">70</option>
                           <option value="71">71</option>
                           <option value="72">72</option>
                           <option value="73">73</option>
                           <option value="74">74</option>
                           <option value="75">75</option>
                           <option value="76">76</option>
                           <option value="77">77</option>
                           <option value="78">78</option>
                           <option value="79">79</option>
                           <option value="80">80</option>
                           <option value="81">81</option>
                           <option value="82">82</option>
                           <option value="83">83</option>
                           <option value="84">84</option>
                           <option value="85">85</option>
                           <option value="86">86</option>
                           <option value="87">87</option>
                           <option value="88">88</option>
                           <option value="89">89</option>
                           <option value="90">90</option>
                           <option value="91">91</option>
                           <option value="92">92</option>
                           <option value="93">93</option>
                           <option value="94">94</option>
                           <option value="95">95</option>
                           <option value="96">96</option>
                           <option value="97">97</option>
                           <option value="98">98</option>
                           <option value="99">99</option>
                           <option value="100">100</option>
                         </select>
                       </div>
                     </div>
                     <div class="form-group left">
                      <label for="email-address">Email Address:</label>
                      <input type="email" class="form-control" name="email-address" id="email-address" placeholder="Enter your email address">
                    </div>
                    <div class="form-group right">
                      <label for="email-address-confirm">Confirm Email Address:</label>
                      <input type="email" class="form-control" name="email-address-confirm" id="email-address-confirm" placeholder="Confirm your email address">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Checkout Personal Info end -->

                  <!-- Checkout Address Info start -->
                  <div class="checkout-address-info">
                    <div class="form-group address">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Enter your Street an No.">
                    </div>
                    <div class="form-group city">
                      <label for="city">City</label>
                      <input type="text" class="form-control" name="city" id="city" placeholder="Enter your City">
                    </div>
                    <div class="form-group zip-code">
                      <label for="zip-code">Zip Code</label>
                      <input type="text" class="form-control" name="zip-code" id="zip-code" placeholder="Enter your Zip Code">
                    </div>

                    <div class="clearfix"></div>
                  </div>
                  <!-- Checkout Address Info end -->

                  <div class="newsletter">
                    <div class="form-group">
                      <div class="checkbox">
                        <input id="check1" type="checkbox" name="newsletter" value="yes">
                        <label for="check1">Please send me latest news and updates</label>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Modal body end -->

                <!-- Modal footer start -->
                <div class="modal-footer">
                  <span class="btn-border btn-gray">
                    <button type="button" class="btn btn-default btn-gray" data-dismiss="modal">Cancel</button>
                  </span>
                  <span class="btn-border btn-yellow">
                    <button type="submit" class="btn btn-primary btn-yellow">Reserve now</button>
                  </span>
                </div>
                <!-- Modal footer end -->

              </form>
            </div>
          </div>
        </div>
        <!-- Checkout Modal end -->
  <?php 
}

/*custom post types*/

add_action('init','travel_post_types');

function travel_post_types(){
  $args=array(
    'labels' => array(
    'name' => 'Packages' ,
    'singular_name' => 'Package',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Package',
    'edit' => 'Edit Package',
    'edit_item' => 'Edit Packages',
    'show_in_nav_menus' => true,

   ),
   'public' => true,
   'supports' => array( 'excerpt', 'title', 'editor', 'thumbnail', 'comments'),
  );
  register_post_type('packages',$args);

  $args1=array(
    'labels' => array(
    'name' => 'Vehicles' ,
    'singular_name' => 'Vehicles',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Vehicles',
    'edit' => 'Edit Vehicles',
    'edit_item' => 'Edit Vehicles',
    'show_in_nav_menus' => true,

   ),
   'public' => true,
   'supports' => array( 'excerpt', 'title', 'editor', 'thumbnail', 'comments'),
  );
  register_post_type('vehicles',$args1);
}

/*sidebars*/
/*Sidebars*/
register_sidebar( array(
  'name' => __( 'Main Sidebar', 'furniture' ),
  'id' => 'sidebar',
  'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
 ) );

register_sidebar( array(
  'name' => __( 'Sidebar 1', 'furniture' ),
  'id' => 'sidebar-1',
  'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
 ) );

register_sidebar( array(
  'name' => __( 'Sidebar 2', 'furniture' ),
  'id' => 'sidebar-2',
  'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
 ) );


register_sidebar( array(
  'name' => __( 'Sidebar 3', 'furniture' ),
  'id' => 'sidebar-3',
  'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
 ) );

register_sidebar( array(
  'name' => __( 'Footer', 'furniture' ),
  'id' => 'footer',
  'description' => __( 'Appears on posts and pages which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widget-title">',
  'after_title' => '</h1>',
 ) );

register_sidebar( array(
  'name' => __( 'Footer-1', 'furniture' ),
  'id' => 'footer-1',
  'description' => __( 'Appears on posts and pages which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widget-title">',
  'after_title' => '</h1>',
 ) );

register_sidebar( array(
  'name' => __( 'Footer-2', 'furniture' ),
  'id' => 'footer-2',
  'description' => __( 'Appears on posts and pages which has its own widgets', 'twentytwelve' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widget-title">',
  'after_title' => '</h1>',
 ) );

/*metaboxes*/
add_action('add_meta_boxes','furniture_metabox');

function furniture_metabox(){
  add_meta_box('metabox_about','Vehicles Charges','about_metabox','vehicles','normal','high');
}

function about_metabox($page){
  $values=get_post_custom($page->ID);
  //print_r($values);
  $text = isset( $values['my_meta_box_text_area'] ) ? esc_attr( $values['my_meta_box_text_area'][0] ) : '';
  $text1=isset($values['my_meta_box_text1']) ? esc_attr($values['my_meta_box_text1'][0]):'';
  $text2=isset($values['my_meta_box_text2']) ? esc_attr($values['my_meta_box_text2'][0]):'';
  $text3=isset($values['my_meta_box_text3']) ? esc_attr($values['my_meta_box_text3'][0]):'';
  $text4=isset($values['my_meta_box_text4']) ? esc_attr($values['my_meta_box_text4'][0]):'';
  $text5=isset($values['my_meta_box_text5']) ? esc_attr($values['my_meta_box_text5'][0]):'';
  $text6=isset($values['my_meta_box_text6']) ? esc_attr($values['my_meta_box_text6'][0]):'';
  wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
  ?>
  <p>
    <label for="my_meta_box_text_area1">4 hrs & 40 km</label>
    <textarea name="my_meta_box_text_area" id="my_meta_box_text_area" row="5" cols="100"><?php echo $text; ?></textarea>
  </p>
  <p>
    <label for="my_meta_box_text1">8 hrs & 80 km</label>
    <input type="text" name="my_meta_box_text1" id="my_meta_box_text1" value="<?php echo $text1;?>"/>
  </p>
  <p>
    <label for="my_meta_box_text2">Extra Hrs</label>
    <input type="text" name="my_meta_box_text2" id="my_meta_box_text2" value="<?php echo $text2;?>" />
  </p>
  <p>
    <label for="my_meta_box_text3">OUT STATION PER KM</label>
    <input type="text" name="my_meta_box_text3" id="my_meta_box_text3" value="<?php echo $text3;?>" />
  </p>
  <p>
    <label for="my_meta_box_text4">Luggage</label>
    <textarea name="my_meta_box_text4" id="my_meta_box_text4" row="5" cols="100"><?php echo $text4;?></textarea>
  </p>
  <p>
    <label for="my_meta_box_text5">Air conditioning</label>
    <input type="text" name="my_meta_box_text5" id="my_meta_box_text5" value="<?php echo $text5;?>">
  </p>
  <p>
    <label for="my_meta_box_text6">Driver Bhata(D/N)</label>
    <input type="text" name="my_meta_box_text6" id="my_meta_box_text6" value="<?php echo $text6?>">
  </p>
  <?php
}

add_action('save_post','about_metabox_save');

function about_metabox_save($page){
  
  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    $allowed;

    if( isset( $_POST['my_meta_box_text_area'] ) )
        update_post_meta( $page, 'my_meta_box_text_area', esc_attr( $_POST['my_meta_box_text_area'] ) );

    if(isset($_POST['my_meta_box_text1']))  
      update_post_meta($page,'my_meta_box_text1',esc_attr($_POST['my_meta_box_text1']));

    if(isset($_POST['my_meta_box_text2']))
      update_post_meta($page,'my_meta_box_text2',esc_attr($_POST['my_meta_box_text2']));

    if(isset($_POST['my_meta_box_text3']))
      update_post_meta($page,'my_meta_box_text3',esc_attr($_POST['my_meta_box_text3']));

    if(isset($_POST['my_meta_box_text4']))
      update_post_meta($page,'my_meta_box_text4',esc_attr($_POST['my_meta_box_text4']));

    if(isset($_POST['my_meta_box_text5']))
      update_post_meta($page,'my_meta_box_text5',esc_attr($_POST['my_meta_box_text5']));

    if(isset($_POST['my_meta_box_text6']))
      update_post_meta($page,'my_meta_box_text6',esc_attr($_POST['my_meta_box_text6']));
}


// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '4th Feature Image',
        'id' => 'feature-image-4',
        'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '5th Feature Image',
        'id' => 'feature-image-5',
        'post_type' => 'page'
        )
    );      
 
};

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'packages'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'packages'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '4th Feature Image',
        'id' => 'feature-image-4',
        'post_type' => 'packages'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '5th Feature Image',
        'id' => 'feature-image-5',
        'post_type' => 'packages'
        )
    );      
 
};

add_shortcode('package_shortcode','display_package_shortcode');

function display_package_shortcode(){
  ?>
    <div class="container">
    <div class="row">
      <figure>
        <center>
          <img src="<?php bloginfo('template_url');?>/img/packges.jpg" class="img-responsive" width="162" height="54" style=" margin-bottom:5px;"/>
        </center>
      </figure>
      <div class="col-md-12">
        <ul id="scroller">
          <?php 
            $args=array('post_type' => 'packages','order' => 'ASC');
            $query=new WP_Query($args);

            if($query->have_posts())
              while($query->have_posts()){
                $query->the_post();
                echo '<li>';
                  echo '<a href="'.get_post_permalink().'">';
                    if(has_post_thumbnail())
                      the_post_thumbnail(array(197,119),array('class'=>'img-responsive'));
                  echo '</a>';
                echo '</li>'; 
              }
            wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div>
  <?php
}

flush_rewrite_rules();
?>
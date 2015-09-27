<?php
/*
header template
*/
$logo=ot_get_option('logo');
$sample_text=ot_get_option('sample_text');
$mobile_code=ot_get_option('mobile_code');
// $pick_up_date = 
//  echo $pick_up_date;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title();echo bloginfo('name');?></title>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<?php wp_head();?>
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link href="css/ie8fix.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
    <![endif]-->

</head>
<body <?php body_class()?> id="top" data-spy="scroll" data-target=".navbar" data-offset="200">
	<header data-spy="affix" data-offset-top="39" data-offset-bottom="0" class="large">
		<div class="row container box">
			<div class="col-md-3">
				<div class="brand">
					<h1>
						<a href="<?php echo home_url();?>" class="scroll-to" title="<?php echo bloginfo('description');?>">
							<?php 
								if(empty($logo)){
							?>
								<img src="<?php bloginfo('template_url');?>/img/logo.png" class="img-responsive">
							<?php 
							}
							else{
							?>
								<img src="<?php echo $logo;?>" class="img-responsive" title="<?php echo bloginfo('description');?>">		
							<?php  } ?>
						</a>
					</h1>
				</div>
			</div>
			<div class="col-md-9">
				<div class="pull-right">
					<div class="header-info pull-right">
						<div class="contact pull-left">
							<?php echo "CONTACT :"."(".$mobile_code.")".$sample_text;?>					
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- start navigation -->
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                  <span class="sr-only">Toggle navigation</span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand scroll-to" href="<?php echo home_url();?>"><img class="img-responsive mobile-logo"  src="<?php echo $logo;?>" alt="<?php echo bloginfo('name');?>"></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php
						$defaults = array(
							'theme_location'  => 'primar_menu',
							'menu'            => '',
							'container'       => 'ul',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav navbar-nav navbar-right',
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
					</div>
				</nav>
        	</div>  
		</div>
	</header>
	
	
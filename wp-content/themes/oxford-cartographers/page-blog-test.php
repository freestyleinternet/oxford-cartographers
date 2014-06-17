<?php 
/*
	Template Name: News/Blog  test
*/
?>
<?php
    $page_slug = '';
	if (is_page())
	{
		$page_slug = 'page-'.basename(get_permalink());
		
		if ($post->post_parent)
		{
			$page_slug.= ' parent-'.basename(get_permalink($post->post_parent));
		}
	}
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width">
	
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <!-- For third-generation iPad with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144-precomposed.png">
    <!-- For iPhone with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114-precomposed.png">
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72-precomposed.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png">
        
    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
		function initialize() {
		  var myLatlng = new google.maps.LatLng(51.57851,-0.14963);
		  var mapOptions = {
			zoom: 15,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		
		  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
		
		  var contentString = 
		  	  '<div id="content">'+
			  	  '<h1>Aztec House</h1>'+
				  '<div id="bodyContent">'+
					  '<ul>'+
					  	'<li>397-405 Archway Road</li>' +
						'<li>Highgate</li>' +
						'<li>London N6 4EY</li>' +
					  '</ul>' +
				  '</div>'+
			  '</div>';
		
		  var infowindow = new google.maps.InfoWindow({
			  content: contentString,
			  maxWidth: 250
		  });
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title: 'Cauldron'
		  });
		  google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		  });
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class($page_slug); ?>>
	<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
    <div id="page">
    	<div class="mobilemenutoggle"><a class="toggleMenu" href="#"></a></div>
   		<header>
		<?php
              wp_nav_menu(
                  array(
                  'menu'		  => 'mobile-menu',
                  'container'       => '',
                  'menu_class'	=> 'nav'
              ));
          ?>
    		<div class="wrapper clearfix">
                <div class="contact">
                	<h1>Leading experts in transport information and mapping</h1>
                    <p>Call: <span>0208 345 1234</span></p>
                    <a class="yellowimg envelope" href="<?php bloginfo('url'); ?>/add-to-mailing-list/">E-NEWS SIGN UP</a>
                </div>
                <a class="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/images/fwt-logo.svg" alt="FWT"/></a>
				<?php
                    wp_nav_menu(
                        array(
                        'menu'		  => 'main-menu',
                        'container'       => '',
                        'menu_class'	=> 'mainmenu'
                    ));
                ?>
    		</div>
    	</header>
        
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
 					<?php endwhile; endif; ?>
                   
                       <div class="posts">
                            <?php 
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								
								$args = array( 'post_type' => 'post', 'paged' => $paged);
								$wp_query = new WP_Query($args);
								
								while ( have_posts() ) : the_post(); 
							?>
                            <article>
                            	<a href="<?php echo get_permalink(); ?>">
                                	<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail('newsthumb', array('class' => 'alignleft'));
										}
									?>
                                    <h1><?php the_title(); ?></h1>
                                	<h2><?php the_time('j/n/Y'); ?></h2>
                                    <p><?php echo truncate($post->post_content, 180); ?> <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/small-right-arrow-black.svg"></span></p>
                                </a>
                            </article>
                             <?php endwhile; ?>
                             <?php if(function_exists('wp_paginate')) {
								wp_paginate();
							} ?>
                        </div>
					
                </section>
                <?php get_sidebar(); ?>
                
            </div>
            
        </main> <!-- /#main -->
<?php get_footer(); ?>

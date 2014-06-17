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
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "701044eb-d205-461c-95f2-1b96b1e3ee47", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>  
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
    <div class="topmenumobile">
        <nav>
          <?php
                wp_nav_menu(
                    array(
                    'menu'		  => 'main-menu',
                    'container'       => '',
                    'menu_class'	=> ''
                ));
            ?>
        </nav>
    </div>
    
    <div id="page">
   		<header>
    		<div class="wrapper clearfix">
                <a class="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/images/temp-logo.jpg" alt="Oxford Cartographers"/></a>
                <div class="contact">
                    <?php if( get_field('top_strap_line', 47) ): ?><h1><?php the_field('top_strap_line', 47); ?></h1><?php endif; ?>
                    <?php if( get_field('telephone_number', 47) ): ?><p>Call: <span><?php the_field('telephone_number', 47); ?></span></p><?php endif; ?>
                    <div class="contact-buttons">
                    	<a class="yellowimg envelope" href="<?php bloginfo('url'); ?>/add-to-mailing-list/">E-NEWS SIGN UP</a>
                	  	<a class="yellowimg client-login" href="<?php bloginfo('url'); ?>/client-login/">Client Login</a>	
                	  </div>
                </div>
                
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
        <!--<a href="javascript:void(0);" class="show-menu-button">Menu</a>-->
        
       
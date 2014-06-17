<?php 
/*
	Template Name: Test page 
*/
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

    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

   
	<?php wp_head(); ?>
</head>

<body <?php body_class($page_slug); ?>>
	<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
    <nav>
                <?php
                      wp_nav_menu(
                          array(
                          'menu'		  => 'mobile-menu',
                          'container'       => '',
                          'menu_class'	=> ''
                      ));
                  ?>
              </nav>

   		<header>
            
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
        
 
        <main role="main">
            
            <div class="wrapper">
            	
            </div>
            
        </main> <!-- /#main -->
 

    <?php wp_footer(); ?>
</body>
</html>

<?php 
	$result = '';
	$subscribeError = '';
	if (isset($_POST['email']) AND $_POST['email'] != '')
	{
		include("lib/class.mailchimp.php");
		// in mailchimp this is held in account > api
		$api = new MCAPI('89d78b2b770f72e8b9e73052e56494c9-us5');
	
		$merge_vars = array
		(
			'FNAME' => $_POST['lname'],
			'LNAME' => $_POST['fname'],
			'MPOSITION' => $_POST['position'],
			'MCOMPANY' => $_POST['company'],
			'MTEL' => $_POST['mtel'],
			'EMAIL' => $_POST['email']
		);
		
		// in mailchimp this is held in the lists > settings > list settings and unique api
		$result = $api->listSubscribe('ad51084415', $_POST['email'], $merge_vars);
		
		$subscribeError = '';
		if ($api->errorCode)
		{
			$subscribeError = $api->errorMessage;
		}
	}


get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <?php if ($subscribeError == TRUE) { ?><p class="errormsg"><?php echo $subscribeError; ?></p><?php } ?>
						<?php if ($subscribeError !=='') 
						 {
						  ?>
						  
						  <?php
						  }
						  ?>
						  <?php if ($result == TRUE) { ?>
						  <div class="thankyou">
                                <p>
                                    Thank you for signing up to our mailing list.<br /><br />
                                    A confirmation email has been sent to the address provided.
                                    Please click on the link in that email to confirm your subscription.
                                </p>
						  </div>
						  <?php
						  }
						  else
						  {
						  ?>
						  <form id="mailinglist" method="post" action="" />
                                
                                <fieldset>
                                    <label>First Name</label>
                                    <input name="fname" type="text" required>
                                </fieldset>
                                
                                <fieldset>
                                    <label>Last Name</label>
                                    <input name="lname" type="text" required>
                                </fieldset>
                                
                                <fieldset>
                                <label>Position</label>
                                <input name="position" type="text">
                                </fieldset>
                                
                                <fieldset>
                                <label>Company</label>
                                <input name="company" type="text">
                                </fieldset>
                                
                                <fieldset>
                                <label>Email</label>
                                <input name="email" id="email"  type="email" required/>
                                </fieldset>
                                
                                <fieldset>
                                <label>Telephone</label>
                                <input name="mtel" type="text">
                                </fieldset>
							  
							  <input class="yellowimg rightarrow" type="submit" value="Submit">
						  </form>
						  <?php } ?>
                          
                    <?php endwhile; endif; ?>
                </section>
                
                <aside>
                	<?php get_template_part( 'templates/partials/inc-socialbuttons'); ?>
                	
                     <div class="homeblock update">
                        <a href="<?php bloginfo('url'); ?>/news/">
                            <img src="<?php the_field('fwt_update_featured_image', 6); ?>">
                            <h2>FWT UPDATE</h2>
                            <p><?php the_field('fwt_update_box_text', 6); ?></p>
                            <span class="yellowimg thinner">News</span>
                        </a>
                  </div>
                  
                  <div class="col homeblock contactblock">
                        <a href="<?php the_field('contact_us_map_link', 6); ?>" target="_blank">
                            <h2>CONTACT US</h2>
                            <span class="yellowimg thinner">View</span>
                        </a>
                  </div>
                  
                </aside>
            </div>
            
        </main> <!-- /#main -->
<?php get_footer(); ?>

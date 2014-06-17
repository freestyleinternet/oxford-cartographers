<?php 
/*
	Template Name: News/Blog 
*/
get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                         <?php get_search_form(); ?> 
						<?php the_content(); ?>
 					<?php endwhile; endif; ?>
                   
                       <div class="posts">
                            <?php 
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								
								$args = array( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'paged' => $paged);
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
                                	<h2><?php the_time('jS M Y'); ?></h2>
                                    <p><?php echo truncate($post->post_content, 180); ?> <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/small-right-arrow-black.svg"></span></p>
                                </a>
                            </article>
                             <?php endwhile; ?>
                             <?php if(function_exists('wp_paginate')) {
									wp_paginate();
								} ?>
                        </div>
						<div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                </section>
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
				
				?>
				<aside>
				  <div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
				  <div class="signup">
					  <h2>SIGN UP FOR OUR E-NEWS</h2>
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
							<form method="post" action="" />
								  
								  <label>First Name</label>
								  <input name="fname" type="text" required>
								  
								  <label>Last Name</label>
								  <input name="lname" type="text" required>
								  
								  <label>Position</label>
								  <input name="position" type="text">
								  
								  <label>Company</label>
								  <input name="company" type="text">
								  
								  <label>Email</label>
								  <input name="email" id="email"  type="email" required/>
								  
								  <label>Telephone</label>
								  <input name="mtel" type="text">
								
								<input class="yellowimg rightarrow" type="submit" value="Submit">
							</form>
							<?php } ?>
				  </div>
				  
				  <!--<div class="col homeblock">
					  <a href="<?php the_field('link_to_page', 6); ?>">
						  <img class="absolute" src="<?php the_field('featured_image', 6); ?>">
						  <h2>OUR PRINCIPLES</h2>
						  <p><?php the_field('our_principles_introduction_text', 6); ?></p>
						  <span class="yellowimg arrow thinner">Read More</span>
					  </a>
				</div>-->
                
                <?php
					$sidebox = get_field('show_sidebox', 9);
	
					if( in_array('FWT Update', $sidebox) ) {
					?>
                        <div class="homeblock first update">
                            <a href="<?php bloginfo('url'); ?>/news/">
                                <img src="<?php the_field('fwt_update_featured_image', 6); ?>">
                                <h2>FWT UPDATE</h2>
                                <p><?php the_field('fwt_update_box_text', 6); ?></p>
                                <span class="yellowimg thinner">News</span>
                            </a>
                        </div>
                    <?php
					}
					if ( in_array('Contact us', $sidebox)) { 
					?>
                        <div class="col homeblock contactblock">
                            <a href="<?php the_field('contact_us_map_link', 6); ?>" target="_blank">
                                <h2>CONTACT US</h2>
                                <span class="yellowimg thinner">View</span>
                            </a>
                        </div>
                    <?php 
					}
					if ( in_array('Our principles', $sidebox)) { 
					?>
                        <div class="col homeblock">
                              <a href="<?php the_field('link_to_page', 6); ?>">
                                  <img class="absolute" src="<?php the_field('featured_image', 6); ?>">
                                  <h2>OUR PRINCIPLES</h2>
                                  <p><?php the_field('our_principles_introduction_text', 6); ?></p>
                                  <span class="yellowimg thinner">Read More</span>
                              </a>
                        </div>
                    <?php 
					}
					?>
				
				</aside>

                
            </div>
            
        </main> <!-- /#main -->
<?php get_footer(); ?>

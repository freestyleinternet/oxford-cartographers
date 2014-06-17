<?php 
/*
	Template Name: Contact page 
*/
get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        
						<img class="mapgraphic" src="<?php bloginfo('template_directory'); ?>/assets/images/map.jpg"  alt="map"/>
                        
                		<div class="contact-details-block one">
                          <img class="alignright" src="<?php bloginfo('template_directory'); ?>/assets/images/FWT-office.jpg">
                          <h1>Head Office</h1>
                          <address>
                              <?php echo the_field('address_line_1'); ?><br>
                              <?php echo the_field('address_line_2'); ?><br>
                              <?php echo the_field('address_line_3'); ?><br>
                              <?php echo the_field('address_line_4'); ?>
                          </address>
                          <ul>
                              <li>Tel: <?php echo the_field('telephone'); ?></li>
                              <li>Fax: <?php echo the_field('fax'); ?></li>
                              <li>Email: <a href="mailto:<?php echo the_field('email'); ?>"><?php echo the_field('email'); ?></a></li>
                          </ul>
                        </div>
                        
                        <div class="contact-details-block two">
                            
                            <?php while(the_repeater_field('persons_details')): ?>
                                <div class="person">
                                    <?php if( get_sub_field('title') ): ?><h1><?php the_sub_field('title'); ?></h1><?php endif; ?>
                                     <?php if( get_sub_field('full_name') ): ?><h2><?php the_sub_field('full_name'); ?></h2><?php endif; ?>
                                     <?php if( get_sub_field('job_title') ): ?><h3><?php the_sub_field('job_title'); ?></h3><?php endif; ?>
                                    <ul>
                                        <?php if( get_sub_field('telephone') ): ?><li>Tel: <?php the_sub_field('telephone'); ?></li><?php endif; ?>
                                        <?php if( get_sub_field('mobile') ): ?><li>Mobile: <?php the_sub_field('mobile'); ?></li><?php endif; ?>
                                        <?php if( get_sub_field('fax') ): ?><li>Fax: <?php the_sub_field('fax'); ?></li><?php endif; ?>
                                        <?php if( get_sub_field('email') ): ?><li>Email: <a href="mailto:<?php echo the_sub_field('email'); ?>"><?php echo the_sub_field('email'); ?></a></li><?php endif; ?>
                                    </ul>
                                </div>
                            <?php  endwhile; ?>
                            
                        </div>
                        
 					<?php endwhile; endif; ?>
                </section>
                <aside>
                	<div class="signup contactform">
      					<h2>SEND US AN ENQUIRY</h2>
                        <?php gravity_form(1, false, false, false, '', true, 12); ?>
                       </div> 
                       
                        <?php
							$sidebox = get_field('show_sidebox');
			
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

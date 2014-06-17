<?php 
/*
	Template Name: Page with quote 
*/
get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_field('first_paragraph_of_content_goes_here'); ?>
                        <blockquote>
                        	<img src="<?php the_field('quote_feature_image'); ?>">
                            <p class="quote"><?php the_field('quote'); ?></p>
                            <p><?php the_field('quote_by'); ?></p>
                        </blockquote>
                        <?php the_content(); ?>
                        <div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                        <div class="bottomblock">
                        	<h1>Our partner websites</h1>
                            <?php while(the_repeater_field('partner_details')): ?>
                            <article>
                            	<a href="<?php echo the_sub_field('website_link'); ?>" target="_blank">
                                	<img class="borderbox" src="<?php echo the_sub_field('featured_image'); ?>">
                                	<p><?php echo the_sub_field('description'); ?></p>
                                    <span><?php echo the_sub_field('website_link'); ?></span>
                                </a>
                            </article>
                            <?php  endwhile; ?>
                        </div>
                    <?php endwhile; endif; ?>
                </section>
                
                <aside>
                	<div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
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

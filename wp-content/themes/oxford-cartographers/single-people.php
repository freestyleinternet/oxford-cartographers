<?php get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section class="single-style-2">
					<?php while ( have_posts() ) : the_post(); ?>
                        <?php 
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail('person', array('class' => 'borderbox alignright'));
							}
						?>
                        <?php if( get_field('linkedin_address') ): ?><a class="linkedinlogo" href="<?php the_field('linkedin_address'); ?>"></a><?php endif; ?>
                        <h1><?php the_title(); ?></h1>
                        <h2><?php the_field('job_title'); ?></h2>
						<div class="contact-details withincontent">
                            <h2><?php the_title(); ?></h2>
                        	<p><?php the_field('job_title'); ?></p>
                            <ul>
                            	<li>Tel: <?php the_field('telephone'); ?></li>
                                <li>Mobile: <?php the_field('mobile_number'); ?></li>
                                <li>Fax: <?php the_field('fax'); ?></li>
                                <li>Email: <a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></li>
                            </ul>
                        </div>
						<?php the_content(); ?>
                        <div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                        <div class="contact-details">
                        	<h1><?php the_field('job_area'); ?></h1>
                            <h2><?php the_title(); ?></h2>
                        	<p><?php the_field('job_title'); ?></p>
                            
                            <ul>
                            	<li>Tel: <?php the_field('telephone'); ?></li>
                                <li>Mobile: <?php the_field('mobile_number'); ?></li>
                                <li>Fax: <?php the_field('fax'); ?></li>
                                <li>Email: <a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></li>
                            </ul>
                            <a class="yellowimg leftarrow thinner" href="<?php bloginfo('url'); ?>/our-people/">PEOPLE</a>
                        </div>
                    <?php endwhile; ?>
                </section>
                
                <aside>
                	<div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
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

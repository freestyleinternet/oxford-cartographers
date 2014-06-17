<?php 
/*
	Template Name: Our People 
*/
get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
 					<?php endwhile; endif; ?>
                   
                       <div class="ourpeople">
                            <?php 
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								
								$args = array( 'post_type' => 'people', 'posts_per_page' => -1);
								$wp_query = new WP_Query($args);
								
								while ( have_posts() ) : the_post(); 
							?>
                            <article>
                            	
                            	<a href="<?php echo get_permalink(); ?>">
                                	<h1><?php the_title(); ?></h1>
                                	<h2><?php the_field('job_title'); ?></h2>
                                    <p><?php echo truncate($post->post_content, 230); ?> <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/small-right-arrow-black.svg"></span></p>
                                </a>
                            </article>
                             <?php endwhile; ?>
                             <div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                             <ul class="navigation">
                                <li class="left"><?php next_posts_link( '&larr; Older posts' ); ?></li>
                                <li class="right"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></li>
                            </ul>
                        </div>
					
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

<?php get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					
					<?php if ( have_posts() ) : ?>
                    	<h1 class="filter-title"><?php printf( __( 'Search Results for: %s', 'fwt' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    	<?php while ( have_posts() ) : the_post(); ?>
                        <div class="posts">
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
                        </div>
                        <?php endwhile; else : ?>
                        	<p>No posts found.</p>
					<?php endif; ?>
                </section>
                
                <aside>
                	<?php get_template_part( 'templates/partials/inc-socialbuttons'); ?>
                	
                     <div class="homeblock update">
                        <a href="<?php bloginfo('url'); ?>/news/">
                            <img src="<?php the_field('fwt_update_featured_image', 19); ?>">
                            <h2>FWT UPDATE</h2>
                            <p><?php the_field('fwt_update_box_text', 19); ?></p>
                            <span class="yellowimg thinner">News</span>
                        </a>
                  </div>
                  
                  <div class="col homeblock contactblock">
                        <a href="<?php the_field('contact_us_map_link', 19); ?>" target="_blank">
                            <h2>CONTACT US</h2>
                            <span class="yellowimg thinner">View</span>
                        </a>
                  </div>
                  
                </aside>
            </div>
            
        </main> <!-- /#main -->
<?php get_footer(); ?>


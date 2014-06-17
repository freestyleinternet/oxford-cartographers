<?php 
/*
	Template Name: Our Services 
*/
get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        
						<?php if( have_rows('slides') ): ?>
                        <div class="cycle-slideshow subpage" 
                            data-cycle-fx=scrollHorz
                             data-cycle-timeout=0
                            data-cycle-swipe=true>
                            <!-- prev/next links -->
                            <div class="cycle-prev"></div>
                            <div class="cycle-next"></div>
                            <div class="cycle-pager"></div>
                            <?php while ( have_rows('slides') ) : the_row(); ?> 
                            	<img src="<?php the_sub_field('slide'); ?>">
                            <?php  endwhile;  ?>
                        </div>
                        <?php if( get_field('slideshow_caption') ): ?><p class="caption"><?php the_field('slideshow_caption'); ?></p><?php endif; ?>
                        
						<?php endif; ?>
                        
                        <div class="fps">
							<?php the_content(); ?>
                            <div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                        </div>
                        
						<?php if( get_field('files') ): ?>
                            <div class="downloads">
                                <h1>CASE STUDIES AND DOWNLOADS</h1>
                                <?php while(the_repeater_field('files')): ?>
                                    <a class="download" href="<?php the_sub_field('pdf_download'); ?>"><?php the_sub_field('download_button_name'); ?></a>
                                <?php  endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <a class="yellowimg rightarrow thinner" href="<?php the_field('next_service_to_link_to'); ?>">NEXT SERVICE</a>
                        
                    <?php endwhile; endif; ?>
                </section>
                
                <aside>
                	<div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                    <h3>OUR SERVICES</h3>
                   
                    <?php
						$subpages = ($post->post_parent) ? wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&sort_order=desc') : wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&sort_order=desc') ;
						if ($subpages)
						{
					?>
						<ul class="sidenav">
							<?php echo $subpages; ?>
						</ul>
					<?php
						}
					?>
                    
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

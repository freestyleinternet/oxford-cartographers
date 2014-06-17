<?php get_header(); ?>
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
						<?php else : endif;  ?>

                        <p class="caption"><?php echo the_field('slideshow_caption'); ?></p>
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
                        
						<div class="nextprevlinks">
							<?php previous_post('%', 'Next Case Study', 'on'); ?>
                            <?php //next_post('%', 'Next Case Study', 'no'); ?>
                        </div>
                        
                    <?php endwhile; endif; ?>
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

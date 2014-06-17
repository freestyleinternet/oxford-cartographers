<?php 
/*
	Template Name: Services sub page 
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
                        <?php endif; ?>
                        <?php $caption = get_field( "slideshow_caption" ); 
							if( $caption ) { ?>
                        <p class="caption"><?php echo $caption; ?></p>
                        <?php } ?>
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
                        
						<?php
							$pagelist = get_pages("child_of=".$post->post_parent."&parent=".$post->post_parent."&sort_column=menu_order&sort_order=asc");
							$pages = array();
							foreach ($pagelist as $page) {
							   $pages[] += $page->ID;
							}
							
							$current = array_search($post->ID, $pages);
							$prevID = $pages[$current-1];
							$nextID = $pages[$current+1];
						?>
                        <div class="navigation">
                            <?php if (!empty($prevID)) { ?>
                                <a class="yellowimg thinner leftarrow leftalign" href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">PREVIOUS SERVICE</a>
                            <?php }
                            if (!empty($nextID)) { ?>
                                <a class="yellowimg thinner rightarrow rightalign" href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">NEXT SERVICE</a>
                            <?php } ?>
                        </div>
                    <?php endwhile; endif; ?>
                    
                </section>
                
                <aside>
                	<div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                    <h3>OUR SERVICES</h3>
                    <?php
						$subpages = ($post->post_parent) ? wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0') : wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0') ;
						if ($subpages)
						{
					?>
						<ul class="sidenav">
							<?php echo $subpages; ?>
						</ul>
					<?php
						}
					?>
                    <div class="homeblock first update">
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

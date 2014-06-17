<?php get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
					<?php while ( have_posts() ) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="first"><?php the_field('first_paragraph_of_content_goes_here'); ?></div>
                        <blockquote>
                            
                            <?php if( $featureimage = get_field('quote_feature_image') ): ?>
                                <img src="<?php echo $featureimage; ?>">
                            <?php endif; ?>
                            
                            <p class="quote"><?php the_field('quote'); ?></p>
                            <p><?php the_field('quote_by'); ?></p>
                        </blockquote>
                        <div class="secondbody"><?php the_content(); ?></div>
                        <div class="sharethisbar"><?php get_template_part( 'templates/partials/inc-socialbuttons'); ?></div>
                        
                        <?php if( get_field('add_related_link') ): ?>
                        
                        <div class="downloads">
                        	<h1><?php the_field('main_title'); ?></h1>
                            <?php while(the_repeater_field('add_related_link')): ?>
                            	<p><?php the_sub_field('overview'); ?></p>
                            	<a href="<?php the_sub_field('full_website_link'); ?>"><?php the_sub_field('full_website_link'); ?></a>
							<?php  endwhile; ?>
						</div>
                        
                        <?php endif; ?>
                        
                        <a class="yellowimg leftarrow thinner" href="<?php bloginfo('url'); ?>/news/">NEWS</a>
                    	
                        
					<?php endwhile; ?>
                </section>
                
                <?php get_sidebar(); ?>
            </div>
            
        </main> <!-- /#main -->
<?php get_footer(); ?>



<?php 
/*
	Template Name: Case Studies
*/
get_header(); ?>
 <div class="banner fullwidth" role="banner">
    <div class="wrapper"> 
        <div class="slider-container">
            <div class="center inner">
                <span id=prev rel="prev"></span>
                <span id=next rel="next"></span>
            </div>
            <div class="cycle-slideshow casestudypage" 
                data-cycle-fx=scrollHorz
                data-cycle-swipe=true
                data-cycle-slides="div.slide-full"
                data-cycle-prev="#prev"
                data-cycle-next="#next">
                <div class="cycle-pager"></div>
                <?php while(the_repeater_field('slide_casestudy')): ?>    
                    <div class="slide-full">
                        <img src="<?php echo the_sub_field('slider_image'); ?>">
                        <div class="text">
                            <h1><?php echo the_sub_field('title_text'); ?></h1>
                            <a class="yellowimg" href="<?php the_sub_field('read_more'); ?>">READ MORE</a>
                        </div>
                    </div>
                <?php  endwhile; ?>
            </div>
        </div>
    </div>
    </div>
    
    <div class="pageContent">
    		
        <main role="main">
              <div class="wrapper">
                  <?php 
					  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					  
					  $args = array( 'post_type' => 'casestudies', 'posts_per_page' => 6);
					  $wp_query = new WP_Query($args);
					  
					  while ( have_posts() ) : the_post(); 
				  ?>
                  <div class="col homeblock">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php 
								if ( has_post_thumbnail() ) { 
									the_post_thumbnail('customthumb', array('class' => 'absolute'));
								}
							?>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo truncate($post->post_content, 80); ?></p>
                            <span class="yellowimg thinner">Read More</span>
                        </a>
                  </div>
                  <?php endwhile; ?>
                   <ul class="navigation">
                      <li class="left"><?php next_posts_link( '&larr; Older posts' ); ?></li>
                      <li class="right"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></li>
                  </ul>                  
    
              </div>
          </main>
	
<?php get_footer(); ?>

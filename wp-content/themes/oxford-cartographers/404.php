<?php get_header(); ?>
 	<div class="pageContent">
        <main role="main">
            
            <div class="wrapper">
            	<section>
                        <h1>Oops! That page can&rsquo;t be found.</h1>
                        <p>It looks like nothing was found at this location. Maybe try heading back to the <a href="<?php echo home_url('/'); ?>">home page.</a></p>
                </section>
                
                <aside>
                	<div class="signup contactform">
      					<h2>SEND US AN ENQUIRY</h2>
                        <?php gravity_form(1, false, false, false, '', true, 12); ?>
                       </div> 
                        <div class="col homeblock">
                              <a href="<?php the_field('link_to_page', 19); ?>">
                                  <img class="absolute" src="<?php the_field('featured_image', 19); ?>">
                                  <h2>OUR PRINCIPLES</h2>
                                  <p><?php the_field('our_principles_introduction_text', 19); ?></p>
                                  <span class="yellowimg thinner">Read More</span>
                              </a>
                        </div>
                </aside>
            </div>
            
        </main> <!-- /#main -->
<?php get_footer(); ?>
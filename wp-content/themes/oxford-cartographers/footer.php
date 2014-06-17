                <footer>
                    <div class="wrapper"> 
                        <div class="foot1">
							<?php
                                wp_nav_menu(
                                    array(
                                    'menu'		  => 'general-footer',
                                    'container'       => '',
                                    'menu_class'	=> 'general'
                                ));
                            ?>
                        </div>
                        <div class="foot2">
                        	<h2>Our Maps</h2>
                            <?php
                                wp_nav_menu(
                                    array(
                                    'menu'		  => 'our-maps',
                                    'container'       => '',
                                    'menu_class'	=> 'services'
                                ));
                            ?>
                        </div>
                      <div class="foot3">
                       	<h2>The CHK Group</h2>
                          
						  <?php while(the_repeater_field('our_partners', 6)): ?>
                          <article>
                            <a href="<?php echo the_sub_field('partner_website_link'); ?>" target="_blank">
                                <img class="borderbox" src="<?php echo the_sub_field('partner_featured_image'); ?>" alt="<?php echo the_sub_field('partner_name'); ?>"/>
                                <div class="vertical-align"><h1><?php echo the_sub_field('partner_name'); ?></h1></div> 
                            </a>
                          </article>
                          <?php  endwhile; ?>
                          
                        </div>
                        <div class="foot4">
                       		<h2>STANDARDS</h2>
                            <?php while(the_repeater_field('website_standards_footer', 6)): ?>
                          <article class="sponsor">
                            
                                <img class="borderbox" src="<?php echo the_sub_field('logo_file'); ?>" alt="<?php echo the_sub_field('pdescription'); ?>"/>
                                <div class="vertical-align"><h1><?php echo the_sub_field('description'); ?></h1></div> 
                            
                          </article>
                          <?php  endwhile; ?>
                        </div>
                    </div>
                </footer>
    
    		</div> <!-- End of pageContent -->
    	</div> <!-- End of mobileContainer -->
    </div> <!-- End of page -->  
    <?php wp_footer(); ?>
</body>
</html>

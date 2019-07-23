            </div>
            <section id="page-callout">
                <div class="wrapper columns">
                    <div class="column">
                        <?php if ( get_field('page_callout_heading') ): 
                            echo '<h2>' . the_field('page_callout_heading') . '</h2>'; 
                        else: 
                            echo '<h2>Would You Like To Learn More?</h2>'; 
                        endif; ?>
                        <?php if ( get_field('page_callout_content') ): 
                            echo '<p>' . the_field('page_callout_content') . '</p>'; 
                        else: 
                            echo '<p>We would love to meet you and show everything ' . esc_html( get_bloginfo( 'name' ) ) . ' has to offer. Please contact us for an appointment or more information.</p>'; 
                        endif; ?>
                    </div>
                    <div class="column">
                        <?php if ( get_field('custom_cta_button') ): ?>
                            <a class="button green" href="<?php the_field('page_callout_cta_button_link_url'); ?>"><?php the_field('page_callout_cta_button_label'); ?></a>
                        <?php else: ?> 
                            <a class="button green" href="/contact-us/">Contact Us</a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <footer id="footer">
                <section id="footer-top">
                    <div class="wrapper columns">
                        <div class="column">
                            <h3><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
                            <p><?php echo get_bloginfo('description');?></p>
                            <ul class="social-links">
                                <?php if ( get_field('facebook_page_link_url', 'option') ): ?>
                                <li>
                                    <a class="facebook-link" href="<?php the_field('facebook_page_link_url', 'option'); ?>"><i class="fab fa-facebook-square"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ( get_field('twitter_link_url', 'option') ): ?>
                                <li>
                                    <a class="twitter-link" href="<?php the_field('twitter_link_url', 'option'); ?>"><i class="fab fa-twitter-square"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ( get_field('instagram_link_url', 'option') ): ?>
                                <li>
                                    <a class="instagram-link" href="<?php the_field('instagram_link_url', 'option'); ?>"><i class="fab fa-instagram"></i></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="column">
                            <h3>Contact Information</h3>
                            <?php if ( get_field('street_address', 'option') ): ?>
                            <address class="community-location">
                                <?php if ( get_field('google_maps_link_url', 'option') ): ?><a href="<?php the_field('google_maps_link_url', 'option'); ?>" title=""><?php endif; ?>
                                    <?php the_field('street_address', 'option'); ?><br><?php the_field('city', 'option'); ?>, <?php the_field('state', 'option'); ?> <?php the_field('zip_code', 'option'); ?></a>
                                <?php if ( get_field('google_maps_link_url', 'option') ): ?></a><?php endif; ?>
                            </address>
                            <?php endif; ?>

                            <?php
                                $main_phone_number = get_field('main_phone_number', 'option');
                                $sales_phone_number = get_field('sales_phone_number', 'option');
                                $employment_phone_number = get_field('employment_phone_number', 'option');
                            ?>
                            <?php if ( $main_phone_number || $employment_phone_number || $sales_phone_number ): ?>
                            <address class="community-phone-numbers">
                                <ul>
                                    <?php if ( $main_phone_number ): ?>
                                        <li>Main Number: <a href="tel:+1-<?php echo $main_phone_number['link_url']; ?>"><?php echo $main_phone_number['link_display_text']; ?></a></li>
                                    <?php endif; ?>
                                    <?php if ( $employment_phone_number ): ?>
                                        <li>Employment: <a href="tel:+1-<?php echo $employment_phone_number['link_url']; ?>"><?php echo $employment_phone_number['link_display_text']; ?></a></li>
                                    <?php endif; ?>
                                    <?php if ( $sales_phone_number ): ?>
                                        <li>Sales Office: <a href="tel:+1-<?php echo $sales_phone_number['link_url']; ?>"><?php echo $sales_phone_number['link_display_text']; ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </address>
                            <?php endif; ?>

                            <?php if ( get_field('email_address', 'option') ): ?>
                            <address class="community-email-address">
                                Email Us: <a href="mailto:<?php the_field('email_address', 'option'); ?>"><?php the_field('email_address', 'option'); ?></a>
                            </address>
                            <?php endif; ?>

                            <?php if ( get_field('resident_portal_link_url', 'option') ): ?>
                            <a class="button resident-portal-link" href="<?php the_field('resident_portal_link_url', 'option'); ?>">Resident Portal</a>
                            <?php endif; ?>
                        </div>
                        <div class="column">
                            <h3>Resources</h3>
                            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
                        </div>
                    </div>
                </section>
                <section id="footer-bottom">
                    <div class="wrapper">
                        <div id="colophon">
                            <p>Another community managed by <a href="https://srimgt.com">SRI Management, LLC</a> - Copyright &copy; <?php echo esc_html( date_i18n( __( 'Y', 'sricommunitywebsite' ) ) ); ?><br><?php if ( get_field('alf_license_#', 'option') ): ?>Assisted Living Facility License #<?php the_field('alf_license_#', 'option'); ?><?php endif; ?></p>
                        </div>
                    </div>
                </section>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
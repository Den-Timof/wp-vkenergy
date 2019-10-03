
<footer class="footer-wrapper">
  <div class="contacts__footer footer-row">
    <div class="container">
      <div class="row footer-subrow _1">
        <div class="col-12 col-lg-3 col-xl-3">
          <div class="logotype _position footer__logotype"><a class="custom-logo-link" href="" rel="home" itemprop="url"><img class="custom-logo" src=" <?php echo carbon_get_theme_option('site_logotype'); ?>" alt="Энергия" itemprop="logo"/></a></div>
        </div>
        <div class="offset-xl-1"></div>
        <div class="d-none d-lg-block col-lg-4 col-xl-3">
          <div class="footer_head_col">
            <p>Каталог</p>
          </div>
        </div>
        <div class="d-none d-lg-block col-12 col-lg-3 col-xl-3">
          <div class="footer_head_col">
            <p>Услуги</p>
          </div>
        </div>
        <div class="d-none d-lg-block col-12 col-lg-2 col-xl-2">
          <div class="footer_head_col">
            <p>Меню</p>
          </div>
        </div>
      </div>
      <div class="row footer-subrow _2">
        <div class="col-12 col-lg-3 col-xl-3">
          <div class="footer-contact-col">
            <ul class="contact-list">
              <li><a class="site-telephone-text" href="tel:+">
                   <?php echo carbon_get_theme_option('site_phone_1'); ?></a></li>
              <li><a class="site-telephone-text" href="tel:+">
                   <?php echo carbon_get_theme_option('site_phone_2'); ?></a></li>
              <li><a class="site-telephone-text" href="tel:+">
                   <?php echo carbon_get_theme_option('site_phone_3'); ?></a></li>
            </ul>
            <ul class="contact-list _address">
              <li>
                <p class="site-city-text">
                   <?php echo carbon_get_theme_option('site_city'); ?>
                </p>
              </li>
              <li>
                <p class="site-address-text">
                   <?php echo carbon_get_theme_option('site_address'); ?>
                </p>
              </li>
              <li><a class="site-email-text" href="mailto:">
                   <?php echo carbon_get_theme_option('site_email'); ?></a></li>
            </ul>
            <div class="footer-feedback-call">
              <button class="vkenergy_button _general _fontReg footer-btn" type="button" data-toggle="modal" data-target=".modal-manager-1">Обратный звонок</button>
            </div>
          </div>
        </div>
        <div class="offset-xl-1"></div>
        <div class="col-12 col-lg-4 col-xl-3 footer-list-wrap _1">
          <div class="footer-list-title d-lg-none">
            <p>Каталог</p>
          </div>
          <ul class="footer-list">
            	<?php
            
            		$taxonomy     = 'product_cat';
            		$order        = 'ASC';
            		$show_count   = 0;
            		$pad_counts   = 0;
            		$hierarchical = 1;
            		$title        = '';
            		$empty        = 0;
            		$exclude      = '15';
            
            		$args = array(
            			'taxonomy'     => $taxonomy,
            			'order'        => $order,
            			'show_count'   => $show_count,
            			'pad_counts'   => $pad_counts,
            			'hierarchical' => $hierarchical,
            			'title_li'     => $title,
            			'exclude'      => $exclude,
            			'hide_empty'   => $empty
            		);
            
            		$all_categories = get_categories( $args );
            		foreach ($all_categories as $cat) {
            				if($cat->category_parent == 64) {
            						$category_id = $cat->term_id;
            						echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. 		$cat->name .'</a></li>';
            
            			}
            		}
            	?>
          </ul>
        </div>
        <div class="col-12 col-lg-3 col-xl-3 footer-list-wrap _2">
          <div class="footer-list-title d-lg-none">
            <p>Услуги</p>
          </div>
          <ul class="footer-list">
            	<?php 
            
            		$args = array(
            			'post_type'				=>	'page',
            			'post_parent'			=>	29,
            			'posts_per_page'	=>	-1,
            			'order'						=>	'ASC',
            			'orderby'					=>	'menu_order',
            		);
            
            		$parent = new WP_Query( $args );
            
            		if( $parent->have_posts() ) : ?>
            			<?php while( $parent->have_posts() ) : $parent->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?></a></li>
            			<?php endwhile; ?>
            		<?php endif; wp_reset_postdata(); ?>
            
          </ul>
        </div>
        <div class="col-12 col-lg-2 col-xl-2 footer-list-wrap _3">
          <div class="footer-list-title d-lg-none">
            <p>Меню</p>
          </div>
           <?php
           	wp_nav_menu( array(
           	'theme_location'  => '',
           	'menu'            => 'menu-1', 
           	'container'       => 'div',
           	'container_class' => 'footer-list', 
           	'container_id'    => '',
           	'menu_class'      => 'menu ', 
           	'menu_id'         => '',
           	'echo'            => true,
           	'fallback_cb'     => 'wp_page_menu',
           	'before'          => '',
           	'after'           => '',
           	'link_before'     => '',
           	'link_after'      => '',
           	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
           	'depth'           => 1,
           	'walker'          => '',
           ) );
           ?>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright__footer footer-row">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <p class="copyright_company footer-cell">
             <?php echo carbon_get_theme_option('copyright_company'); ?>
          </p>
        </div>
        <div class="col-12 col-lg-6">
          <p class="copyright_author-site footer-cell">
             <?php echo carbon_get_theme_option('copyright_studio'); ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="inputs-hidden">
  <input id="hidden_home_url" type="hidden" value=" <?php echo home_url() ?>"/>
  <input id="hidden_directory_url" type="hidden" value=" <?php echo get_template_directory_uri() ?>"/>
  <input id="hidden_wp_title" type="hidden" value=" <?php global $post; echo get_the_title( get_the_ID() ); ?>"/>
  <input id="hidden_wp_url_title" type="hidden" value=" <?php global $post; echo get_permalink( get_the_ID() ); ?>"/>
  <input type="hidden" id="site_logotype_carbon" value=" <?php echo carbon_get_theme_option('site_logotype'); ?>"/>
  <input type="hidden" id="site_logotype_2_carbon" value=" <?php echo carbon_get_theme_option('site_logotype_2'); ?>"/>
</div>
 <?php wp_footer(); ?>
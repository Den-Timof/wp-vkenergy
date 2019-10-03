
<header class="header-wrapper">
  <div class="sticky-row __desktop d-none d-lg-block">
    <div class="container">
      <div class="row">
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="logotype _position header__logotype"><a class="custom-logo-link" href=" <?php echo get_home_url(); ?>" rel="home" itemprop="url"><img class="custom-logo _2" src=" <?php echo carbon_get_theme_option('site_logotype_2'); ?>" alt="Энергия" itemprop="logo"/><img class="custom-logo _1" src=" <?php echo carbon_get_theme_option('site_logotype'); ?>" alt=""/></a></div>
        </div>
        <div class="offset-xl-1 d-lg-none d-xl-block"></div>
        <div class="d-none d-lg-block col-xl-9 col-lg-10">
          <div class="menu-top _position">
             <?php
             	wp_nav_menu( array(
             	'theme_location'  => '',
             	'menu'            => 'menu-1', 
             	'container'       => 'div', 
             	'container_class' => '', 
             	'container_id'    => '',
             	'menu_class'      => 'menu', 
             	'menu_id'         => '',
             	'echo'            => true,
             	'fallback_cb'     => 'wp_page_menu',
             	'before'          => '',
             	'after'           => '',
             	'link_before'     => '',
             	'link_after'      => '',
             	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
             	'depth'           => 0,
             	'walker'          => '',
             ) );
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="d-lg-none sticky-row __mobile navbar navbar-expand-lg navbar-light bg-light" id="cookmenu">
    <div class="cookcodesmenu-bar"></div>
    <ul class="navbar-nav mr-auto">
       <?php
       	wp_nav_menu( array(
       	'theme_location'  => '',
       	'menu'            => 'menu-1', 
       	'container'       => 'div', 
       	'container_class' => '', 
       	'container_id'    => '',
       	'menu_class'      => 'menu', 
       	'menu_id'         => '',
       	'echo'            => true,
       	'fallback_cb'     => 'wp_page_menu',
       	'before'          => '',
       	'after'           => '',
       	'link_before'     => '',
       	'link_after'      => '',
       	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
       	'depth'           => 0,
       	'walker'          => '',
       ) );
       ?>
    </ul>
  </nav>
  <div class="feedback-row">
    <div class="container">
      <div class="row">
        <div class="d-none d-lg-block col-3 search-form-wrap">
          <div class="search-form">
             <?php echo get_search_form(); ?>
          </div>
        </div>
        <div class="col-12 col-lg-9">
          <div class="feedback-col">
            <div class="site-telephone feedback-cell">
              <div class="s-icon-phone site-telephone-icon"></div><a class="site-telephone-text" href="tel:+">
                 <?php echo carbon_get_theme_option('site_phone_1'); ?></a>
            </div>
            <div class="d-none d-sm-flex feedback-call feedback-cell">
              <button class="feedback-call-text _blue-feedback-button _dashed" type="button" data-toggle="modal" data-target=".modal-manager-1">Обратный звонок</button>
            </div>
            <div class="d-none d-md-flex site-address feedback-cell">
              <p class="site-address-text">
                 <?php echo carbon_get_theme_option('site_city'); ?>, 
                 <?php echo carbon_get_theme_option('site_address'); ?>
              </p>
            </div>
            <div class="site-email feedback-cell"><a class="site-email-text _blue-feedback-button _dashed" href="mailto:">
                 <?php echo carbon_get_theme_option('site_email'); ?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
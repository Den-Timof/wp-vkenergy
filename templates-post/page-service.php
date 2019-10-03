<?php
/*
	Template name: Шаблон страниц "Отдельная услуга"
	Template post type: page
*/
?>

<!DOCTYPE html><html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head><body <?php body_class(); ?>>
 <?php get_header(); ?>
<div class="container">
  <div class="breadcrumbs-row">
    <div class="row">
      <div class="col-12">
         <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' /'); ?>
      </div>
    </div>
  </div>
  <div class="single-service-row">
    <div class="row">
      <div class="d-none d-md-block col-4 col-xxl-3">
        <div class="service-sidebar">
          <div class="service-sidebar-list">
            	<?php $page_parent_id = get_ancestors( get_the_ID(), 'page', 'post_type' )[0]; ?>
            <ul>
              	<?php 
              		if( $page_parent_id == '' ) {
              			$page_parent_id = 27;
              	?><a style="color: #242d34;" href=" <?php echo get_page_link($page_parent_id); ?>"><strong>
                   <?php echo get_the_title( $page_parent_id ); ?></strong></a>
              	<?php } else { ?><a style="color: #242d34;" href=" <?php echo get_page_link($page_parent_id); ?>"><strong>
                   <?php echo get_the_title( $page_parent_id ); ?></strong></a>
              	<?php } ?>
              	<?php 
              
              
              		$args = array(
              			'post_type'				=>	'page',
              			'post_parent'			=>	$page_parent_id,
              			'posts_per_page'	=>	-1,
              			'order'						=>	'ASC',
              			'orderby'					=>	'menu_order',
              		);
              
              		$parent = new WP_Query( $args );
              
              		if( $parent->have_posts() ) : ?>
              			<?php while( $parent->have_posts() ) : $parent->the_post(); ?>
              <li><a href=" <?php the_permalink(); ?>">
                   <?php the_title(); ?></a></li>
              			<?php endwhile; ?>
              		<?php endif; wp_reset_postdata(); ?>
              
            </ul>
          </div>
          <div class="service-sidebar-commercial"><img src=" <?php echo get_template_directory_uri() . '/assets/images/commercial-block.png' ?>" alt=""></div>
        </div>
      </div>
      <div class="col-12 col-md-8 col-xxl-9 content-singlePage-col">
        <div class="content-singlePage-wrapper">
          <div class="entry-header">
            <h1 class="entry-title">
               <?php wp_title(''); ?>
            </h1>
          </div>
          <div class="entry-content">
             <?php the_content(); ?>
          </div>
          <div class="entry-footer">
            <div class="service-footer-form">
              <div class="row">
                <div class="col-12 col-md-7 service-footer-form-col">
                  <div class="service-footer-form-text">
                    <p>
                       <?php echo carbon_get_theme_option('service-footer-form-text-1'); ?>
                    </p>
                  </div>
                  <ul class="service-footer-form-list">
                    <li><a class="site-telephone-text" href="tel:+">
                         <?php echo carbon_get_theme_option('site_phone_1'); ?></a></li>
                    <li><a class="site-telephone-text" href="tel:+">
                         <?php echo carbon_get_theme_option('site_phone_2'); ?></a></li>
                    <li><a class="site-telephone-text" href="tel:+">
                         <?php echo carbon_get_theme_option('site_phone_3'); ?></a></li>
                  </ul>
                </div>
                <div class="col-12 col-md-5 service-footer-form-col">
                  <div class="service-footer-form-text">
                    <p>
                       <?php echo carbon_get_theme_option('service-footer-form-text-2'); ?>
                    </p>
                  </div>
                  <button class="service-btn-form vkenergy_button _reverse feedback-call-btn" type="button" data-toggle="modal" data-target=".modal-manager-3">Задать вопрос</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
<?php
/*
	Template name: Шаблон страниц "Архив услуг"
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
<div class="breadcrumbs-row">
  <div class="container">
    <div class="row">
      <div class="col-12">
         <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' /'); ?>
      </div>
    </div>
  </div>
</div>
<div class="title-row">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="entry-header">
          <h1 class="entry-title">
             <?php wp_title(''); ?>
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="archive-services-row">
  <div class="container">
    <div class="row">
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
      <div class="col-12 col-md-6">
        <div class="service-block" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');">
          <div class="service-block-text">
            <div class="service-block-title">
              <p>
                 <?php echo the_title(); ?>
              </p>
            </div><a class="service-block-link vkenergy_button _services _general" href=" <?php the_permalink(); ?>">Подробнее</a>
          </div>
        </div>
      </div>
      			<?php endwhile; ?>
      		<?php endif; wp_reset_postdata(); ?>
      
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
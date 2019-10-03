<?php
/*
	Template name: Шаблон страниц "Каталог"
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
  <div class="page-body-container">
    <div class="row">
       <?php get_sidebar('shop'); ?>
      <div class="col-12 d-md-none">
        <div class="wp-page-title">
          <h1 class="entry-title">
             <?php echo wp_title(''); ?>
          </h1>
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="catalog-wrapper">
          <div class="row">
            	<?php
            	
            		$taxonomy     = 'product_cat';
            		$order        = 'menu_order';
            		$orderby      = 'ID';
            		$show_count   = 0;
            		$pad_counts   = 0;
            		$hierarchical = 1;
            		$title        = '';
            		$empty        = 0;
            		$exclude      = '15';
            		$args = array(
            			'taxonomy'     => $taxonomy,
            			'order'        => $order,
            			'orderby'      => $orderby,
            			'show_count'   => $show_count,
            			'pad_counts'   => $pad_counts,
            			'hierarchical' => $hierarchical,
            			'title_li'     => $title,
            			'exclude'      => $exclude,
            			'hide_empty'   => $empty
            		);
            		$all_categories = get_categories( $args );
            		
            		foreach ($all_categories as $cat) {
            	
            			$term_link = get_term_link( $cat );
            			
            			if($cat->category_parent == 0) {
            
            					$category_id = $cat->term_id;
            							$category_thumbnail_id  = get_woocommerce_term_meta($category_id, 'thumbnail_id', true);
            					$thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
            	?>
            <div class="col-xs-12 col-sm-6 col-lg-4 col-xl-3 catalog-item-col"><a class="catalog-item-block" href="<?php echo $term_link; ?>">
                <div class="catalog-item-image"><img class="catalog-item-thumb" src=" <?php  echo $thumbnail_image_url; ?>" alt=""></div>
                <h2 class="catalog-item-title">
                  <?php echo $cat->name ?>
                </h2></a></div>
            	
            	<?php
            			
            			}
            		}
            	?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
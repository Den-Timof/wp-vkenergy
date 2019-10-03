<?php
/*
	Template name: Шаблон страниц "Примеры работ или акции"
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
  <div class="header-row">
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
  <div class="page-archive-container archive-slug-rabota">
    	<?php
    		
    		$id	=	get_category_by_slug('rabota')->cat_ID;
    		$count_items = -1;
    		$paged = get_query_var( 'paged', 1 );
    
    		$args = array(
    			'cat'							=>	$id,
    			'posts_per_page'	=>	$count_items,
    			'paged'						=>	$paged,
    		);
    		$recent = new WP_Query( $args );
    
    		while( $recent->have_posts() ) {
    			$recent->the_post();
    		?>
    <div class="row archive-row">
      <div class="col-12">
         <?php the_title(); ?>
      </div>
    </div>
    		
    		
    		<?php
    		}
    		wp_reset_postdata();
    
    	?>
  </div>
  <div class="pagination-row">
    <div class="row">
      <div class="col-12">
        	<?php
        		if( function_exists('wp_pagenavi') ) {
        			wp_pagenavi( array( 'query' => $recent ) );
        		} else {
        	?>
        
        <div class="page-nav-default">
           <?php the_posts_navigation(); ?>
        </div>
        <div class="page-nav">
          <div class="nav-previous">
             <?php previous_posts_link('Предыдущая') ?>
          </div>
          <div class="nav-next">
             <?php next_posts_link('Следующая') ?>
          </div>
        </div>
        	
        	<?php } ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
<?php
/*
	Template name: Шаблон страниц "Контакты"
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
  <div class="page-body-container w-100 _row-1">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="entry-header">
          <h1 class="entry-title">
             <?php wp_title(''); ?>
          </h1>
        </div>
        <div class="content-block">
           <?php echo apply_filters( 'the_content', get_the_content( get_the_ID() ) ); ?>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-6">
        <div class="map-block h-100" id="map"></div>
      </div>
    </div>
  </div>
  <div class="page-body-container _row-2">
    <div class="row">
      <div class="entry-header">
        <div class="col-12">
          <h1 class="entry-title">
            	<?php
            		$props = CFS()->get_field_info( 'реквизиты_текст' );
            		echo $props['label'];
            	?>
          </h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="content-block font-weight-bold">
        <div class="col-12">
           <?php echo CFS()->get( 'реквизиты_текст' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
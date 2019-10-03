<?php
/*
	Template name: Шаблон страниц "Отдельная страница работы"
	Template post type: post
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
  <div class="row">
    <div class="col-12">
      <div class="breadcrumbs-row">
         <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' /'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="page-body-container">
        <div class="entry-header">
          <h1 class="entry-title">
             <?php wp_title(''); ?>
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
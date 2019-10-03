<?php
/*
	Template name: Шаблон страниц "Сертификаты или отзывы"
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
      <div class="col-12">
        <div class="entry-header">
          <h1 class="entry-title">
             <?php wp_title(''); ?>
          </h1>
        </div>
      </div>
    </div>
     <?php if( is_page( 33 ) ) { ?>
    <div class="row reviews-wrapper" data-page-id="<?php echo get_the_ID(); ?>">
      	<?php
      		$fields = CFS()->get( 'список_блоков' );
      		$fieldsHidden = $fields;
      		$limit_el = carbon_get_theme_option('reviews_btnmore_limit');
      		$limit_el = (int) $limit_el;
      		array_splice($fields, $limit_el );
      		foreach ( $fields as $key => $field ) {
      	?>
      <div class="col-12 col-md-9 col-lg-5 review-col">
        <div class="review-block row">
          <div class="col-12 col-sm-6 col-md-7">
            <div class="review-img"><a class="img-fancybox" data-caption=" <?php echo $field['заголовок']; ?>" data-fancybox="gallery" href=" <?php echo $field['изображение_элемента']; ?>"><img src=" <?php echo $field['изображение_элемента']; ?>" alt=""></a></div>
          </div>
          <div class="col-12 col-sm-6 col-md-5">
            <div class="review-content">
              <div class="review-logo-img"><img src=" <?php echo $field['изображение_логотипа_отзывы']; ?>" alt=""></div>
              <div class="review-subcontent">
                <p class="review-title">
                   <?php echo $field['заголовок']; ?>
                </p>
                <p class="review-text">
                   <?php echo $field['описание_отзывы']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      	<?php } ?>
      <input id="countReviewBlocks" type="hidden" value="<?php echo count($fieldsHidden); ?>">
    </div>
     <?php } else if( is_page( 32 ) ) { ?>
    <div class="row certificates-wrapper" data-page-id="<?php echo get_the_ID(); ?>">
      	<?php
      		$fields = CFS()->get( 'список_блоков' );
      		$fieldsHidden = $fields;
      		$limit_el = carbon_get_theme_option('sertificates_btnmore_limit');
      		$limit_el = (int) $limit_el;
      		array_splice($fields, $limit_el );
      		foreach ( $fields as $key => $field ) {
      	?>
      <div class="col-12 col-sm-6 col-lg-3 certificate-col">
        <div class="certificate-block">
          <div class="certificate-img"><a class="img-fancybox" data-caption=" <?php echo $field['заголовок']; ?>" data-fancybox="gallery" href=" <?php echo $field['изображение_элемента']; ?>"><img src=" <?php echo $field['изображение_элемента']; ?>" alt=""></a></div>
          <div class="certificate-content">
            <p class="certificate-title">
               <?php echo $field['заголовок']; ?>
            </p>
          </div>
        </div>
      </div>
       <?php } ?>
      <input id="countSertificateBlocks" type="hidden" value="<?php echo count($fieldsHidden); ?>">
    </div>
    	<?php } ?>
    <div class="row btn-more-row">
      <button class="btn-more" id="btnmore_ajax">Показать ещё</button>
    </div>
  </div>
</div>
<?php get_footer(); ?></body>
</html>
<!DOCTYPE html><html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101521587-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-101521587-2');
</script>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head><body <?php body_class(); ?>>
 <?php get_header(); ?>
<div class="slider-row main-row">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="main-slider __slick-slider" id="main-slider">
          	<?php
          		$fields = CFS()->get( 'цикл_слайдов', 146 );
          		foreach ( $fields as $field ) {
          	?>
          <div class="slide">
            <div class="slide-img">
              <picture>
                <source srcset=" <?php echo $field['webp_for_page_speed']; ?>" type="image/webp"><img src="	<?php echo $field['изображение_слайда']; ?>" alt="">
              </picture>
            </div>
            <div class="slide-text"><img class="d-none d-lg-block" data-src=" <?php echo get_template_directory_uri() . '/assets/images/slide-lines-min.png' ?>" src="" alt="">
              <p>
                 <?php echo $field['заголовок_слайда']; ?>
              </p>
            </div>
          </div>
          	<?php
          		}
          	?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="title-page">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="entry-header">
					<h1 class="entry-title">Промышленная вентиляция и кондиционирование </h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="products-row main-row">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="catalog-wrapper">
          <div class="row">
            	<?php
            
            		$category_parent = 64;
            	
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
            			
            			if($cat->category_parent == $category_parent) {
            
            					$category_id = $cat->term_id;
            							$category_thumbnail_id  = get_woocommerce_term_meta($category_id, 'thumbnail_id', true);
            					$thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
            	?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 catalog-item-col"><a class="catalog-item-block" href="<?php echo $term_link; ?>">
                <div class="catalog-item-image"><img class="catalog-item-thumb" data-src=" <?php  echo $thumbnail_image_url; ?>" src="" alt=""></div>
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
<div class="about-row main-row">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="entry-header">
          <p class="entry-title">
             <?php $post_27 = get_post(27); echo $post_27->post_title; ?>
          </p>
        </div>
        <div class="page-content">
          	<?php 
          
          		$args = array(
          			'p'					=>	27,
          			'post_type'	=>	'page'
          		);
          
          		$parent = new WP_Query( $args );
          
          		if( $parent->have_posts() ) : ?>
          			<?php while( $parent->have_posts() ) : $parent->the_post(); ?>
          <div class="d-none d-lg-block">
             <?php the_content(); ?>
          </div>
          <div class="d-lg-none">
            <p>
               <?php echo excerpt(50); ?>
            </p><a class="_blue-feedback-button _dashed" href=" <?php echo get_page_link(27); ?>">Читать далее</a>
          </div>
          			<?php endwhile; ?>
          		<?php endif; wp_reset_postdata(); ?>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="projects-row main-row bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="entry-header">
          <p class="entry-title">Наши поставки</p>
        </div>
        <div class="projects-wrapper">
          <div class="row">
            	<?php
            		
            		$id	=	get_category_by_slug('rabota')->cat_ID;
            		$count_items = 4;
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
            <div class="col-xs-12 col-sm-6 col-lg-3">
              <div class="project-anons-block">
                <div class="project-title">
                   <?php the_title(); ?>
                </div>
                <div class="project-date">
                   <?php echo get_the_date( 'd F Y' ) . ' года'; ?>
                </div>
                <div class="project-thumb"><img alt="" src="" data-src="<?php echo get_the_post_thumbnail_url(); ?>"></div>
                <div class="project-content">
                   <?php echo excerpt(35); ?>
                </div>
                <div class="project-link"><a class="_blue-feedback-button _dashed" href=" <?php the_permalink(); ?>">Подробнее</a></div>
                <div class="clear"></div>
              </div>
            </div>
            		
            		
            		<?php
            		}
            		wp_reset_postdata();
            
            	?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="stages-row main-row">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="entry-header">
          <p class="entry-title">Как мы работаем</p>
        </div>
      </div>
    </div>
    <div class="row">
      	<?php
      		/* 170 - Запись "Как мы работаем" */
      		$fields = CFS()->get( 'этапы_работ', 170 );
      		if( $fields != '' ) {
      			foreach( $fields as $key => $field ) {
      	?>
      <div class="col-xs-12 col-sm-6 col-lg-3">
        <div class="stage-block">
          <div class="stage-bg-num">
            <p>
               <?php echo ++$key; ?>
            </p>
          </div>
          <div class="stage-img"><img data-src=" <?php echo $field['этап_изображение']; ?>" src="" alt=""></div>
          <div class="stage-content">
            <p>
               <?php echo $field['этап_описание']; ?>
            </p>
          </div>
        </div>
      </div>
      	<?php
      			}
      		}
      		
      		
      	?>
      <div class="col-3"></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="stage-link">
          <button class="vkenergy_button _reverse _general _ttUpper _fontReg" type="button" data-toggle="modal" data-target=".modal-manager-3">Оставить заявку</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="special-row main-row stock-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-6 _sertificate-list">
        <div class="sertificate-list-wrap">
          <p class="entry-title">Сертификаты</p>
          <div class="btn-stocks-all"><a class="_blue-feedback-button _dashed" href=" <?php echo get_page_link(32) ?>">Смотреть всё</a></div>
          <ul>
            <div class="row certificates-wrapper" data-page-id="<?php echo get_the_ID(); ?>">
              	<?php
              		$fields = CFS()->get( 'список_блоков', 32 );
              		$fieldsHidden = $fields;
              		array_splice($fields, 3 );
              		foreach ( $fields as $key => $field ) {
              	?>
              <div class="col-12 col-sm-4 certificate-col">
                <div class="certificate-block">
                  <div class="certificate-img"><a class="img-fancybox" data-caption=" <?php echo $field['заголовок']; ?>" data-fancybox="gallery" href=" <?php echo $field['изображение_элемента']; ?>">
                      <picture>
                        <source srcset="<?php echo $field['webp_for_page_speed']; ?>" type="image/webp">
												<img data-src="<?php echo $field['изображение_элемента']; ?>" alt="" src="">
                      </picture></a></div>
                </div>
              </div>
               <?php } ?>
              <input id="countSertificateBlocks" type="hidden" value="<?php echo count($fieldsHidden); ?>">
            </div>
          </ul>
        </div>
      </div>
      <div class="col-12 col-lg-6 _stocks-list">
        <div class="stocks-list-wrap">
          <p class="entry-title">Акции и спецпредложения</p>
          <div class="btn-stocks-all"><a class="_blue-feedback-button _dashed" href=" <?php echo get_category_link(55) ?>">Смотреть всё</a></div>
          <ul class="other-stock">
            	<?php
            		$id						=	get_category_by_slug('akcija')->cat_ID;
            		$count_items	= 3;
            
            		$args = array(
            			'cat'							=>	$id,
            			'posts_per_page'	=>	$count_items,
            			'orderby' => 'rand',
            		);
            		$recent = new WP_Query( $args );
            
            		while( $recent->have_posts() ) {
            			$recent->the_post();
            		?>
            			<li>
            				<p><?php the_excerpt(); ?></p>
            				<a class="_blue-feedback-button _dashed" href="<?php the_permalink(); ?>">Узнать больше</a>
            			</li>
            		<?php
            		}
            		wp_reset_postdata();
            
            	?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="contacts-row main-row d-none d-lg-block">
  <div class="contacts-row-bg"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="entry-header">
          <p class="entry-title __white">Контакты</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-3 col-xl-4 contact-main-col">
        <div class="contact-main-address">
          <ul>
            <li>
               <?php echo carbon_get_theme_option('site_index'); ?>
            </li>
            <li>
               <?php echo carbon_get_theme_option('site_city'); ?>
            </li>
            <li id="address">
               <?php echo carbon_get_theme_option('site_address'); ?>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-lg-3 col-xl-2 contact-main-col">
        <div class="contact-main-phone contact-col-cont">
          <ul>
            <li><a href="tel:+">
                 <?php echo carbon_get_theme_option('site_phone_1'); ?></a></li>
            <li><a href="tel:+">
                 <?php echo carbon_get_theme_option('site_phone_2'); ?></a></li>
            <li><a href="tel:+">
                 <?php echo carbon_get_theme_option('site_phone_3'); ?></a></li>
          </ul>
        </div>
      </div>
      <div class="offset-xl-1"></div>
      <div class="col-12 col-lg-3 col-xl-2 contact-main-col">
        <div class="contact-main-email contact-col-cont"><a href="mailto:">
             <?php echo carbon_get_theme_option('site_email'); ?></a></div>
      </div>
      <div class="col-12 col-lg-3 col-xl-3 contact-main-col">
        <div class="contact-main-btn">
          <button class="vkenergy_button _general _fontReg" type="button" data-toggle="modal" data-target=".modal-manager-3">Оставить заявку</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="map-row main-row">
  <div id="map"></div>
</div>
<?php get_footer(); ?></body>
</html>
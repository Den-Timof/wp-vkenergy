<?php

	if( !defined( 'ABSPATH' ) ) {
		exit;
	}

	add_action('wp_ajax_btn_more_ajax', 'vkenergy_btnmore_callback');
	add_action('wp_ajax_nopriv_btn_more_ajax', 'vkenergy_btnmore_callback');
	function vkenergy_btnmore_callback() {
		
		// if(!wp_verify_nonce($_POST['nonce'], 'btnmore-nonce')) {
		// 	wp_die('Данные отправлены с левого адреса');
		// }

		ob_start();
		?>

		<?php	
		?>

		<?php if( $_POST['id'] == 33 ) { ?>
			<?php
				$ajaxCount = carbon_get_theme_option('reviews_btnmore_count');
				$ajaxCount = (int) $ajaxCount;

				$post_Count = $_POST['count'];
				$post_Count = (int) $post_Count;

				$fields = CFS()->get( 'список_блоков', $_POST['id'] );
				$data['fields_before'] = count($fields);

				$fields = array_slice($fields, $post_Count, $ajaxCount);

				foreach ( $fields as $field ) {
			?>
				<div class="col-12 col-md-9 col-lg-5 review-col">
					<div class="review-block row">
						<div class="col-12 col-sm-6 col-md-7">
							<div class="review-img">
								<a class="img-fancybox" data-caption=" <?php echo $field['заголовок']; ?>" data-fancybox="gallery" href=" <?php echo $field['изображение_элемента']; ?>">
								<img src=" <?php echo $field['изображение_элемента']; ?>" alt="">
								</a>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-5">
							<div class="review-content">
								<div class="review-logo-img">
									<img src=" <?php echo $field['изображение_логотипа_отзывы']; ?>" alt="">
								</div>
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
		<?php } else if( $_POST['id'] == 32 ) { ?>
			<?php
				$ajaxCount = carbon_get_theme_option('sertificates_btnmore_count');
				$ajaxCount = (int) $ajaxCount;

				$post_Count = $_POST['count'];
				$post_Count = (int) $post_Count;

				$fields = CFS()->get( 'список_блоков', $_POST['id'] );
				$data['fields_before'] = count($fields);

				$fields = array_slice($fields, $post_Count, $ajaxCount);

				// echo $ajaxCount;
				// echo var_dump($fields);

				foreach ( $fields as $field ) {
			?>
				<div class="col-12 col-sm-6 col-lg-3 certificate-col">
					<div class="certificate-block">
						<div class="certificate-img">
							<a class="img-fancybox" data-caption=" <?php echo $field['заголовок']; ?>" data-fancybox="gallery" href=" <?php echo $field['изображение_элемента']; ?>">
								<img src=" <?php echo $field['изображение_элемента']; ?>" alt="">
							</a>
						</div>
						<div class="certificate-content">
							<p class="certificate-title">
								<?php echo $field['заголовок']; ?>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>


		<?php
		$data['fields_after'] = count($fields);
		$data['btn_more'] = ob_get_clean();
		wp_send_json($data);
		wp_die();

	}

?>
<?php

	if( !defined( 'ABSPATH' ) ) {
		exit;
	}

	add_action('wp_ajax_cf7_ajax', 'vkenergy_cf7form_callback');
	add_action('wp_ajax_nopriv_cf7_ajax', 'vkenergy_cf7form_callback');
	function vkenergy_cf7form_callback() {
		
		// if(!wp_verify_nonce($_POST['nonce'], 'cf7-nonce')) {
		// 	wp_die('Данные отправлены с левого адреса');
		// }

		ob_start();
		?>

		<div class="modal modal-manager-1 fade" id="modalManager_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<!-- <span class="s-icon s-icon-modal-close" aria-hidden="true"></span> -->
							&#215;
						</button>
					</div>
					<div class="modal-body">
						<?php echo do_shortcode('[contact-form-7 id="178" title="Консультация"]'); ?>
					</div>
				</div>
			</div>
		</div>


		<?php
		$data['cf7_form'] = ob_get_clean();
		wp_send_json($data);
		wp_die();

	}

?>
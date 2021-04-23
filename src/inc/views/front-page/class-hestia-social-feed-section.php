<?php
/**
 * The Social_Feed Section
 *
 * @package Hestia
 */

/**
 * Class Hestia_Social_Feed_Section
 */
class Hestia_Social_Feed_Section extends Hestia_Abstract_Main {
	/**
	 * Initialize Social_Feed Section
	 */
	public function init() {
		// $this->hook_section();
		$this->render_section();
	}

	/**
	 * Social_Feed section content.
	 *
	 * @since Hestia 1.0
	 * @modified 1.1.51
	 */
	public function render_section() {
		{
		?>
			<section class="hestia-social-feed" id="social-feed" data-sorder="hestia_social_feed">
				<?php hestia_display_customizer_shortcut( 'hestia_social_feed_hide', true ); ?>
				<div class="container">
					<div class="row">
                        <div class="col-md-8 col-md-offset-2 hestia-register-title-area">
                            <h2 class="hestia-title">
								<i class="fab fa-instagram"></i>&nbsp;cartaoamigo.brasil
							</h2>
                        </div>
                    </div>
					<?php echo do_shortcode('[instagram-feed]'); ?>
				</div>
			</section>
			<?php
		}
	}
}

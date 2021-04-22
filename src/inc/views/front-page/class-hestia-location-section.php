<?php
/**
 * The Location Section
 *
 * @package Hestia
 */

/**
 * Class Hestia_Location_Section
 */
class Hestia_Location_Section extends Hestia_Abstract_Main {
	/**
	 * Initialize Location Section
	 */
	public function init() {
		// $this->hook_section();
		$this->render_section();
	}

	/**
	 * Location section content.
	 *
	 * @since Hestia 1.0
	 * @modified 1.1.51
	 */
	public function render_section() {
		{
		?>
			<section class="hestia-location" id="location" data-sorder="hestia_location">
				<?php hestia_display_customizer_shortcut( 'hestia_location_hide', true ); ?>
				<div class="container">
					<div class="row hestia-location-content">
                    	<h2>Nosso objetivo é estar em todo lugar</h2>
					</div>
				</div>
			</section>
			<?php
		}
	}
}

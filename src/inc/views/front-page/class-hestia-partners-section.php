<?php

/**
 * The Partners Section
 *
 * @package Hestia
 */

/**
 * Class Hestia_Partners_Section
 */
class Hestia_Partners_Section extends Hestia_Abstract_Main
{
    /**
     * Initialize Partners Section
     */
    public function init()
    {
        $this->render_section();
    }

    /**
     * Exibe as logomarcas da rede
     */
    public function the_rede_credenciada( $atts = array() ) {
        $setting_id = 'set_rede_credenciada';
        $ids_array = get_theme_mod( $setting_id );
        if ( is_array( $ids_array ) && ! empty( $ids_array ) ) {
            return $ids_array;
        } else {
            return [];
        }
    }

    /**
     * Partners section content.
     *
     * @since Hestia 1.0
     * @modified 1.1.51
     */
    public function render_section()
    { {
?>
            <section class="hestia-partners" id="partners" data-sorder="hestia_partners">
                <?php hestia_display_customizer_shortcut('hestia_partners_hide', true); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 hestia-register-title-area">
                            <h2 class="hestia-title">Rede credenciada</h2>
                        </div>
                    </div>
                    <div class="hestia-partners-content">
                        <div class="partners">
                            <?php
                                $logos_ids = $this->the_rede_credenciada();
                                foreach($logos_ids as $id){
                                ?>
                                    <div
                                        class="partner"
                                        style="background-image: url(<?php echo wp_get_attachment_image_src($id, 'full')[0]; ?>)">
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}

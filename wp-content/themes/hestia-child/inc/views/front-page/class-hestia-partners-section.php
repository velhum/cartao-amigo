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
                            <div class="partner" data-aos="flip-down">
                                Parceiro 1
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 2
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 3
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 4
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 5
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 6
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 7
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 8
                            </div>
                            <div class="partner" data-aos="flip-down">
                                Parceiro 9
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}

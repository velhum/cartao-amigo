<?php

/**
 * The Register Section
 *
 * @package Hestia
 */

/**
 * Class Hestia_Register_Section
 */
class Hestia_Register_Section extends Hestia_Abstract_Main
{
    /**
     * Initialize Register Section
     */
    public function init()
    {
        $this->render_section();
    }

    /**
     * Register section content.
     *
     * @since Hestia 1.0
     * @modified 1.1.51
     */
    public function render_section()
    { {
?>
            <section class="hestia-register" id="register" data-sorder="hestia_register">
                <?php hestia_display_customizer_shortcut('hestia_register_hide', true); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 hestia-register-title-area">
                            <h2 class="hestia-title">Associe-se</h2>
                        </div>
                    </div>
                    <div class="hestia-register-content">
                        <div class="row">
                            <div class="col-xs-12 col-ms-6 col-sm-6">
                                <div class="card card-profile card-plain" data-aos="flip-right">
                                    <div class="col-md-5">
                                        <div class="card-image"><img class="img" src="<?php echo get_template_directory_uri() . '-child/assets/images/card-in-pocket.png' ?>" alt="Um plano que cabe no seu bolso" title="Um plano que cabe no seu bolso"></div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="content">
                                            <h4 class="card-title">Plano anual</h4>
                                            <p class="preco">de <span class="riscado">R$ 249,00</span><br /> por R$ 149,00</p>
                                            <div class="buttons text-center">
                                                <a href="/?p=69&plano=anual" title="Quero!" class="btn btn-primary">
                                                    Quero! Só R$ 149,00/Ano
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-ms-6 col-sm-6">
                                <div class="card card-profile card-plain" data-aos="flip-right">
                                    <div class="col-md-5">
                                        <div class="card-image"><img class="img" src="<?php echo get_template_directory_uri() . '-child/assets/images/medical-doctor.png' ?>" alt="Médico fazendo anotações" title="Médico fazendo anotações"></div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="content">
                                            <h4 class="card-title">Plano mensal</h4>
                                            <p class="preco">de <span class="riscado">R$ 24,90</span><br /> por R$ 14,90</p>
                                            <div class="buttons text-center">
                                                <a href="/?p=69&plano=mensal" title="Quero!" class="btn btn-primary">
                                                    Quero! Só R$ 14,90/Mês
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons text-center">
                        <a href="/?p=69" title="Saiba mais" class="btn btn-primary">Seja Amigo!</a>
	                </div>

                </div>
            </section>
<?php
        }
    }
}

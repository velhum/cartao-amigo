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
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-cch.png' ?>"
                                    alt="Centro Clínico Humana"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-clinica-da-mama.png' ?>"
                                    alt="Clínica da Mama"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-clinica-semear-saude.png' ?>"
                                    alt="Clínica Semear Saúde"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-imeb.png' ?>"
                                    alt="IMEB"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-med-brasilia.png' ?>"
                                    alt="Med Brasília"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-med-garden.png' ?>"
                                    alt="Med Garden"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-nucleos.png' ?>"
                                    alt="Núcleos"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-sabin.png' ?>"
                                    alt="Sabin"/>
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-sempre-consulta.png' ?>"
                                    alt="Dra. Sempre Consulta" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-asperge.png' ?>"
                                    alt="Laboratório Asperge" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-clinica-vida.png' ?>"
                                    alt="Clínica Vida" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-cmmo.png' ?>"
                                    alt="CMMO" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-igdf.png' ?>"
                                    alt="Laboratório Asperge" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-medcei.png' ?>"
                                    alt="Med Cei" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-lapac.png' ?>"
                                    alt="Lapac Laboratório" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-iso.png' ?>"
                                    alt="Iso Cardiologia e Exames" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-foco.png' ?>"
                                    alt="Foco Oftalmologia" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-saude-catedral.png' ?>"
                                    alt="Saúde Catedral" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-peres.png' ?>"
                                    alt="Peres" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-ibe.png' ?>"
                                    alt="IBE Imagem e Diagnóstico" />
                            </div>
                            <div class="partner">
                                <img
                                    src="<?php echo get_template_directory_uri() . '-child/assets/images/rc-centrus.png' ?>"
                                    alt="Centrus Diagnóstico por imagem" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}

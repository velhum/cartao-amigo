<?php

/**
 * The Simulator Section
 *
 * @package Hestia
 */

/**
 * Class Hestia_Simulator_Section
 */
class Hestia_Simulator_Section extends Hestia_Abstract_Main
{
    /**
     * Initialize Simulator Section
     */
    public function init()
    {
        $this->render_section();
    }

    /**
     * Simulator section content.
     *
     * @since Hestia 1.0
     * @modified 1.1.51
     */
    public function render_section()
    { {
    ?>
            <section class="hestia-simulator" id="simulator" data-sorder="hestia_simulator" >
                <?php hestia_display_customizer_shortcut('hestia_simulator_hide', true); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 hestia-simulator-title-area">
                            <h2 class="hestia-title">Por que o Cartão Amigo?</h2>
                            <h3>
                                Chega de gastar com convênio que não usa • 
                                Pague apenas quando usar • 
                                Chega de gastar com uma saúde que não utiliza
                            </h3>
                            <h3>Com o Cartão Amigo, você tem acesso a uma ampla rede de clínicas e médicos especializados.</h3>
                            <h5 class="description">Use o simulador abaixo para ter uma ideia da diferença entre seu plano de saúde atual e o Cartão Amigo</h5>
                        </div>
                    </div>
                    <div class="hestia-simulator-content">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 feature-box">
                                <div class="hestia-info">
                                    <div class="icon" style="color:#4caf50">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <h4 class="info-title">Valor mensal do plano de saúde de sua família</h4>
                                    <div class="input-group fx-row">
                                        <span class="input-group-addon">R$</span>
                                        <input id="mensalidade"
                                            type="text"
                                            class="form-control dinheiro fx-grow"
                                            aria-label="Mensalidade"
                                            data-mask="#.##0,00"
                                            data-mask-reverse="true">
                                    </div>
                                    <div class="icon varios" style="color:#4caf50">
                                        <i class="fas fa-money-bill-wave"></i>
                                        <i class="fas fa-money-bill-wave"></i>
                                        <i class="fas fa-money-bill-wave"></i>
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <h4 class="info-title">Valor que você pagou por ano</h4>
                                    <div class="input-group fx-row">
                                        <span class="input-group-addon">R$</span>
                                        <input id="anuidade"
                                            type="text"
                                            class="form-control dinheiro fx-grow"
                                            aria-label="Anuidade"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 feature-box">
                                <div class="hestia-info">
                                    <div class="icon" style="color:#00bcd4">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <h4 class="info-title">Procedimentos médicos que você realizou nos últimos 12 meses</h4>
                                    <ul class="procedimentos">
                                        <li class="procedimento">
                                            <input type="hidden" class="quantidade" value="0" max="5">
                                            <span class="descricao" data-valor="300">
                                                Tomografia <span class="range"><br />(de 0 a 5)</span>
                                            </span>
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <input type="hidden" class="quantidade" value="0" max="5">
                                            <span class="descricao" data-valor="120">Ultrassonografia <span class="range"><br />(de 0 a 5)</span> </span>
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <span class="descricao" data-valor="65">Mamografia <span class="range"><br />(de 0 a 5)</span> </span>
                                            <input type="hidden" class="quantidade" value="0" max="5">
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <span class="descricao" data-valor="500">Ressonância <span class="range"><br />(de 0 a 5)</span> </span>
                                            <input type="hidden" class="quantidade" value="0" max="5">
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <span class="descricao" data-valor="350">Exames de sangue <span class="range"><br />(de 0 a 5)</span> </span>
                                            <input type="hidden" class="quantidade" value="0" max="5">
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <span class="descricao" data-valor="100">Consulta médica <span class="range"><br />(de 0 a 10)</span> </span>
                                            <input type="hidden" class="quantidade" value="0" max="10">
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <span class="descricao" data-valor="350">Endoscopia digestiva <span class="range"><br />(de 0 a 3)</span> </span>
                                            <input type="hidden" class="quantidade" value="0" max="3">
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                        <li class="procedimento">
                                            <span class="descricao" data-valor="400">Colonoscopia <span class="range"><br />(de 0 a 1)</span> </span>
                                            <input type="hidden" class="quantidade" value="0" max="1">
                                            <div class="mais-ou-menos menos" role="button">-</div>
                                            <div class="valor">0</div>
                                            <div class="mais-ou-menos mais" role="button">+</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 feature-box">
                                <div class="hestia-info resultado">
                                    <div class="icon" style="color:#fd6925">
                                        <i class="far fa-smile-beam"></i>
                                    </div>
                                    <h4 class="info-title">O que você teria gasto se tivesse o Cartão Amigo</h4>
                                    <div class="input-group fx-row">
                                        <span class="input-group-addon">R$</span>
                                        <input id="gasto-cartao-amigo"
                                            type="text"
                                            class="form-control dinheiro fx-grow"
                                            disabled>
                                    </div>
                                    <div class="icon varios" style="color:#fd6925">
                                        <img src="<?php echo get_template_directory_uri() . '-child/assets/images/flying-money.svg' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '-child/assets/images/flying-money.svg' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '-child/assets/images/flying-money.svg' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '-child/assets/images/flying-money.svg' ?>">
                                    </div>
                                    <h4 class="info-title">Dinheiro que você deixou de economizar</h4>
                                    <div class="input-group fx-row">
                                        <span class="input-group-addon">R$</span>
                                        <input id="diferenca"
                                            type="text"
                                            class="form-control dinheiro fx-grow"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
    }
}

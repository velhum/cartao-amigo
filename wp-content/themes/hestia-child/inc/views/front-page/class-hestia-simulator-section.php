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
                                    <h4 class="info-title">Quanto você paga atualmente pelo seu plano de saúde?</h4>
                                    <div class="input-group fx-row">
                                        <span class="input-group-addon">R$</span>
                                        <input id="mensalidade"
                                            type="text"
                                            class="form-control dinheiro fx-grow"
                                            aria-label="Mensalidade"
                                            data-mask="#.##0,00"
                                            data-mask-reverse="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 feature-box">
                                <div class="hestia-info">
                                    <div class="icon" style="color:#00bcd4">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <h4 class="info-title">Nos últimos 12 meses, quais serviços você utilizou?</h4>
                                    <div class="fx-row" style="width: 100%">
                                        <div class="dropup dropdown procedimentos">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="menu-procedimetos"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                                Serviços
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="menu-procedimetos">
                                                <li class="procedimento">
                                                    <span class="descricao" data-valor="100.00">Consulta</span>
                                                    <input type="number" class="quantidade" value="0">
                                                </li>
                                                <li class="procedimento">
                                                    <span class="descricao" data-valor="233.99">Procedimento 1</span>
                                                    <input type="number" class="quantidade" value="0">
                                                </li>
                                                <li class="procedimento">
                                                    <span class="descricao" data-valor="362.45">Procedimento 2</span>
                                                    <input type="number" class="quantidade" value="0">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 feature-box">
                                <div class="hestia-info resultado">
                                    <div class="icon" style="color:#e91e63">
                                        <i class="far fa-sad-tear"></i>
                                    </div>
                                    <h4 class="info-title">Você gastou todo esse dinheiro à toa</h4>
                                    <div class="input-group fx-row">
                                        <span class="input-group-addon">R$</span>
                                        <input id="diferenca"
                                            type="text"
                                            class="form-control dinheiro fx-grow"
                                            aria-label="diferença"
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

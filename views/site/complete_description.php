<?php
$dataEmissaoNfe = \Yii::$app->formatter->asDate($pedido->data_hora_emissao_nfe, 'php:d/m/Y H:i:s');
?>
<div class="row">
    <div class="col s12">
        <ul class="collection with-header">
            <li class="collection-header">
                <h6><?php $pedido->kit->descricao ?></h6>
            </li>
            <?php foreach ($pedido->kit->itens as $item):?>
                <li class="collection-item">
                    <img src="images/<?=$item->imagem?>" alt="" class="img-item circle"> 
                    <span class="new badge badge-item" data-badge-caption="itens">1</span>
                    <span class="text-item"><?=$item->descricao?></span>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <table class="striped">
            <tr>
                <td>Contrato de Licença</td>
                <td><?=$pedido->contrato_licenca?> | <?=\Yii::$app->formatter->asDate($pedido->data_hora_criacao, 'php:d/m/Y H:i:s')?> | <a href="#">baixar</a></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><span class="new badge orange" data-badge-caption="<?=$pedido->status->descricao?>"></span></td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><b>R$ <?=\Yii::$app->formatter->asDecimal($pedido->preco)?></b></td>
            </tr>
            <tr>
                <td>Data de Criação</td>
                <td><?=\Yii::$app->formatter->asDate($pedido->data_hora_criacao, 'php:d/m/Y')?></td>
            </tr>
            <tr>
                <td>CNPJ para Envio</td>
                <td><?=$pedido->dadosEnvios->cnpj?></td>
            </tr>
            <tr>
                <td>Estado para Envio</td>
                <td><?=$pedido->dadosEnvios->estado->descricao?></td>
            </tr>
            <tr>
                <td>Telefone para Envio</td>
                <td><?=$pedido->dadosEnvios->telefone?></td>
            </tr>
            <tr>
                <td>CEP para Envio</td>
                <td><?=$pedido->dadosEnvios->cep?></td>
            </tr>
            <tr>
                <td>País para Envio</td>
                <td><?=$pedido->dadosEnvios->estado->pais->descricao?></td>
            </tr>
            <tr>
                <td>Comentário do Pedido</td>
                <td><?=$pedido->dadosEnvios->comentario?></td>
            </tr>
            <tr>
                <td>Executivo de Vendas</td>
                <td><input id="executivo-vendas" type="text"></td>
            </tr>
            <tr>
                <td>Número do pedido de Hardware</td>
                <td><input id="npedido-hardware" type="text"></td>
            </tr>
            <tr>
                <td>NFe Número</td>
                <td><?= $pedido->numero_nfe?></td>
            </tr>
            <tr>
                <td>Data Emissão NFe</td>
                <td><?= $dataEmissaoNfe != '<span class="not-set">(not set)</span>' ? $dataEmissaoNfe : '' ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <b class="with-text-item">Histórico de Pedidos</b>
        <table class="striped">
        <?php foreach ($pedido->historicosPedidos as $historico):?>
            <tr>
                <td><?= \Yii::$app->formatter->asDate($historico->data_hora, 'php:d/m/Y H:i:s')?></td>
                <td><?= $historico->status->descricao ?></td>
            </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>
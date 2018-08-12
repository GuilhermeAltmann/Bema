<?php

/* @var $this yii\web\View */
Yii::$app->view->registerJsFile('js/meus-pedidos.js');
$this->title = 'Bemacash | Meus Pedidos';
?>

<div class="section">
    <h4>Meus Pedidos</h4>
    <ul class="collapsible">
        <?php foreach($pedidos as $pedido):?>
            <li data-pedido="<?=$pedido->idpedido?>">
                <div class="collapsible-header">Pedido #<?=$pedido->idpedido?> - <?=$pedido->kit->descricao?> - <?=$pedido->status->descricao?> - <?=\Yii::$app->formatter->asDate($pedido->data_hora_criacao, 'php:d/m/Y H:i:s')?> </div>
                <div class="collapsible-body"></div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

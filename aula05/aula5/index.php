<?php

require_once 'classes/Class.Pessoa.php';
require_once 'classes/Class.Pedido.php';
require_once 'classes/Class.ItemPedido.php';

$cliente = new PessoaFisica('WAGNER', 'email@email.com', '12312312312');

$item1 = new ItemPedido(23, 'ARROZ', 20.00);
$item2 = new ItemPedido(24, 'FEIJÃO', 12.00);
$item3 = new ItemPedido(25, 'FARINHA', 5.00);

$pedido = new Pedido($cliente);
$pedido->addItem($item1);
$pedido->addItem($item2);
$pedido->addItem($item3);

echo 'VALOR TOTAL R$ ' . $pedido->getValorTotal() . '<br>';

$pedido->removeItem($item2);

echo 'VALOR TOTAL R$ ' . $pedido->getValorTotal() . '<br>';

echo '<br>';

echo '<strong><h3>Meu Pedido</h3></strong>';
// echo '<br>';
echo $pedido->getPedido();

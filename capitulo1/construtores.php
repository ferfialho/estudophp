<?php
# carrega as classes

include_once 'classes/Pessoa.class.php';
include_once 'classes/Conta.class.php';

$carlos = new Pessoa(10, "Carlos da silva", 1.85, 25, "10/04/1976", "Ensino Medio", 650.00);

echo "Manipulando o objeto {$carlos->Nome}";

echo "{$carlos->Nome} é formado em : {$carlos->Escolaridade} <br>";
$carlos->Formar('Tecnico em Eletrecidade');
echo "{$carlos->Nome} é formado em : {$carlos->Escolaridade} <br>";


echo "{$carlos->Nome} Possui : {$carlos->Idade} <br>";
$carlos->Envelhecer(1);
echo "{$carlos->Nome} Possui: {$carlos->Idade} <br>";


$conta_carlos = new Conta(6677, "cc.123.45", "10/07/02",$Carlos, 9876, 567.89);

echo "<br>";
echo "manipulando a conta de : {$conta_carlos->Titular->Nome} <br>";
echo "o saldo atual é R\$  {$conta_carlos->Obtersaldo()}";

$conta_carlos->Depositar(20);
echo "O saldo atual é R\$ {$conta_carlos->Obtersaldo()}<br>";

$conta_carlos->Retirar(10);
echo "O saldo atual é R\$ {$conta_carlos->Obtersaldo()}<br>";
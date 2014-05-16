<?php
# carrega as classes

include_once 'classes/Pessoa.class.php';
include_once 'classes/Conta.class.php';

# criação do objeto $carlos

$carlos = new Pessoa;
$carlos->Codigo = 10;
$carlos->Nome = "Carlos da silva";
$carlos->Altura = 1.85;
$carlos->Idade = 25;
$carlos->Nascimento = '10/04/1976';
$carlos->Escolaridade = "Ensino Medio";

echo "Manipulando o objeto $carlos->Nome : <br>";

echo "{$carlos->Nome} é formado em : {$carlos->Escolaridade} <br>";
$carlos->Formar('Tecnico em Eletrecidade');
echo "{$carlos->Nome} é formado em : {$carlos->Escolaridade} <br>";


echo "{$carlos->Nome} Possui : {$carlos->Idade} <br>";
$carlos->Envelhecer(1);
echo "{$carlos->Nome} Possui: {$carlos->Idade} <br>";


#criação do objeto $conta_carlos

$conta_carlos = new Conta();
$conta_carlos->Agencia = 6677;
$conta_carlos->Codigo = "CC.1234.56";
$conta_carlos->DataDeCriacao = "10/07/02";
$conta_carlos->Titular = $carlos;
$conta_carlos->Senha = 9787;
$conta_carlos->Saldo = 567.98;
$conta_carlos->Cancelada = false;

echo "<br>";
echo "manipulando a conta de : {$conta_carlos->Titular->Nome} <br>";
echo "o saldo atual é R\$  {$conta_carlos->Obtersaldo()}";

$conta_carlos->Depositar(20);
echo "O saldo atual é R\$ {$conta_carlos->Obtersaldo()}<br>";

$conta_carlos->Retirar(10);
echo "O saldo atual é R\$ {$conta_carlos->Obtersaldo()}<br>";

?>
<?php
// insere a classe 

include_once 'classes/Produto.class.php';

// cria os objeto

$produto1 = new Produto();
$produto2 = new Produto();



//  atribui valores 

$produto1->Codigo = 4001;
$produto1->Descricao = 'CD - the Best of Eric Clapton';

$produto2->Codigo = 4002;
$produto2->Descricao = 'CD - the Eagles  Hotel California';

// chama o metodo imprimeEtiqueta();

$produto1->Imprimeetiqueta();
$produto2->Imprimeetiqueta();


?>
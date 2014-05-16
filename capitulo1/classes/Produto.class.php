<?php
class Produto
{
	var $Codigo;
	var $Descricao;
	var $Preco;
	var $Quantidade;
	
	function Imprimeetiqueta(){
		print 'Codigo:'.$this->Codigo."\n";
		print 'Descrição: '.$this->Descricao."\n";
	}
}
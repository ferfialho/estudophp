<?php

class ContaPoupanca extends Conta 
{
	var $Aniversario;
	
	
	/*metodo construtor (sobreescrito)
	 * 
	 * agora tbm inicializa a variavel $aniversario
	 * 
	 */
	
	function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo, $Aniversario){
		
		//chamada do metodo contrutor da classe-pai
		
		parent::__construct( $Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo);
		$this->Aniversario = $Aniversario;
	}
	
	/*
	 * metodo retirar (sobreescrito)
	 * 
	 * varifica se ha saldo para retiral tal quantia
	 */
	
	function Retirar ($valor){
		
		if ($this->Saldo >= $valor){
			parent::Retirar($valor);
		}else{
			echo "Retirada não permitida <br>";
			return false;
		}
		// retirada permitida
		return true;
	}
}
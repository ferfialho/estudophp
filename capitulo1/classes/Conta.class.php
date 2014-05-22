<?php
class Conta
{
	var $Agencia;
	var $Codigo;
	var $DataDeCriacao;
	var $Titular;
	var $Senha;
	var $Saldo;
	var $Cancelada;
	
	/*
	 * metodo Retirar
	 * 
	 * diminui o Saldo em $quantia
	 */
	
	function Retirar($quantia){
		if ($quantia > 0){
			$this->Saldo -=$quantia;
		}
	}
	
	/*
	 * metodo Depositar
	 * 
	 * aumenta o Saldo em $quantia
	 */
	
	function Depositar($quantia){
		if ($quantia > 0){
			$this->Saldo += $quantia;
		}
	}
	
	/*
	 * metodo ObterSaldo
	 * 
	 * retorna o saldo Atual
	 */
	
	function Obtersaldo(){
		return $this->Saldo;
	}
	
	/* metodo construtor
	 * inicializar propriedades
	*/
	 
	function  __construct( $Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo){
	
		$this->Codigo = $Codigo;
		$this->Agencia = $Agencia;
		$this->DataDeCriacao =$DataDeCriacao;
		$this->Titular = $Titular;
		$this->Senha = $Senha;
		
		// chamada de outro metodo da classe
		
		$this->Depositar($Saldo);
		$this->Cancelada = false;
	}
	
	/* metodo destrutor
	 *
	* finaliza objeto
	*/
	function __destruct(){
		echo "Objeto Conta{$this->Codigo} de  {$this->Titular->Nome}  finalizada...<br>";
	}
}


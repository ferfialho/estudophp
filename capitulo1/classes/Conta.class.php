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
}


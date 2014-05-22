<?php
class Pessoa
{
	var $Codigo;
	var $Nome;
	var $Altura;
	var $Idade;
	var $Nascimento;
	var $Escolaridade;
	var $Salario;
	
	/* Método Crescer
	 * 
	 * aumenta a altura em $centimetros 
	 */
	
	function Crescer($centimetros)
	{
		if ($centimetros >0){
			$this->Altura += $centimetros;
		}
	}
	
	/* metodo Formar
	 * 
	 * altera a Escolaridade para $titulacao
	 */
	
	function Formar($titulacao){
		$this->Escolaridade = $titulacao;
	}
	
	/*
	 * método Envelhecer
	 * 
	 * aumenta a idade em anos
	 */
	
	function Envelhecer($anos){
		if ($anos > 0){
			
			$this->Idade += $anos;
		}
	}
	
	/* metodo construtor 
	 * inicializar propriedades 
	 */
	  
	function  __construct( $Codigo, $Nome, $Altura, $Idade, $Nascimento, $Escolaridade,$Salario ){
		
		$this->Codigo = $Codigo;
		$this->Nome = $Nome;
		$this->Altura =$Altura;
		$this->Idade = $Idade;
		$this->Nascimento = $Nascimento;
		$this->Escolaridade = $Escolaridade;
		$this->Salario = $Salario;
	}
	
	/* metodo destrutor
	 * 
	 * finaliza objeto
	 */
	function __destruct(){
		echo "Objeto {$this->Nome}  finalizado...<br>";
	}
}
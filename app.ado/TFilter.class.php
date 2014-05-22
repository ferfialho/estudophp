<?php
/*
 * 
 * classe TFilter
 * 
 * Esta classe prove uma interface para definição de filtros de seleção
 */

class TFilter extends TExpression{
	private $variable;
	private $operador;
	private $value;
	
	
	/*
	 * metodo __construct
	 * 
	 *   instancia um novo filtro
	 *   
	 *   @param $variable = variavel
	 *   @param $operador = operador (>,<)
	 *   @param $value = valor a ser comparado
	 */
	
	public function __construct($variable, $operador, $value){
		
		//armazena as propriedades
		$this->variable = $variable;
		$this->operador = $operador;
		// trasforma o valor de acordo com certas regras
		// antes de atribuir á propriedade $this->value
		$this->value = $this->transform($value);
	}
	
	/*
	 * método transform()
	 * 
	 * recebe um valor e faz as modificaçoes necessarias
	 * para ele ser interpretado pelo banco de dados
	 * podendo ser um integer/string/boolean ou array.
	 * 
	 * @param $value = valor a ser transformado
	 * 
	 */
	
	private function transform($value){
		// caso seja um array
		if (is_array($value)){
			//percorre os valores 
			
			foreach ($value as $x){
				
				// se for um inteiro
				  
				  if (is_integer($x)){
				  	$foo[]=$x;
				  }elseif(is_string($x)){
				  	//se for string adiciona aspas
				  	$foo[]="'$x'";
				  }
			}
			
			//convert o array em string separada por ,
			$result = '('.implode(',',$foo).')';
		}elseif(is_string($value)){
				//adiciona aspas
				$result = "'$value'";
			}elseif(is_null($value)){
					// armazena null
					$result = 'NULL';
				}elseif(is_bool($value)){
			
						//armazena true ou false
						$result = $value ? 'TRUE' : 'FALSE';
					}else{
						$result = $value;
					}
		
					
	   return $result;		
		
	}
	
	/*
	 *metodo dump()
	 *
	 *   retorna o filtro em forma de expressão
	 */
	
	public function dump(){
		// concatena a expressão
		return "{$this->variable} {$this->operador} {$this->value}";
	}
}
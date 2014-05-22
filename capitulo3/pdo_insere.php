<?php
try{
//instancia objeto PDO, Conectando no postgresql

	$conn = new PDO("mysql:host=localhost;dbname=livro","root","");
	$conn->exec("INSERT INTO famosos (codigo,nome) VALUES (1, 'Érico Verissimo')");
	$conn->exec("INSERT INTO famosos (codigo,nome) VALUES (2, 'John lennon')");

	$conn = null;
   }catch (PDOException $e){
   	
   		//caso Ocorra uma exeção, exibe na tela 
   		
   			print "Erro!:".$e->getMessage()."<br>";
   			die();
   }
?>	
	
	
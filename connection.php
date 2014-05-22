<?php
/*
 * fun��o __autoload()
 * Carrega uma classe quando ela � necess�ria,
 * ou seja, quando ela � instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

// cria instru��o de SELECT
$sql = new TSqlSelect;

// define o nome da entidade
$sql->setEntity('famosos');

// acrescenta colunas � consulta
$sql->addColumn('codigo');
$sql->addColumn('nome');

// cria crit�rio de sele��o de dados
$criteria = new TCriteria;

// obt�m a pessoa de c�digo "1"
$criteria->add(new TFilter('codigo', '=', '1'));

// atribui o crit�rio de sele��o de dados
$sql->setCriteria($criteria);

try
{
    // abre conex�o com a base my_livro (mysql)
    $conn = TConnection::open('my_livro');
    
    // executa a instru��o SQL
    $result = $conn->query($sql->getInstruction());
    if ($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // exibe os dados resultantes
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
    // fecha a conex�o
    $conn = null;
}
catch (PDOException $e)
{
    // exibe a mensagem de erro
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}


?>
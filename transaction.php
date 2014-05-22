<?php
/*
 * fun��o __autoload()
 * carrega uma classe quando ela � necess�ria,
 * ou seja, quando ela � instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

try
{
    // abre uma transa��o
    TTransaction::open('my_livro');
    
    // cria uma instru��o de INSERT
    $sql = new TSqlInsert;
    
    // define o nome da entidade
    $sql->setEntity('famosos');
    
    // atribui o valor de cada coluna
    $sql->setRowData('codigo', 9);
    $sql->setRowData('nome', 'Galileu');
    
    // obt�m a conex�o ativa
    $conn = TTransaction::get();
    
    // executa a instru��o SQL
    $result = $conn->Query($sql->getInstruction());
    
    // cria uma instru��o de UPDATE
    $sql = new TSqlUpdate;
    
    // define o nome da entidade
    $sql->setEntity('famosos');
    
    // atribui o valor de cada coluna
    $sql->setRowData('nome', 'Galileu Galilei');
    
    // cria crit�rio de sele��o de dados
    $criteria = new TCriteria;
    
    // obt�m a pessoa de c�digo "8"
    $criteria->add(new TFilter('codigo', '=', '9'));
    
    // atribui o crit�rio de sele��o de dados
    $sql->setCriteria($criteria);
    
    // obt�m a conex�o ativa
    $conn = TTransaction::get();
    
    // executa a instru��o SQL
    $result = $conn->Query($sql->getInstruction());
    
    // fecha a transa��o, aplicando todas opera��es
    TTransaction::close();
}
catch (Exception $e)
{
    // exibe a mensagem de erro
    echo $e->getMessage();
    
    // desfaz opera��es realizadas durante a transa��o
    TTransaction::rollback();
}
?>
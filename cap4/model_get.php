<?php
/*
 * funcao __autoload()
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

/*
 * classe Aluno, filha de TRecord
 * persiste um Aluno no banco de dados
 */
class Aluno extends TRecord
{
    const TABLENAME = 'aluno';
}

/*
 * classe Curso, filha de TRecord
 * persiste um Curso no banco de dados
 */
class Curso extends TRecord
{
    const TABLENAME = 'curso';
}

// obt�m objetos do banco de dados
try
{
    // inicia transa��o com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log2.txt'));
    
    // exibe algumas mensagens na tela
    echo "obtendo alunos<br>\n";
    echo "==============<br>\n";
    
    // obt�m o aluno de ID 1
    $aluno= new Aluno(1);
    echo 'Nome     : ' . $aluno->nome     . "<br>\n";
    echo 'Endere�o : ' . $aluno->endereco . "<br>\n";
    
    // obt�m o aluno de ID 2
    $aluno= new Aluno(2);
    echo 'Nome     : ' . $aluno->nome     . "<br>\n";
    echo 'Endere�o : ' . $aluno->endereco . "<br>\n";
    
    // obt�m alguns cursos
    echo "<br>\n";
    echo "obtendo cursos<br>\n";
    echo "==============<br>\n";
    
    // obt�m o curso de ID 1
    $curso= new Curso(1);
    echo 'Curso : ' . $curso->descricao . "<br>\n";
    
    // obt�m o curso de ID 2
    $curso= new Curso(2);
    echo 'Curso : ' . $curso->descricao . "<br>\n";
    
    // finaliza a transa��o
    TTransaction::close();
}
catch (Exception $e) // em caso de exce��o
{
    // exibe a mensagem gerada pela exce��o
    echo '<b>Erro</b>' . $e->getMessage();
    
    // desfaz todas altera��es no banco de dados
    TTransaction::rollback();
}
?>
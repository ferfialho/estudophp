<?php
/*
 * classe TSqlInsert
 * Esta classe provê meios para manipulação de uma instrução de INSERT no banco de dados
 */
final class TSqlInsert extends TSqlInstruction
{
    protected  $columnValues;
    

    
    /*
     * método setCriteria()
     * não existe no contexto desta classe, logo, irá lançar um erro ser for executado
     */
    public function setCriteria($criteria)
    {
        // lança o erro
        throw new Exception("Cannot call setCriteria from " . __CLASS__);
    }
    
    /*
     * método getInstruction()
     * retorna a instrução de INSERT em forma de string.
     */
    public function getInstruction()
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        // monta uma string contendo os nomes de colunas
        $columns = implode(', ', array_keys($this->columnValues));
        // monta uma string contendo os valores
        $values = implode(', ', array_values($this->columnValues));
        $this->sql .= $columns . ')';
        $this->sql .= " values ({$values})";
        return $this->sql;
    }
}
?>

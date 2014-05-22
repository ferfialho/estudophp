<?php
/*
 * classe TSqlUpdate
 * Esta classe provê meios para manipulação de uma instrução de UPDATE no banco de dados
 */
final class TSqlUpdate extends TSqlInstruction
{
    protected  $columnValues;
    
   
    
    /*
     * método getInstruction()
     * retorna a instrução de UPDATE em forma de string.
     */
    public function getInstruction()
    {
        // monsta a string de UPDATE
        $this->sql = "UPDATE {$this->entity}";
        // monta os pares: coluna=valor,...
        if ($this->columnValues)
        {
            foreach ($this->columnValues as $column => $value)
            {
                $set[] = "{$column} = {$value}";
            }
        }
        $this->sql .= ' SET ' . implode(', ', $set);
        // retorna a cláusula WHERE do objeto $this->criteria
        if ($this->criteria)
        {
            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }
        return $this->sql;
    }
}
?>
<?php 

namespace App\Models\Abstracts;

use App\Models\Contracts\IModel;
use Exception;
use PDO;
use stdClass;

abstract class Model implements IModel
{
    /**
     * Query do recurso.
     *
     * @var string
     */
    protected string $query;

    /**
     * Conexão com o banco de dados.
     *
     * @var string
     */
    protected PDO $db;

    /**
     * Busca um registro no banco de dados.
     *
     * @param integer $id
     * @return void
     */
    public function get(int $id): stdClass
    {
        try {
            $this->query = "SELECT * FROM $this->table WHERE $this->primaryKey = ?";
            $stmt = $this->db->prepare($this->query);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return $e;
        }
    }

    /**
     * Retorna uma lista de registros.
     *
     * @return void
     */
    public function getAll(): array
    {
        try {
            $this->query = "SELECT * FROM $this->table";
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();


            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return $e;
        }
    }

    /**
     * Insere um novo registro no banco de dados.
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): int
    {
        $this->query = "INSERT INTO $this->table(";
        $this->query = $this->setColumnsOnQuery($this->query, $data);


        $stmt = $this->db->prepare($this->query);
        $stmt = $this->doBind($stmt, $data);

  
        $stmt->execute();
        
        return $this->db->lastInsertId();
    }

    /**
     * Altera um registro existente no banco de dados.
     *
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): bool
    {
        try {
            $query  = "UPDATE $this->table SET ";
            $query  = $this->setColumnsOnQuery($query, $data, false);
            $query .= " WHERE $this->primaryKey = ?";

            $stmt  = $this->db->prepare($query);

            $data[$this->primaryKey] = $id;

            $stmt = $this->doBind($stmt, $data);
            return $stmt->execute();

        } catch (\PDOException $e) {
            return $e;
        }
    }

    /**
     * Deleta um registro.
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        try {
            $this->query = "DELETE FROM $this->table WHERE $this->primaryKey = ?";
            $stmt = $this->db->prepare($this->query);
            $stmt->bindValue(1, $id);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            return $e;
        }
    }

    /**
     * Verifica se o índice existe em fillable.
     *
     * @param string $key
     * @return void
     */
    private function keyExistsOnFillable(string $key)
    {
      
    }

    /**
     * Remove o último caractere da query.
     *
     * @param string $query
     * @return string
     */
    private function removeLastChar(string $query): string
    {
        return substr($query,0,-1);
    }

    /**
     * Faz a setagem das colunas na query.
     *
     * @param string $query
     * @param array $data
     * @param boolean $create
     * @return string
     */
    private function setColumnsOnQuery(string $query, array $data, bool $create = true): string
    {
        foreach($data as $key => $value){
            $this->keyExistsOnFillable($key);

            if(!$create){
                $query .= "$key=?,";
            }else{
                $query .= "$key,";
            }
        }

        $query = $this->removeLastChar($query);

        if(!$create)
            return $query;
       
        $query .= ") VALUES (";

        for($i = 0; $i < count($data); $i++){
            $query .= "?,";
        } 

        $query = $this->removeLastChar($query);

        return $query .= ")";
    }

    /**
     * Seta a conexão com o banco na classe.
     *
     * @param PDO $db
     * @return void
     */
    public function setDB(PDO $db): void
    {
        $this->db = $db;
    }

    /**
     * Faz o bind dos dados no Statement.
     *
     * @param  $stmt
     * @param array $data
     * @return \PDOStatement
     */
    private function doBind(\PDOStatement $stmt, array $data): \PDOStatement
    {
        $i = 1;

        foreach($data as $key => $value){
            $stmt->bindValue($i, $value);

            $i++;
        }

        return $stmt;
    }
}
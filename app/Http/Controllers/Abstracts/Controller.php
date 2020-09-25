<?php 

namespace App\Http\Controllers\Abstracts;

abstract class Controller 
{
    /**
     * Conexão com o banco de dados.
     *
     * @var \PDO
     */
    protected \PDO $db;

    /**
     * Setagem da conexão com o banco de dados.
     *
     * @param \PDO $db
     * @return Controller
     */
    public function setDb(\PDO $db): Controller
    {
        $this->db = $db;

        return $this;
    }
}
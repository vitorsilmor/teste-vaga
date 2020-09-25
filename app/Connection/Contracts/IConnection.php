<?php 

namespace App\Connection\Contracts;

interface IConnection
{
    /**
     * Realiza a conexão com o banco de dados.
     *
     * @return \PDO
     */
    public function connect(): \PDO;
}
<?php 

namespace App\Connection;

use App\Connection\Contracts\IConnection;

class Connection implements IConnection
{
    /**
     * Endereço do host do banco.
     *
     * @var string
     */
    private string $host;

    /**
     * Nome do banco de dados.
     *
     * @var string
     */
    private string $dbName;

    /**
     * Nome do usuário do banco de dados.
     *
     * @var string
     */
    private string $user;

    /**
     * Senha do banco de dados.
     *
     * @var string
     */
    private string $password;

    public function __construct()
    {
        $this->host     = getenv("DB_HOST");
        $this->dbName   = getenv("DB_NAME");
        $this->user     = getenv("DB_USER");
        $this->password = getenv("DB_PASS");
    }

    /**
     * Realiza a conexão com o banco de dados.
     *
     * @return \PDO
     */
    public function connect(): \PDO
    {
        try{
			return new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->password);
		}catch(\PDOException $e){
			return $e->getMessage();
		}
    }
}
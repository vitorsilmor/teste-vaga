<?php 

namespace App\Models;

use App\Models\Abstracts\Model;
use stdClass;

class Usuario extends Model
{
    /**
     * Nome da tabela.
     *
     * @var string
     */
    protected string $table = 'usuarios';

    /**
     * Nome da chave primária.
     *
     * @var string
     */
    protected string $primaryKey = "USUARIO_ID";

    /**
     * Array com as colunas da tabela.
     *
     * @var array
     */
    protected array $fillable = ['USUARIO_ID', 'LOGIN', 'SENHA', 'ATIVO', 'NOME_COMPLETO'];

    /**
     * Verifica se existe um usuário com as credenciais
     * informadas.
     *
     * @param string $user
     * @param string $pass
     * @return ?stdClass
     */
    public function checkLogin(string $user, string $pass): ?stdClass
    {
        $this->query = "SELECT * FROM $this->table WHERE LOGIN = ? AND SENHA = ? AND ATIVO = 'S'";

        $stmt = $this->db->prepare($this->query);
        $stmt->bindValue(1, $user);
        $stmt->bindValue(2, $pass);
        $stmt->execute();
        
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if(!$user)
            throw new \Exception("Dados incorretos ou usuário não existe. Tente novamente");
            
        return  $user;
    }


    /**
     * Encontra registros pelo nome.
     *
     * @param string $name
     * @return array|null
     */
    public function findByName(string $name): ?array 
    {
        $this->query = "SELECT * FROM $this->table WHERE NOME_COMPLETO LIKE ?";

        $stmt = $this->db->prepare($this->query);
        $stmt->bindValue(1, "%" . $name . "%");
        $stmt->execute();
        
        $users = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return  $users;
    }
}
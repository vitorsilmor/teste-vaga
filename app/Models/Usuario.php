<?php 

namespace App\Models;

use App\Models\Abstracts\Model;

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

}
<?php 

namespace App\Models\Contracts;

use PDO;

interface IModel
{
    /**
     * Busca um registro no banco de dados.
     *
     * @param integer $id
     * @return void
     */
    public function get(int $id);

    /**
     * Retorna uma lista de registros.
     *
     * @return void
     */
    public function getAll();

    /**
     * Insere um novo registro no banco de dados.
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): int;

    /**
     * Altera um registro existente no banco de dados.
     *
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): bool;

    /**
     * Deleta um registro.
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool;  

    /**
     * Seta a conexão com o banco na classe.
     *
     * @param PDO $db
     * @return void
     */
    public function setDB(PDO $db): void;
}
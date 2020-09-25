<?php 

namespace App\Http\Controllers\Abstracts;

use App\Models\Abstracts\Model;

abstract class Controller 
{
    /**
     * Model principal do controller.
     *
     * @var Model
     */
    protected Model $model;

    /**
     * Setagem da conexão com o banco de dados.
     *
     * @param Model $model
     * @return Controller
     */
    public function setModel(Model $model): Controller
    {
        $this->model = $model;

        return $this;
    }
}
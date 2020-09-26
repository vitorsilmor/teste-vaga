<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\Controller;
use App\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $data['usuarios'] = $this->model->getAll();
        
        view('usuarios.index', $data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show(Request $request, int $id)
    {
        var_dump($this->model->get($id));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function edit()
    {

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function update()
    {

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function store()
    {

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function delete()
    {

    }
}

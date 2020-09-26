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
    public function store(Request $request)
    {
        try {
            $dados = (array) $request->data;
            $id = $this->model->create($dados);

            return redirect('/usuarios?newUser=' . $id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        
    }

    /**
     * Deleta um usuário.
     *
     * @return void
     */
    public function delete(Request $request)
    {
        try {
            $id = $request->data->USUARIO_ID;
            $this->model->delete($id);

            return redirect('/usuarios?userDeleted=' . $id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

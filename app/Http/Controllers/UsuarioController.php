<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\Controller;
use App\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Mostra a lista de registros.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $data['usuarios'] = $this->model->getAll();
        
        view('usuarios.index', $data);
    }

    /**
     * Mostra um registro.
     *
     * @return void
     */
    public function show(Request $request, int $id)
    {
        try {
            $data['usuario'] = $this->model->get($id);

            view('usuarios.show', $data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Atualiza um registro.
     *
     * @return void
     */
    public function update(Request $request, int $id)
    {
        try {
            $data = (array) $request->data;
            $this->model->update($id, $data);

            return redirect('/usuarios/' . $id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    /**
     * Cria um novo registro.
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
     * Deleta um registro.
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

    public function search(Request $request)
    {
        try {
            $data['usuarios'] = $this->model->findByName($request->data->nome);

            view('usuarios.search', $data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

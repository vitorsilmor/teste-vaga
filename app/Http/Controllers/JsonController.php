<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\Controller;
use App\Http\Request;

class JsonController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $data['usuarios'] = $this->model->getAll();
        $data['logado']   = "Você está logado como " . $_SESSION['NOME_COMPLETO'];

        echo json_encode($data);
    }
}

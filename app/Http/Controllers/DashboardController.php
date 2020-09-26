<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\Controller;
use App\Http\Request;

class DashboardController extends Controller
{
    /**
     * Exibe uma view para o usuário fazer login.
     *
     * @return void
     */
    public function login(Request $request)
    {
        view('dashboard.login');
    }

    /**
     * Rota que executa o login.
     *
     * @return void
     */
    public function doLogin(Request $request)
    {
        try {
            session_start();

            $usuario = $this->model->checkLogin(
                $request->data->user,
                $request->data->pass
            );
    
          
            if(isset($usuario->USUARIO_ID)){
                $_SESSION['USUARIO_ID']    = $usuario->USUARIO_ID;
                $_SESSION['NOME_COMPLETO'] = $usuario->NOME_COMPLETO;
                $_SESSION['LOGIN']         = $usuario->LOGIN;
    
                return redirect('/usuarios');
            }
        } catch (\Throwable $th) {
            redirect("/?error=true");
        }
        
    }

    /**
     * Rota que executa o logout.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        session_start();
        session_destroy();

        redirect();
    }
}

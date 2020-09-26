<?php 

namespace App\Http\Middlewares;

final class LoginMiddleware
{
    /**
     * Verifica se o usuário está logado.
     *
     * @return boolean
     */
    public function handle(): bool
    {
        session_start();
        
        if(!isset($_SESSION['USUARIO_ID']))
            redirect('/?needLogin=true');

        return true;
    }
}
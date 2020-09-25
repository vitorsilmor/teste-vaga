<?php 

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
            return false;

        return true;
    }
}
<?php 

namespace App\Views;

class UsuarioView
{
    public function render(string $path, $data = null)
    {
        $path = str_replace(".", "/", $path);
        include "../resources/" . $path . ".php";
    }
}
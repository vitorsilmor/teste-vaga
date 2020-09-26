<?php

include __DIR__ . "/../../config/env.php";

use App\Connection\Connection;
use App\Models\Usuario;
use PHPUnit\Framework\TestCase;

final class ModelTest extends TestCase
{
    /**
     * Model de Usuário.
     *
     * @var Usuario
     */
    protected Usuario $usuarioModel;

    public function __construct()
    {
        parent::__construct();

        $this->usuarioModel = new Usuario;
        $conn = new Connection();
        $db  = $conn->connect();
        $this->usuarioModel->setDb($db);
    }

    public function testGet(): void
    {
        $usuario = $this->usuarioModel->get(5);

        $this->assertEquals(5, $usuario->USUARIO_ID);
    }

    public function testGetAll(): void
    {
        $numeroUsuarios = count($this->usuarioModel->getAll());
        
        $this->usuarioModel->create([
            'LOGIN'     => "vitor.morais", 
            'SENHA'     => "123456", 
            'ATIVO'     => 1, 
            'NOME_COMPLETO' => "Vitor Silva Morais"
        ]);


        $novoNumeroUsuarios = count($this->usuarioModel->getAll());

        $this->assertEquals($numeroUsuarios +1, $novoNumeroUsuarios);
    }

    public function testCreate(): void
    {
        $retorno = $this->usuarioModel->create([
            'LOGIN'     => "vitor.morais", 
            'SENHA'     => "123456", 
            'ATIVO'     => 1, 
            'NOME_COMPLETO' => "Vitor Silva Morais"
        ]);

        $this->assertIsInt(1, $retorno);
    }

    public function testUpdate(): void
    {
        $retorno = $this->usuarioModel->update(1, [
            'LOGIN'     => "vitor.morais2", 
            'SENHA'     => "123456", 
            'ATIVO'     => 1, 
            'NOME_COMPLETO' => "Vitor Silva Morais"
        ]);

        $this->assertTrue($retorno);
    }

    public function testDelete(): void
    {
        $retorno = $this->usuarioModel->create([
            'LOGIN'     => "vitor.morais", 
            'SENHA'     => "123456", 
            'ATIVO'     => 1, 
            'NOME_COMPLETO' => "Vitor Silva Morais"
        ]);

        $this->assertIsInt($retorno);

        $deletado = $this->usuarioModel->delete($retorno);

        $this->assertTrue($deletado);
    }
}

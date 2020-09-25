<?php 

namespace App\Http;

use stdClass;

/**
 * Esta classe é responsável por armazenar dados importantes
 * da requisição.
 */
class Request 
{
    /**
     * URI da requisição.
     *
     * @var string
     */
    protected string $uri;

    /**
     * Método da requisição.
     *
     * @var string
     */
    protected string $method;

    /**
     * Dados da requisição.
     *
     * @var stdClass
     */
    public stdClass $data;

    /**
     * Seta os dados transformando-os em um objeto stdClass.
     *
     * @param array $data
     * @return Request
     */
    public function setData(?array $data = null): Request
    {
        $this->data = (object) $data;

        return $this;
    }

    /**
     * Seta o método da requisição.
     *
     * @param string $method
     * @return Request
     */
    public function setMethod(string $method): Request
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Seta a uri da requisição.
     *
     * @param string $uri
     * @return Request
     */
    public function setUri(string $uri): Request
    {
        $this->uri = $uri;

        return $this;
    }

    public function getMethod(): string 
    {
        return strtolower($this->method);
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
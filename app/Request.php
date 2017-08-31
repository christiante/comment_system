<?php

class Request
{
    /**
     * @var
     */
    private $parameters;

    /**
     * Request constructor.
     * @param $parameters
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function parameterExist($name)
    {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

    /**
     * @param $name
     * @return mixed
     *
     * @throws Exception
     */
    public function getParameter($name)
    {
        if ($this->parameterExist($name)) {
            return $this->parameters[$name];
        }
        else
            throw new Exception("Parameter '$name' is missing");
    }
}
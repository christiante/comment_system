<?php

require_once 'Request.php';
require_once 'View/View.php';

/**
 * Class Router
 */
class Router
{
    const CONTROLLER_PARAM_NAME = "controller";

    /**
     *
     */
    public function routeRequest()
    {
        try {
            $request = new Request(array_merge($_GET, $_POST));
            $controller = $this->creerControleur($request);
            $action = $this->creerAction($request);
            $controller->executerAction($action);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return mixed|string
     * @throws Exception
     */
    private function creerControleur(Request $request)
    {
        $controller = "Post";
        if ($request->parameterExist($this::CONTROLLER_PARAM_NAME)) {
            $controller = $request->getParameter($this::CONTROLLER_PARAM_NAME);
            $controller = ucfirst(strtolower($controller));
        }

        $classController = $controller."Controller";
        $controllerFile = "Controller/" . $classController . ".php";
        if (file_exists($controllerFile)) {
            require($controllerFile);
            $controller = new $classController();
            $controller->setRequete($request);
            return $controller;
        } else {
            throw new Exception("Fichier '$controllerFile' introuvable");
        }
    }

    /**
     * @param Request $request
     * @return mixed|string
     * @throws Exception
     */
    private function creerAction(Request $request)
    {
        $action = "show";
        if ($request->parameterExist('action')) {
            $action = $request->getParameter('action');
        }

        return $action;
    }
}
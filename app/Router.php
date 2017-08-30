<?php

require_once 'Request.php';
require_once 'View/View.php';

class Router
{
    const CONTROLLER_PARAM_NAME = "controller";

    // Route une requête entrante : exécute l'action associée
    public function routeRequest()
    {
        try {
            // Fusion des paramètres GET et POST de la requête
            $request = new Request(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($request);
            $action = $this->creerAction($request);

            $controleur->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerControleur(Request $request)
    {
        $controleur = "Post";  // Contrôleur par défaut
        if ($request->parameterExist($this::CONTROLLER_PARAM_NAME)) {
            $controleur = $request->getParameter($this::CONTROLLER_PARAM_NAME);
            // Première lettre en majuscule
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        $classController = $controleur."Controller";
        $fichierControleur = "Controller/" . $classController . ".php";
        if (file_exists($fichierControleur)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierControleur);
            $controleur = new $classController();
            $controleur->setRequete($request);
            return $controleur;
        }
        else
            throw new Exception("Fichier '$fichierControleur' introuvable");
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction(Request $request)
    {
        $action = "index";  // Action par défaut
        if ($request->parameterExist('action')) {
            $action = $request->getParameter('action');
        }

        return $action;
    }

    // Gère une erreur d'exécution (exception)
    private function gererErreur(Exception $exception)
    {
        $vue = new View('erreur');
        $vue->generate(array('msgErreur' => $exception->getMessage()));
    }
}
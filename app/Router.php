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
            $requete = new Request(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);

            $controleur->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerControleur(Request $requete) {
        $controleur = "Post";  // Contrôleur par défaut
        if ($requete->parameterExist($this::CONTROLLER_PARAM_NAME)) {
            $controleur = $requete->getParameter($this::CONTROLLER_PARAM_NAME);
            // Première lettre en majuscule
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        $classeControleur = $controleur."Controller";
        $fichierControleur = "Controller/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierControleur);
            $controleur = new PostController();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else
            throw new Exception("Fichier '$fichierControleur' introuvable");
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction(Request $requete)
    {
        $action = "index";  // Action par défaut
        if ($requete->parameterExist('action')) {
            $action = $requete->getParameter('action');
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
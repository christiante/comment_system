<?php

require_once 'app/Request.php';
require_once 'View/View.php';

abstract class Controller
{

    // Action à réaliser
    private $action;

    // Requête entrante
    protected $request;

    // Définit la requête entrante
    public function setRequete(Request $request)
    {
        $this->request = $request;
    }

    // Exécute l'action à réaliser
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }

    // Méthode abstraite correspondant à l'action par défaut
    // Oblige les classes dérivées à implémenter cette action par défaut
    public abstract function index();

    // Génère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array())
    {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controller", "", $classeControleur);
        // Instanciation et génération de la vue
        $vue = new View($this->action, $controleur);
        $vue->generate($donneesVue);
    }
}
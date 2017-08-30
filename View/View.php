<?php

class View
{
    // Nom du fichier associé à la vue
    private $fichier;
    // Titre de la vue (défini dans le fichier vue)
    private $titre;

    public function __construct($action, $controller = "")
    {
        // Détermination du nom du fichier vue à partir de l'action
        //$this->fichier = "View/" . $action . ".php";
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        $fichier = "View/";
        if ($controller != "") {
            $fichier = $fichier . $controller . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }

    // Génère et affiche la vue
    public function generate($data)
    {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->fichier, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->generateFile('View/layout.php',
            array('titre' => $this->titre, 'contenu' => $content));
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($fichier, $data)
    {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $data accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}
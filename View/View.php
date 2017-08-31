<?php

/**
 * Class View
 */
class View
{
    /**
     * @var string
     */
    private $fichier;

    /**
     * @var
     */
    private $titre;

    /**
     * @param $action
     * @param string $controller
     */
    public function __construct($action, $controller = "")
    {
        $fichier = "View/";
        if ($controller != "") {
            $fichier = $fichier . $controller . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }

    /**
     * @param $data
     * @throws Exception
     */
    public function generate($data)
    {
        $content = $this->generateFile($this->fichier, $data);
        $view = $this->generateFile('View/layout.php',
            array('titre' => $this->titre, 'contenu' => $content));
        echo $view;
    }

    /**
     * @param $fichier
     * @param $data
     * @return string
     * @throws Exception
     */
    private function generateFile($fichier, $data)
    {
        if (file_exists($fichier)) {
            extract($data);
            ob_start();
            require $fichier;
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}
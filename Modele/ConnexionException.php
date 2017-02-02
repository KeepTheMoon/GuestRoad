<?php
/**
 * Class ConnexionException
 */
/**
 * Exception levée lorsque il est impossible de se connecter à la base de donnée
 * @author baptiste
 * @package modele
 */
class ConnexionException extends Exception{
    /**
     * La chaine de l'execption
     * @var string
     */
    private $chaine;
    /**
     * Son constructeur
     * @param string $chaine
     */
    public function __construct($chaine){
        $this->chaine=$chaine;
    }
    /**
     * Affiche l'érreur
     * @return string
     */
    public function afficher(){
        return $this->chaine;
    }

}

?>
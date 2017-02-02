<?php
/**
 * Class TableAccesException
 */
/**
 * Exception levée lorsqu'il y a un problème d'accès à la table
 * @author baptiste
 * @package modele
 */
class TableAccesException extends Exception {
    /**
     * La chaine de l'exception
     * @var string
     */
    private $chaine;
    /**
     * son constructeur
     * @param string $chaine
     */
    public function __construct($chaine){
        $this->chaine=$chaine;
    }
    /**
     * affiche le message
     * @return string
     */
    public function afficher(){
        return $this->chaine;
    }

}

?>
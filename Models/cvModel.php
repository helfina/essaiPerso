<?php


namespace App\Models;


class cvModel extends Model
{
    protected $id;
    protected $titre;
    protected $description;
    protected $annee;
    protected $duree;
    protected $nom_entreprise;
    protected $ecole;

    public function __construct()
    {
        $this->table = 'cv';
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of annee
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of $duree
     */
    public function getDuree():int
    {
        return $this->duree;
    }

    /**
     * Set the value of $duree
     *
     * @return  self
     */
    public function setDuree(int $duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of nom_entreprise
     */
    public function getNom_entreprise():int
    {
        return $this->nom_entreprise;
    }

    /**
     * Set the value of nom_entreprise
     *
     * @return  self
     */
    public function setNom_entreprise($nom_entreprise)
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }
    /**
     * Get the value of ecole
     */
    public function getEcole():int
    {
        return $this->ecole;
    }

    /**
     * Set the value of ecole
     *
     * @return  self
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }

}
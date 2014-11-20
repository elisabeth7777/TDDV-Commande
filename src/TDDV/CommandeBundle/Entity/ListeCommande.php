<?php

namespace TDDV\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeCommande
 *
 * @ORM\Table(name="tddv_listecommande")
 * @ORM\Entity(repositoryClass="TDDV\CommandeBundle\Entity\ListeCommandeRepository")
 */
class ListeCommande
{
   /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="TDDV\CommandeBundle\Entity\Commande")
   */
  private $commande;
 
  /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="TDDV\CommandeBundle\Entity\Predication")
   */
  private $predication;


    /**
     * @var integer
     *
     * @ORM\Column(name="Quantite", type="integer")
     */
    private $quantite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Imprime", type="boolean")
     */
    private $imprime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Grave", type="boolean")
     */
    private $grave;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return ListeCommande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Set imprime
     *
     * @param boolean $imprime
     * @return ListeCommande
     */
    public function setImprime($imprime)
    {
        $this->imprime = $imprime;
    
        return $this;
    }

    /**
     * Get imprime
     *
     * @return boolean 
     */
    public function getImprime()
    {
        return $this->imprime;
    }

    /**
     * Set grave
     *
     * @param boolean $grave
     * @return ListeCommande
     */
    public function setGrave($grave)
    {
        $this->grave = $grave;
    
        return $this;
    }

    /**
     * Get grave
     *
     * @return boolean 
     */
    public function getGrave()
    {
        return $this->grave;
    }

    /**
     * Set commande
     *
     * @param \TDDV\CommandeBundle\Entity\Commande $commande
     * @return ListeCommande
     */
    public function setCommande(\TDDV\CommandeBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;
    
        return $this;
    }

    /**
     * Get commande
     *
     * @return \TDDV\CommandeBundle\Entity\Commande 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set predication
     *
     * @param \TDDV\CommandeBundle\Entity\Predication $predication
     * @return ListeCommande
     */
    public function setPredication(\TDDV\CommandeBundle\Entity\Predication $predication)
    {
        $this->predication = $predication;
    
        return $this;
    }

    /**
     * Get predication
     *
     * @return \TDDV\CommandeBundle\Entity\Predication 
     */
    public function getPredication()
    {
        return $this->predication;
    }
}
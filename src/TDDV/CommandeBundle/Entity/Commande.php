<?php
    /**
     * Add commandeproduits
     *
     * @param \TDDV\CommandeBundle\Entity\CommandeProduit $commandeproduits
     * @return Commande
     */
    public function addCommandeproduit(\TDDV\CommandeBundle\Entity\CommandeProduit $commandeproduits)
    {
        $this->commandeproduits[] = $commandeproduits;
    
        return $this;
    }

    /**
     * Remove commandeproduits
     *
     * @param \TDDV\CommandeBundle\Entity\CommandeProduit $commandeproduits
     */
    public function removeCommandeproduit(\TDDV\CommandeBundle\Entity\CommandeProduit $commandeproduits)
    {
        $this->commandeproduits->removeElement($commandeproduits);
    }

    /**
     * Get commandeproduits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommandeproduits()
    {
        return $this->commandeproduits;
    }
}
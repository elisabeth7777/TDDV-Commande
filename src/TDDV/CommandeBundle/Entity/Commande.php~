<?phpnamespace TDDV\CommandeBundle\Entity;use Doctrine\ORM\Mapping as ORM;/** * Commande * * @ORM\Table(name="tddv_commande") * @ORM\Entity(repositoryClass="TDDV\CommandeBundle\Entity\CommandeRepository") */class Commande{    /**     * @var integer     *     * @ORM\Column(name="id", type="integer")     * @ORM\Id     * @ORM\GeneratedValue(strategy="AUTO")     */    private $id;        /**     * @var \DateTime     *     * @ORM\Column(name="Date", type="date")     */    private $date;        /**     * @ORM\OneToOne(targetEntity="TDDV\CommandeBundle\Entity\Client", cascade={"persist"})     * @ORM\JoinColumn(nullable=false)     */    private $client;        /**     * @var float     *     * @ORM\Column(name="Total", type="decimal")     */    private $total;    /**     * @var boolean     *     * @ORM\Column(name="Fait", type="boolean")     */    private $fait;    /**     * @var boolean     *     * @ORM\Column(name="Livre", type="boolean")     */    private $livre;  /**   * @ORM\OneToMany(targetEntity="TDDV\CommandeBundle\Entity\CommandeProduit", mappedBy="commande")   */  private $commandeproduits;    function __construct() {                $this->date = new \Datetime(); //date du jour pour la commande    }    /**     * Get id     *     * @return integer      */    public function getId()    {        return $this->id;    }         /**     * Get date     *     * @return \DateTime      */       public function getDate() {        return $this->date;    }        /**     * Set date     *     * @param \DateTime $date     * @return Commande     */    public function setDate($date) {        $this->date = $date;    }        /**     * Set total     *     * @param float $total     * @return Commande     */    public function setTotal($total)    {        $this->total = $total;            return $this;    }    /**     * Get total     *     * @return float      */    public function getTotal()    {        return $this->total;    }    /**     * Set fait     *     * @param boolean $fait     * @return Commande     */    public function setFait($fait)    {        $this->fait = $fait;            return $this;    }    /**     * Get fait     *     * @return boolean      */    public function getFait()    {        return $this->fait;    }    /**     * Set livre     *     * @param boolean $livre     * @return Commande     */    public function setLivre($livre)    {        $this->livre = $livre;            return $this;    }    /**     * Get livre     *     * @return boolean      */    public function getLivre()    {        return $this->livre;    }    /**     * Set client     *     * @param \TDDV\CommandeBundle\Entity\Client $client     * @return Commande     */    public function setClient(\TDDV\CommandeBundle\Entity\Client $client = null)    {        $this->client = $client;            return $this;    }    /**     * Get client     *     * @return \TDDV\CommandeBundle\Entity      */    public function getClient()    {        return $this->client;    }
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
<?phpnamespace TDDV\CommandeBundle\Entity;use Doctrine\ORM\Mapping as ORM;/** * CoffretMessage * * @ORM\Table(name="tddv_coffret_message") * @ORM\Entity(repositoryClass="TDDV\CommandeBundle\Entity\CoffretMessageRepository") */class CoffretMessage{  /**    * @ORM\Id    * @ORM\ManyToOne(targetEntity="TDDV\CommandeBundle\Entity\Coffret", inversedBy="coffretMessages")    */  private $coffret;   /**    * @ORM\Id    * @ORM\OneToOne(targetEntity="TDDV\CommandeBundle\Entity\Message")    */  private $message;    /**     * @var boolean     *     * @ORM\Column(name="Imprime", type="boolean")     */    private $imprime;    /**     * @var boolean     *     * @ORM\Column(name="Grave", type="boolean")     */    private $grave;    function __construct() {        $this->imprime = false;        $this->grave = false;    }        /**     * Set imprime     *     * @param boolean $imprime     * @return CoffretMessage     */    public function setImprime($imprime)    {        $this->imprime = $imprime;            return $this;    }    /**     * Get imprime     *     * @return boolean      */    public function getImprime()    {        return $this->imprime;    }    /**     * Set grave     *     * @param boolean $grave     * @return CoffretMessage     */    public function setGrave($grave)    {        $this->grave = $grave;            return $this;    }    /**     * Get grave     *     * @return boolean      */    public function getGrave()    {        return $this->grave;    }    /**     * Set coffret     *     * @param \TDDV\CommandeBundle\Entity\Coffret $coffret     * @return CoffretMessage     */    public function setCoffret(\TDDV\CommandeBundle\Entity\Coffret $coffret)    {        $coffret->addCoffretmessage($this);        $this->coffret = $coffret;            return $this;    }    /**     * Get coffret     *     * @return \TDDV\CommandeBundle\Entity\Coffret      */    public function getCoffret()    {        return $this->coffret;    }    /**     * Set message     *     * @param \TDDV\CommandeBundle\Entity\Message $message     * @return CoffretMessage     */    public function setMessage(\TDDV\CommandeBundle\Entity\Message $message)    {        $this->message = $message;            return $this;    }    /**     * Get message     *     * @return \TDDV\CommandeBundle\Entity\Message      */    public function getMessage()    {        return $this->message;    }        public function __toString() {        return "CoffretMessage";    }}
<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 06/05/2017
 * Time: 02:42
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="noteclient")
 */
class NoteClient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    function __construct()
    {
        $this->createdAt = new \DateTime("now");
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tache")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tache;

    /**
     * @return mixed
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * @param mixed $tache
     */
    public function setTache(Tache $tache)
    {
        $this->tache = $tache;
    }
    /**
     * @ORM\Column(type="string")
     */private $note;

    /**
     * @ORM\Column(type="string")
     */
    private $gentillesse;
    /**
     * @ORM\Column(type="string")
     */
    private $serieux;
    /**
     * @ORM\Column(type="integer")
     */
    private $efficacite;
    /**
     * @ORM\Column(type="boolean")
     */
    private $isResolved;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employer",inversedBy="notesClients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer;

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getGentillesse()
    {
        return $this->gentillesse;
    }

    /**
     * @param mixed $gentillesse
     */
    public function setGentillesse($gentillesse)
    {
        $this->gentillesse = $gentillesse;
    }

    /**
     * @return mixed
     */
    public function getSerieux()
    {
        return $this->serieux;
    }

    /**
     * @param mixed $serieux
     */
    public function setSerieux($serieux)
    {
        $this->serieux = $serieux;
    }

    /**
     * @return mixed
     */
    public function getEfficacite()
    {
        return $this->efficacite;
    }

    /**
     * @param mixed $efficacite
     */
    public function setEfficacite($efficacite)
    {
        $this->efficacite = $efficacite;
    }

    /**
     * @return mixed
     */
    public function getIsResolved()
    {
        return $this->isResolved;
    }

    /**
     * @param mixed $isResolved
     */
    public function setIsResolved($isResolved)
    {
        $this->isResolved = $isResolved;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * @param mixed $employer
     */
    public function setEmployer(Employer $employer)
    {
        $this->employer = $employer;
    }
}
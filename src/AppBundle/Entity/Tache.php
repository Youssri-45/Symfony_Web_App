<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 06/05/2017
 * Time: 02:45
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="tache")
 */
class Tache
{
    public function __construct()
    {
        $this->description= '';
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
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @ORM\Column(type="boolean")
     */
    private $isNoted = false;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\NoteClient")
     */
    private  $note;

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
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return mixed
     */
    public function getIsNoted()
    {
        return $this->isNoted;
    }

    /**
     * @param mixed $isNoted
     */
    public function setIsNoted($isNoted)
    {
        $this->isNoted = $isNoted;
    }
//    /**
//     * @ORM\Column(type="string")
//     */
    private $numTelClient;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    /**
     * @ORM\Column(type="string")
     */private $nomTache;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @ORM\Column(type="boolean",nullable=true)
     */private $isResolved;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */private $isDone;

    /**
     * @ORM\Column(type="datetime")
     */

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employer",inversedBy="taches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client",inversedBy="taches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

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
    public function getNomTache()
    {
        return $this->nomTache;
    }

    /**
     * @param mixed $nomTache
     */
    public function setNomTache($nomTache)
    {
        $this->nomTache = $nomTache;
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
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * @param mixed $isDone
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;
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

    /**
     * @return mixed
     */
    public function getNumTelClient()
    {
        return $this->numTelClient;
    }

    /**
     * @param mixed $numTelClient
     */
    public function setNumTelClient($numTelClient)
    {
        $this->numTelClient = $numTelClient;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }







}
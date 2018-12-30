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
 * @ORM\Table(name="noteemployer")
 */
class NoteEmployer
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
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employer",inversedBy="notesEmployer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer_note;

    /**
     * @return mixed
     */
    public function getEmployernote()
    {
        return $this->employer_note;
    }

    /**
     * @param mixed $employer_note
     */
    public function setEmployernote(Employer $employer_note)
    {
        $this->employer_note = $employer_note;
    }

    /**
     * @return mixed
     */
    public function getEmployerNotant()
    {
        return $this->employer_notant;
    }

    /**
     * @param mixed $employer_notant
     */
    public function setEmployerNotant(Employer $employer_notant)
    {
        $this->employer_notant = $employer_notant;
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer_notant;

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






}
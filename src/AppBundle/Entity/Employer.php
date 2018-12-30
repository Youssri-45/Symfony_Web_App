<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 06/05/2017
 * Time: 02:34
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="employer")
 */
class Employer extends User implements UserInterface
{

    /**
     * @return mixed
     */
    public function getGentillesseTotale()
    {
        $notesclient = $this->getNotesClients();
        $notesemployer = $this->getNotesEmployer();
        $gentillesse = 0;
        $n = 0;
        foreach ($notesclient as $note) {
            $n = $n + 1;
            $gentillesse = $gentillesse + $note->getGentillesse();
        }
        foreach ($notesemployer as $note) {
            $n = $n + 1;
            $gentillesse = $gentillesse + $note->getGentillesse();
        }
        if ($n != 0)
        return ($gentillesse / $n);
        else return 0;
    }

    /**
     * @return mixed
     */
    public function getSerieuxTotale()
    {
        $notesclient = $this->getNotesClients();
        $notesemployer = $this->getNotesEmployer();
        $serieux = 0;
        $n = 0;
        foreach ($notesclient as $note) {
            $n = $n + 1;
            $serieux = $serieux + $note->getSerieux();
        }
        foreach ($notesemployer as $note) {
            $n = $n + 1;
            $serieux = $serieux + $note->getSerieux();
        }
        if ($n != 0)
        return ($serieux / $n);
        else return 0;
    }

    /**
     * @return mixed
     */
    public function getEfficaciteTotale()
    {
        $notesclient = $this->getNotesClients();
        $notesemployer = $this->getNotesEmployer();
        $efficacite = 0;
        $n = 0;
        foreach ($notesclient as $note) {
            $n = $n + 1;
            $efficacite = $efficacite + $note->getEfficacite();
        }
        foreach ($notesemployer as $note) {
            $n = $n + 1;
            $efficacite = $efficacite + $note->getEfficacite();
        }
        if ($n != 0)
        return ($efficacite / $n);
        else return 0;
    }

    /**
     * @return mixed
     */
    public function getNoteTotale()
    {

        $notesclient = $this->getNotesClients();
        $notesemployer = $this->getNotesEmployer();
        $noteTotale = 0;
        $n = 0;
        foreach ($notesclient as $note) {
            $n = $n + 1;
            $noteTotale = $noteTotale + $note->getNote();
        }
        foreach ($notesemployer as $note) {
            $n = $n + 1;
            $noteTotale = $noteTotale + $note->getNote();
        }
        if ($n != 0)
        $noteClientEmployer = $noteTotale / $n;
        else
            $noteClientEmployer = 0;


        if ( $this->getAssiduite() != null)
        $noteClientEmployerAdmin = ($noteClientEmployer +$this->getAssiduite()) / 2 ;
        else $noteClientEmployerAdmin = $noteClientEmployer;



        if ($this->getNbTachesNonResolu() != 0)
        $noteTache = ( $this->getNbTacheResolu() / $this->getNbTache() ) * 5;
        else $noteTache = 0;


        $noteExperience = $this->getNoteExperience();



        if ( $noteTache == 0 && $noteExperience == 0 && $this->getAssiduite() == null){
            return $noteClientEmployer;
        }
        if ($noteTache == 0 && $noteExperience == 0 && $this->getAssiduite() != null && $noteClientEmployer == 0){
            return $this->getAssiduite();
        }
        if ($noteTache == 0 && $noteExperience == 0 && $this->getAssiduite() != null){
            return $noteClientEmployerAdmin;
        }
        if ($noteTache == 0 && $noteExperience != 0 && $this->getAssiduite() != null){
            return ((($noteClientEmployerAdmin * 2)+$noteExperience) / 3 ) ;
        }
        if ($noteTache != 0 && $noteExperience != 0 && $this->getAssiduite() != null){
            return (( ($noteClientEmployerAdmin*2) + $noteExperience +($noteTache*2) ) / 5 );
        }
        if ($noteTache != 0 && $noteExperience != 0 && $this->getAssiduite() == null){
            return (( ($noteClientEmployer*2) + $noteExperience +($noteTache*2) ) / 5 );
        }
        if ($noteTache != 0 && $noteExperience == 0 && $this->getAssiduite() != null){
            return (( ($noteClientEmployerAdmin*2) +($noteTache*2) ) / 4 );
        }



    }
    /**
     * @return mixed
     */
    public function getNoteExperience(){

        $dateEmbauche = $this->getDateEmbauche();
        $dateActuelle = (new \DateTime('now'));
        $experience = $dateEmbauche->diff($dateActuelle)->m;
        $dateDebutTravailleSociete = (new \DateTime('2017-02-01'));
        $dureTravailleSociete = $dateDebutTravailleSociete->diff($dateActuelle)->m;
        if ($dureTravailleSociete !=0 ){
            return (($experience/$dureTravailleSociete)*5);
        }else{
            return 0;
        }
    }

    /**
     * @return mixed
     */
    public function getNbTache()
    {
        $taches = $this->getTaches();
        return count($taches);
    }



    /**
     * @return mixed
     */
    public function getNoteToday($date)
    {
        if ($date) {
            $notesclient = $this->getNotesClients()->filter(
                function (NoteClient $note) use ($date) {
                    if ($note->getCreatedAt()->format('j-m-y') == (new \DateTime($date))->format('j-m-y')) {
                        return true;
                    }
                }
            );
            $notesemployer = $this->getNotesEmployer()->filter(
                function (NoteEmployer $note) use ($date) {
                    if ($note->getCreatedAt()->format('j-m-y') == (new \DateTime($date))->format('j-m-y')) {
                        return true;
                    }
                }
            );
            $noteTotale = 0;
            $n = 0;
            foreach ($notesclient as $note) {
                $n = $n + 1;
                $noteTotale = $noteTotale + $note->getNote();
            }
            foreach ($notesemployer as $note) {
                $n = $n + 1;
                $noteTotale = $noteTotale + $note->getNote();
            }
            if ($n != 0) {
                return ($noteTotale / $n);
            } else {
                return (0);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getNbTacheResolu()
    {
        $nbtachesResolu = $this->getTaches()->filter(
            function (Tache $tache2) {
                if ($tache2->getIsResolved() == 1) {
                    return true;
                }
            }
        )->count();

        return $nbtachesResolu;
    }

    /**
     * @return mixed
     */
    public function getNbTachesNonResolu()
    {
        $nbtachesResolu = $this->getTaches()->filter(
            function (Tache $tache2) {
                if ($tache2->getIsResolved() == 0) {
                    return true;
                }
            }
        )->count();

        return ($nbtachesResolu);
    }


    public function __construct()
    {
        $this->taches = new ArrayCollection();
        $this->notesClients = new ArrayCollection();
        $this->notesEmployer = new ArrayCollection();
        $this->dateEmbauche = new \DateTime("now");

    }

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $dateEmbauche;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $assiduite;
    /**
     *
     * /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tache",mappedBy="employer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $taches;

    /**
     * @return mixed
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\NoteClient",mappedBy="employer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $notesClients;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\NoteEmployer",mappedBy="employer_note")
     * @ORM\JoinColumn(nullable=true)
     */
    private $notesEmployer;

    /**
     * @return mixed
     */
    public function getNotesClients()
    {
        return $this->notesClients;
    }

    /**
     * @return mixed
     */
    public function getNotesEmployer()
    {
        return $this->notesEmployer;
    }

    public function getUsername()
    {
        return $this->getEmail();
    }

    public function getRoles()
    {
        return ['ROLE_EMPLOYER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return DateTime
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * @param mixed $dateEmbauche
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        $interval = date_diff($this->getDateEmbauche(), new \DateTime("now"));

        return $interval->format('%y Year %m Month %d Day %h Hours %i Minute %s Seconds');
    }

    /**
     * @return mixed
     */
    public function getAssiduite()
    {
        return $this->assiduite;
    }

    /**
     * @param mixed $assiduite
     */
    public function setAssiduite($assiduite)
    {
        $this->assiduite = $assiduite;
    }


}
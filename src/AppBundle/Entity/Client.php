<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 06/05/2017
 * Time: 02:36
 */

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client extends User implements UserInterface
{


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tache",mappedBy="client")
     * @ORM\OrderBy({ "createdAt" = "DESC" })
     */
    private $taches;
    private $role;


    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Tache[]
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
    public function getUsername()
    {
        return $this->getEmail();
    }
    public function getRoles()
    {
        return ['ROLE_CLIENT'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }


    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

}
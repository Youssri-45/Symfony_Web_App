<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 06/05/2017
 * Time: 02:44
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="abscence")
 */
class Abscence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    /**
     * @ORM\Column(type="date")
     */private $dateAbs;
}
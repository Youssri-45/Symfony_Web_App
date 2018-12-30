<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 23/05/2017
 * Time: 18:45
 */

namespace AppBundle\Controller;


use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin/admin",name="admin_profile")
     */
    public function profilAction()
    {
        function endKey($array)
        {
            end($array);

            return key($array);
        }

        $nbEmployer = count($this->getDoctrine()->getRepository('AppBundle:Employer')->findAll());
        $nbClient = count($this->getDoctrine()->getRepository('AppBundle:Client')->findAll());
        $nbTaches = count($this->getDoctrine()->getRepository('AppBundle:Tache')->findAll());
        $nbTachesRes = count(
            $this->getDoctrine()->getRepository('AppBundle:Tache')->findBy(array('isResolved' => true))
        );
        /*   Best Employer */
        $employers = $this->getDoctrine()->getRepository('AppBundle:Employer')->findAll();
        usort($employers, function($a, $b)
        {
            return strcmp($b->getNoteTotale(),$a->getNoteTotale());
        });
        $employers2 = $employers;
        $best_employer = array_shift($employers2);
        /*   Best Employer */
        $employersEfficace = $this->getDoctrine()->getRepository('AppBundle:Employer')->findAll();
        usort($employersEfficace, function($a, $b)
        {
            return strcmp($b->getEfficaciteTotale(),$a->getEfficaciteTotale());
        });
        /*   Best Employer */
        $employersgentille = $this->getDoctrine()->getRepository('AppBundle:Employer')->findAll();
        usort($employersgentille, function($a, $b)
        {
            return strcmp($b->getGentillesseTotale(),$a->getGentillesseTotale());
        });
        dump($employersgentille);
        /*   Best Employer */
        $employersserieux = $this->getDoctrine()->getRepository('AppBundle:Employer')->findAll();
        usort($employersserieux, function($a, $b)
        {
            return strcmp($b->getSerieuxTotale(),$a->getSerieuxTotale());
        });

        return $this->render(
            ':backend:adminIndex.html.twig',
            [
                'employersSerieux' => $employersserieux,
                'employersGentille' => $employersgentille,
                'employersEfficace' => $employersEfficace,
                'employers' =>$employers,
                'bestEmployer' => $best_employer,
                'nbEmployers' => $nbEmployer,
                'nbClients' => $nbClient,
                'nbTaches' => $nbTaches,
                'nbTachesRes' => $nbTachesRes,
            ]
        );
    }

}
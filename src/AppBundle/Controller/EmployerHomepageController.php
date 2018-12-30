<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 11/05/2017
 * Time: 04:16
 */

namespace AppBundle\Controller;


use AppBundle\Entity\NoteClient;
use AppBundle\Entity\NoteEmployer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployerHomepageController extends Controller
{
    /**
     * @Route("/admin/employer", name="employer_homepage")
     * @Security("is_granted('ROLE_EMPLOYER')")
     */
    public function indexAdminAction()
    {
        $employer = $this->getUser();
        $gentillesse = $employer->getGentillesseTotale();
        $serieux = $employer->getSerieuxTotale();
        $efficacite = $employer->getEfficaciteTotale();
        $note = round($employer->getNoteTotale(),1);
        $nbTacheResolu = $employer->getNbTacheResolu();
        $nbTaches = $employer->getNbTachesNonResolu();
        $day1 = $employer->getNoteToday('now');
        $day2 = $employer->getNoteToday('-1 day');
        $day3 = $employer->getNoteToday('-2 day');
        $day4 = $employer->getNoteToday('-3 day');
        $day5 = $employer->getNoteToday('-4 day');
        $day6 = $employer->getNoteToday('-5 day');
        $day7 = $employer->getNoteToday('-6 day');

        return $this->render(
            ':backend:profile.html.twig',
            [
                'gentillesse' => $gentillesse,
                'serieux' => $serieux,
                'efficacite' => $efficacite,
                'note' => $note,
                'nbTaches' => $nbTaches,
                'nbTacheResolu' => $nbTacheResolu,
                'day1' => $day1,
                'day2' => $day2,
                'day3' => $day3,
                'day4' => $day4,
                'day5' => $day5,
                'day6' => $day6,
                'day7' => $day7,
            ]
        );
    }
}
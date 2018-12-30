<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 22/05/2017
 * Time: 02:09
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MesNotesEmployerController extends Controller
{
    /**
     * @Route("/admin/mesnotes",name="mes_notes")
     */
    public function showNotesAction(){
        $employer = $this->getUser();
        $notes = $this->getDoctrine()->getRepository("AppBundle:NoteClient")->findBy(array('employer' => $employer));
        $note_employes = $employer->getNotesEmployer();
        dump($notes,$note_employes);
        return $this->render(":backend:mesnotes.html.twig",[
            'noteClients' => $notes,
            'noteEmployes' => $note_employes
        ]);
    }
}
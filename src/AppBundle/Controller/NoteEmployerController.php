<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 20/05/2017
 * Time: 01:26
 */

namespace AppBundle\Controller;


use AppBundle\Entity\NoteEmployer;
use AppBundle\Form\noteEmployerForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NoteEmployerController extends Controller
{

    /**
     * @Route("admin/noter/{id}",name="note_collegue")
     */

    public function noterAction(Request $request,$id){
        $form = $this->createForm(noteEmployerForm::class);
        $form->handleRequest($request);
        if ($form->isValid()){
            $note = new NoteEmployer();
            $note = $form->getData();
            $nb = $note->getGentillesse()+$note->getSerieux()+$note->getEfficacite();
            $note->setNote($nb/3);
            $employer_note = $this->getDoctrine()->getRepository('AppBundle:Employer')->findOneBy(array('id'=>$id));
            $employer_notant = $this->getUser();
            $note->setEmployerNotant($employer_notant);
            $note->setEmployerNote($employer_note);
            dump($note);
            $em = $this->getDoctrine()->getManager();
            $em->persist($note);
            $em->flush();
            $this->addFlash('success','Merci a vous.. L\'employé a été bien noté');
            return $this->redirectToRoute('mes_collegue');
        }
        return $this->render(":backend:form_wizards.html.twig",[
            'form' => $form->createView(),
        ]);
    }

}
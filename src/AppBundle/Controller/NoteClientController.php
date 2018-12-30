<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 15/05/2017
 * Time: 01:16
 */

namespace AppBundle\Controller;


use AppBundle\Entity\NoteClient;
use AppBundle\Entity\Tache;
use AppBundle\Form\noteClientForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NoteClientController extends Controller
{
    /**
     * @Route("/noter/{id}",name="noter_client")
     */
        public function noteClientAction(Request $request,$id){
            $form = $this->createForm(noteClientForm::class);
            $form->handleRequest($request);
            if ($form->isValid()){
            $note = new NoteClient();
            $note = $form->getData();
            $nb = $note->getGentillesse()+$note->getSerieux()+$note->getEfficacite();
            $note->setNote($nb/3);
            $tache = new Tache();
            $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->findOneBy(array('id'=>$id));
            $tache->setIsNoted(true);
            $emp = $tache->getEmployer();
            $note->setEmployer($tache->getEmployer());
            $note->setClient($this->getUser());
            $note->setTache($tache);
            $tache->setNote($note);
            $tache->setIsResolved(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($note);
            $em->persist($tache);
            $em->flush();
            $this->addFlash('success','Merci a vous.. L\'employé a été bien noté');
            return $this->redirectToRoute('my_profile');
            }
            return $this->render(':base_front:wizard-form.html.twig',[
                'form' => $form->createView()
            ]);
        }


}
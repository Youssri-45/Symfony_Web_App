<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 20/05/2017
 * Time: 01:26
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Employer;
use AppBundle\Entity\NoteEmployer;
use AppBundle\Form\noteAdminForm;
use AppBundle\Form\noteEmployerForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NoteAdminController extends Controller
{

    /**
     * @Route("admin/admin/noter/{id}",name="admin_noter")
     */

    public function noterAction(Request $request,$id){
        $form = $this->createForm(noteAdminForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $employer = new Employer();
            $employer = $form->getData();
            $assiduite = $employer->getAssiduite();
            $employer_note = $this->getDoctrine()->getRepository('AppBundle:Employer')->findOneBy(array('id'=>$id));
            $employer_note->setAssiduite($assiduite);
            $em = $this->getDoctrine()->getManager();
            $em->persist($employer_note);
            $em->flush();
            $this->addFlash('success','Merci a vous.. L\'employé a été bien noté');
            return $this->redirectToRoute('admin_employer');
        }
        return $this->render(":backend:assiduite.html.twig",[
            'form' => $form->createView(),
        ]);
    }

}
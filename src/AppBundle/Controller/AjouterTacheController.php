<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 11/05/2017
 * Time: 16:29
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Tache;
use AppBundle\Form\tacheForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjouterTacheController extends Controller
{
    /**
     * @Route("/admin/tache",name="add_tache")
     * @Security("is_granted('ROLE_EMPLOYER')")
     */

    public function ajouterTacheAction(Request $request){
        $form = $this->createForm(tacheForm::class);
        $form->handleRequest($request);
        $errors = $form->getErrors(true);
        if ($form->isValid()) {
            $tache = new Tache();
            $tache = $form->getData();
            $numTelClient = $tache->getNumTelClient();

            $client = $this->getDoctrine()
                ->getRepository('AppBundle:Client')
                ->findOneBy(['numTel' => $numTelClient]);

            if ( $client == null ) {
                $this->addFlash(
                    'error',
                    'Le numéro du client n\'existe pas'
                );
                return $this->redirectToRoute('add_tache');
            }


            $tache->setClient($client);
            $employer = $this->getUser();
            $tache->setEmployer($employer);
            $em = $this->getDoctrine()->getManager();
            $em->persist($tache);
            $em->flush();
            $this->addFlash(
                'success',
                'La tache a été ajouter avec succés'
            );
            return $this->redirectToRoute('add_tache');
        }

        return $this->render(':backend:tache.html.twig',[
            'form' => $form->createView(),
            'errors' => $errors,

        ]);

    }



}
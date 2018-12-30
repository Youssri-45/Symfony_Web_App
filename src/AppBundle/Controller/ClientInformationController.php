<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 19/05/2017
 * Time: 18:02
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use AppBundle\Form\clientRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClientInformationController extends Controller
{
    /**
     * @Route("/modifier",name="modifier_information")
     */

    public function ChangerAction(Request $request){
        $user = $this->getUser();
        $client = $this->getDoctrine()->getRepository("AppBundle:Client")->findOneBy(array('id' => $user->getId()));
        $form = $this->createForm(clientRegistrationForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $c = new Client();
            $c = $form->getData();
            if ($c->getNom() != null ) $client->setNom($c->getNom());
            if ($c->getPrenom() != null ) $client->setPrenom($c->getprenom());
            if ($c->getNumTel() != null ) $client->setNumTel($c->getNom());
            if ($c->getEmail() != null ) $client->setEmail($c->getEmail());
            if ($c->getPassword() != null ) $client->setPassword($c->Password());
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $this->addFlash("success","Vos donnés a été bien changer");
            return $this->redirectToRoute("my_profile");

        }
        return $this->render(":front:career-form.html.twig",[
            'form' => $form->createView()
        ]);
    }


}
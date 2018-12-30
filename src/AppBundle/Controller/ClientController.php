<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 08/05/2017
 * Time: 02:36
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use AppBundle\Entity\Tache;
use AppBundle\Form\clientRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller {

    /**
     * @Route("/register", name="client_register")
     */

    public function registerAction(Request $request){
        $form = $this->createForm(clientRegistrationForm::class);
        $form->handleRequest($request);
        $errors = $form->getErrors(true);
        if ($form->isValid()) {
            $client = $form ->getData();
            $em = $this->getDoctrine()->getManager();
            $em ->persist($client);
            $em ->flush();
            return $this->get('security.authentication.guard_handler')
                ->authenticateUserAndHandleSuccess(
                    $client,
                    $request,
                    $this->get('app.security.login_form_authenticator'),
                    'main'
                );
        }

        return $this->render(':front:register_page.html.twig',[
            'form' => $form->createView(),
            'errors' =>$errors
            ]);
    }

    /**
     * @Route("/myprofile",name="my_profile")
     * @Security("is_granted('ROLE_CLIENT')")
     */

    public function profileAction() {
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')
            ->findOneBy([ 'id' => $this->getUser()->getId() ]);


        $tache = $client->getTaches()
            ->filter(function (Tache $tache2){
                         if ($tache2->getIsNoted() == 0)
                             return true;
            })->first();


        return $this->render(':front:agent-details.html.twig',[
            'tache' => $tache
        ]);

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 08/05/2017
 * Time: 13:50
 */

namespace AppBundle\Controller;


use AppBundle\Form\clientLoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientSecurityController extends Controller
{
    /**
     * @Route("/login",name="client_login")
     */

    public function loginAction(){
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(clientLoginForm::class,[
            '_username' => $lastUsername,
        ]);

        return $this->render('front/login.html.twig', array(
            'form' => $form->createView(),
            'error'         => $error,
        ));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('this should not be reached!');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 10/05/2017
 * Time: 23:25
 */

namespace AppBundle\Controller;


use AppBundle\Form\employerLoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployerSecurityController extends Controller
{

    /**
     * @Route("/admin",name="employer_login")
     */
    public function loginAction(){
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->createForm(employerLoginForm::class,[
           '_username' => $lastUsername,
        ]);

        return $this->render(':backend:login.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('this should not be reached!');
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 08/05/2017
 * Time: 02:36
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Employer;
use AppBundle\Form\clientRegistrationForm;
use AppBundle\Form\employerRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EmployerController extends Controller {

    /**
     * @Route("/admin-register", name="employer_register")
     */

    public function registerAction(Request $request){
        $form = $this->createForm(employerRegistrationForm::class);
        $form->handleRequest($request);
        $errors = $form->getErrors(true);
        if ($form->isValid()) {
            $employer = $form ->getData();
            $em = $this->getDoctrine()->getManager();
            $em ->persist($employer);
            $em ->flush();
            return $this->get('security.authentication.guard_handler')
                ->authenticateUserAndHandleSuccess(
                    $employer,
                    $request,
                    $this->get('app.security.employer_login_form_authenticator'),
                    'admin'
                );
        }

        return $this->render(':backend:register.html.twig',[
            'form' => $form->createView(),
            'errors' =>$errors
        ]);
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 19/05/2017
 * Time: 21:17
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminEmployerController extends Controller
{
    /**
     * @Route("/admin/admin/employes",name="admin_employer")
     */
    public function showAdminEmployerAction(){
        $employers = $this->getDoctrine()->getRepository("AppBundle:Employer")->findAll();

        return $this->render(":backend:adminContacts.html.twig",[
            'employers' => $employers
        ]);
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 22/05/2017
 * Time: 02:09
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminClientsController extends Controller
{
    /**
     * @Route("/admin/admin/clients",name="admin_clients")
     */
    public function showClientAdminAction(){
        $clients = $this->getDoctrine()->getRepository("AppBundle:Client")->findAll();
        return $this->render(":backend:adminclients.html.twig",[
            'clients' => $clients,
        ]);
    }
}
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

class AdminTacheController extends Controller
{
    /**
     * @Route("/admin/admin/taches",name="admin_taches")
     */
    public function showTacheAdminAction(){
        $taches = $this->getDoctrine()->getRepository("AppBundle:Tache")->findAll();
        return $this->render(":backend:adminTache.html.twig",[
            'taches' => $taches,
        ]);
    }
}
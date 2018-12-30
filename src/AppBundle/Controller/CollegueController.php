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

class CollegueController extends Controller
{
    /**
     * @Route("/admin/collegues",name="mes_collegue")
     */
    public function showCollegueAction(){
        $employers = $this->getDoctrine()->getRepository("AppBundle:Employer")->findAll();

        return $this->render(":backend:contacts.html.twig",[
            'employers' => $employers
        ]);
    }



}
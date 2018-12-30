<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 31/05/2017
 * Time: 01:46
 */

namespace AppBundle\Controller;


use AppBundle\Form\smsAuthenticationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonResponse extends Controller
{
    /**
     * @Route("/admin/admin/sms/{response}",name="sms_response")
     */
    public function smsAction(Request $request,$response){


        return $this->render(":backend:smsResponse.html.twig",[
            'response' => $response,
        ]);
    }

}
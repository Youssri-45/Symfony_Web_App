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

class JsonController extends Controller
{
    /**
     * @Route("/admin/admin/sms",name="sms")
     */
    public function smsAction(Request $request)
    {
        $form = $this->createForm(smsAuthenticationForm::class);
        $form->handleRequest($request);
        $response = false;
        if ($form->isSubmitted()) {
            $data = $form->getData();
            dump($data);
            $apikey = $data['apikey'];
            $userkey = $data['userkey'];
            $function = $data['function'];
            $url = "https://wsp.sms-algerie.com/api/json?function=$function";
            $myvars = 'myvar1='.$apikey.'&myvar2='.$userkey;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            $response = json_decode($response, true);
            if ($response['status'] == "fail") {
                $this->addFlash(
                    'error',
                    'Fail'
                );
                dump($response);
                $response = false;
            } elseif ($response['status'] == "success") {
                $this->addFlash(
                    'success',
                    'success'
                );
            }
        }

            return $this->render(
                ":backend:sms.html.twig",
                [
                    'form' => $form->createView(),
                    'response' => $response
                ]
            );

    }
}


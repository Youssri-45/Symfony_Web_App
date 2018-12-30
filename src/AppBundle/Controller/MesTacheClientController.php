<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 19/05/2017
 * Time: 15:43
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;

class MesTacheClientController extends Controller
{
    /**
     * @Route("mestaches",name="mes_taches")
     */
    public function showAction(){
        $client = $this->getUser();
        $taches = $client->getTaches();
        return $this->render(":front:mestache.html.twig",[
            'taches' => $taches
        ]);
    }
}
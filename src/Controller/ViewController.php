<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    public function index(){
        $tag = date('l');
        $arr = array('apple', 'sillycon', 'valley');
        $user = [
            'name'=> 'Jorge',
            'surname' => 'Suspenso',
            'age' => '25'
        ];
        return $this->render('/view/index.html.twig',[
            'd'=>$tag,
            'a'=> $arr,
            'user'=> $user
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Artikel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ArtikelController extends AbstractController
{
    /**
     * @Route("/artikel", name="artikel")
     */
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
    $artikel = new Artikel();
    $artikel->setTitel("Unser erster Artikel");

    $em= $doctrine->getManager();
    $em->persist($artikel);
    $em->flush();

    return new Response("Artikel wurde angelegt");

  /*  return $this->render('main/index.html.twig', [
        'controller_name' => 'MainController',
    ]);
    */
}
}

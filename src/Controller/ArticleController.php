<?php

namespace App\Controller;

use App\Entity\Articles;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $article = new Articles(); //creo un nuevo objeto de la clase Articles
        $article->setTitle('First title article'); //le asigno un title
        $em = $doctrine->getManager(); //llamo al ORM de doctrine

        // $em->persist($article); //subo el cambio a la db
        // $em -> flush(); //actualizo 
        $getArticle = $em->getRepository(Articles::class)->findOneBy([
            'id'=> 1
        ]) ; //hago la consulta a la db por id
        $em -> remove($getArticle); //quito el registro de la tabla articles
        $em->flush(); //actualizo similar al commit()
        // return new Response("article successfully created");
        return $this->render('article/index.html.twig', [
            'article' => $getArticle,
        ]);
    }
}

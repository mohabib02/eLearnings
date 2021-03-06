<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }


    /**
     * @Route("/article/{id}", name="article")
     */
    public function singleArticle($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);

        if (!$article) {
            return $this->redirectToRoute('home');
        }

        return $this->render('article/singleArticle.html.twig', [
            'article' => $article,
        ]);
    }
}

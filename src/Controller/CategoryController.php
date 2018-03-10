<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{

    /**
     * @Route("/category/{id}")
     */
    public function index(Category $categorie) //pas besoin de défini id, il execute automatiqment la ligne du dessous
    {
        /*$categorie = $this->getDoctrine()->getRepository(Category::class)->find($id);*/
      
        $repo = $this->getDoctrine()->getRepository(Article::class);
        //$articles = $repo->findBy(['category'=>$categorie->getId()]);
        $articles = $repo->findLatest(2, $categorie);
        dump($articles);
        return $this->render('category/index.html.twig', [
           'categorie' => $categorie,
            'articles' => $articles
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing;
use App\Controller\JsonResponse;



class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}" , name="article_show")
     */
    public function show($slug)
    {
        $comments = [
            'This is first comment!',
            'This is second comment!',
            'This is third comment!',
            'This is forth comment!',
            'This is fifth comment!',
        ];

        dump($slug, $this);


        // return new Response(sprintf('Future page to show one article of site: %s', $slug));
        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
     * Undocumented function
     *
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug)
    {
        // TODO - actually hear/unheart the article!

        // return new Response(json_encode(['hearts' => 5]));
        // return JsonResponse(['hearts' => rand(5, 100)]);
        return $this->json(['hearts' => rand(5, 100)]);
    }
}

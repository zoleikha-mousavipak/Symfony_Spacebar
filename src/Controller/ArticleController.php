<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing;
use App\Controller\JsonResponse;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;

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
    public function show($slug, MarkdownInterface $markdown)
    {
        $comments = [
            'This is first comment!',
            'This is second comment!',
            'This is third comment!',
            'This is forth comment!',
            'This is fifth comment!',
        ];

        $articlecontent = "  
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow, lorem proident 
[beef ribs](http://zoleikha.com) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit labore minim pork belly spare
ribs cupim short loin in. Elit exercitation eiusmod dolore cow turkey shank eu pork belly meatball non cupim.

Spicy jalapeno bacon ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow, lorem proident 
beef ribs aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit labore minim pork belly spare
ribs cupim short loin in. Elit exercitation eiusmod dolore cow turkey shank eu pork belly meatball non cupim.

                            
";

        dump($slug, $this);


        $articlecontent = $markdown->transform($articlecontent);

        // return new Response(sprintf('Future page to show one article of site: %s', $slug));
        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'articlecontent' => $articlecontent,
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
     * Undocumented function
     *
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually hear/unheart the article!

        // return new Response(json_encode(['hearts' => 5]));
        // return JsonResponse(['hearts' => rand(5, 100)]);

        $logger->info('Article is being hearted!');

        return $this->json(['hearts' => rand(5, 100)]);
    }
}

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing;



class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('OMG! My first page already! Woooo!');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug){
        return new Response(sprintf('Future page to show one article: %s', $slug));
    }
}

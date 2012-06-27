<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        //Get Categories
            
        //Get TopArticle
        
        //Get LastArticle
        
        
        //Return TwigTemplate
        return new Response('<html><body></body></html>');
    }
}

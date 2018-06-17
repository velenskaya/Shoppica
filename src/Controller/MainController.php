<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts()
    {
        return $this->render('main/contacts.html.twig');
    }



    /**
     * @Route("/sitemap", name="sitemap")
     */
    public function sitemap()
    {
        return $this->render('main/sitemap.html.twig');
    }

}

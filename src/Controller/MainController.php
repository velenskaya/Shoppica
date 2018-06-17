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
     * @Route("/list", name="list")
     */
    public function listProducts()
    {
        return $this->render('main/list.html.twig');
    }

    /**
     * @Route("/listgrid", name="listgrid")
     */
    public function listgridProducts()
    {
        return $this->render('main/listgrid.html.twig');
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts()
    {
        return $this->render('main/contacts.html.twig');
    }
}

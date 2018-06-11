<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogController extends Controller
{
    /**
     * @Route("/catalog", name="catalog")
     */
    public function index()
    {
        return $this->render('catalog/index.html.twig', [
            'controller_name' => 'CatalogController',
        ]);
    }
}

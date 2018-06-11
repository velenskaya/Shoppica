<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCartController extends Controller
{
    /**
     * @Route("/shopping/cart", name="shopping_cart")
     */
    public function index()
    {
        return $this->render('shopping_cart/index.html.twig', [
            'controller_name' => 'ShoppingCartController',
        ]);
    }
}

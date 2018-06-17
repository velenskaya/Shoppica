<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCartController extends Controller
{
    /**
     * @Route("/shopping/cart", name="shopping_cart")
     */
    public function cart()
    {
        return $this->render('shopping_cart/cart.html.twig', [
            'controller_name' => 'ShoppingCartController',
        ]);
    }

    /**
     * @Route("/invoice", name="invoice")
     */
    public function invoice()
    {
        return $this->render('shopping_cart/invoice.html.twig');
    }

    /**
     * @Route("/orders", name="orders")
     */
    public function orders()
    {
        return $this->render('shopping_cart/orders.html.twig');
    }
}

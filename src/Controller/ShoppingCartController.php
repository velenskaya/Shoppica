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
        return $this->render('shopping_cart/cart.html.twig',[
            'title' => 'Basket',
            'name' => 'Basket',
        ]);
    }

    /**
     * @Route("/invoice", name="invoice")
     */
    public function invoice()
    {
        return $this->render('shopping_cart/invoice.html.twig',[
            'title' => 'Invoice',
            'name' => 'Static page',
        ]);
    }

    /**
     * @Route("/orders", name="orders")
     */
    public function orders()
    {
        return $this->render('shopping_cart/orders.html.twig',[
            'title' => 'Invoice',
            'name' => 'Basket',
        ]);
    }
}

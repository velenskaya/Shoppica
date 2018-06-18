<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CheckoutController extends Controller
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function checkout()
    {
        return $this->render('checkout/checkout.html.twig',[
            'title' => 'Сheckout',
        ]);
    }
}

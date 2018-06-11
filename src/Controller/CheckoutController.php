<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CheckoutController extends Controller
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index()
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }
}

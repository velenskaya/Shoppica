<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/login", name="user")
     */
    public function login()
    {
        return $this->render('user/login.html.twig',[
            'title' => 'Вход',
            'name' => 'Basket',
        ]);
    }

    /**
     * @Route("/forms", name="forms")
     */
    public function forms()
    {
        return $this->render('user/forms.html.twig',[
            'title' => 'Форма',
            'name' => 'Basket',
        ]);
    }

}

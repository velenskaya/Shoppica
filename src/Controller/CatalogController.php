<?php

namespace App\Controller;

use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogController extends Controller
{
    /**
     * @Route("/catalog/{C}", name="catalog")
     * @ParamConverter(options={"mapping"={"name":"name"}})
     */
    public function index(Category $category)
    {
        var_dump($category);exit;
        
        return $this->render('catalog/index.html.twig', [
            'controller_name' => 'NEFGHFGFHFJFJG',
        ]);
    }


}

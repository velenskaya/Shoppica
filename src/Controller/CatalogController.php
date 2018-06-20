<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Translation\TranslatorInterface;

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

    /**
     * @Route("/list/{slugCategory}", name="list", defaults={"slugCategory": null})
     * @ParamConverter("category", options={"mapping": {"slugCategory": "slug"}})
     */
    public function listProducts(Category $category=null)
    {

        if ($category) {
            $products = $this->getDoctrine()->getRepository(Product::class)->findBy(['category' => $category]);
        } else {
            $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        }

        return $this->render('catalog/list.html.twig',[
            'title' => 'List of Product',
            'head' => $category ? $category->getName() : 'List of Product',
            'name' => 'Clothing',
            'products' => $products,
            'categories' => $this->getDoctrine()->getRepository(Category::class)->findBy(['parent' => null])
        ]);
    }

    /**
     * @Route("/grid", name="listgrid")
     */
    public function gridProducts()
    {
        return $this->render('catalog/grid.html.twig', [
            'title' => 'List of all products',
            'name' => 'Clothing',
            'categories' => $this->getDoctrine()->getRepository(Category::class)->findBy(['parent' => null])
        ]);
    }

    /**
     * @Route("/singleproduct", name="singleproduct")
     */
    public function singelPoduct()
    {
        return $this->render('catalog/singleproduct.html.twig', [
            'title' => 'One product',
            'name' => 'Clothing',
        ]);
    }


}

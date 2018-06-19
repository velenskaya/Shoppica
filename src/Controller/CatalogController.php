<?php

namespace App\Controller;

use App\Entity\Category;
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
     * @Route("/list", name="list")
     */
    public function listProducts(TranslatorInterface $translator)
    {
        return $this->render('catalog/list.html.twig',[
            'title' => $translator->trans('List of Product'),
            'name' => 'Clothing',
            'categories' => $this->getDoctrine()->getRepository(Category::class)->findBy(['parent' => null])
        ]);
    }

    /**
     * @Route("/listgrid", name="listgrid")
     */
    public function listgridProducts()
    {
        return $this->render('catalog/listgrid.html.twig', [
            'title' => 'Список всех продуктов сеткой',
            'name' => 'Clothing',
        ]);
    }

    /**
     * @Route("/singleproduct", name="singleproduct")
     */
    public function singelPoduct()
    {
        return $this->render('catalog/singleproduct.html.twig', [
            'title' => 'Один продукт',
            'name' => 'Clothing',
        ]);
    }


}

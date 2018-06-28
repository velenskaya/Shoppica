<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
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
    public function listProducts(Category $category=null, Request $request)
    {
        $page = $request->get('page', 1);

        $brandId = $request->get('brand');

        $brand = $this->getDoctrine()->getManager()->find(Brand::class, $brandId);

        $products = $this
                ->getDoctrine()
                ->getRepository(Product::class)
                ->getProductsByFilter($category, $brand, $page);

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
     * @Route("/product/{id}", name="show_singleproduct")
    */
    public function showSingelPoduct($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
        return $this->render('catalog/singleproduct.html.twig', [
            'title' => $product->getName(),
            'name' => 'Clothing',
            'discription'=>$product->getDiscription(),
        ]);
    }
//
//    /**
//     * @Route("/product/{slug}", name="show_singleproduct")
//     * @ParamConverter("product", )
//     */
//    public function showSingelPoduct(Product $product)
//    {
//       return $this->render('catalog/singleproduct.html.twig', [
//            'title' => $product->getName(),
//            'name' => 'Clothing',
//            'discription'=>$product->getDiscription(),
//        ]);
//
//    }

//    /**
//     * @Route("/product/{slug}", name="show_singleproduct")
//     */
//    public function showSingelPoduct($slug)
//    {
//        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy(['slug' => $slug]);
//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for slug ' . $slug
//            );
//        }
//        return $this->render('catalog/singleproduct.html.twig', [
//            'title' => $product->getName(),
//            'name' => 'Clothing',
//            'discription'=>$product->getDiscription(),
//        ]);
//    }
//
//    /**
//     * @Route("/product/{id}/{slug}/{tag}", name="show_singleproduct")
//     * @ParamConverter("product", options={"mapping": {"id": "id", "slug": "slug"}})
//     */
//    public function showSingelPoduct( Product $product, $tag)
//    {
//        return $this->render('catalog/singleproduct.html.twig', [
//            'title' => $product->getName(),
//            'name' => $tag,
//            'discription'=>$product->getDiscription(),
//        ]);

//    }

}
<?php

    namespace RACDevelopment\ProductBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class ProductFrontController extends Controller
    {
        public function indexAction()
        {
            $entities = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:Product')->findAll();
            $data["entities"] = $entities;
            return $this->render('RACDevelopmentProductBundle:ProductFront:index.html.twig', $data);
        }
    }

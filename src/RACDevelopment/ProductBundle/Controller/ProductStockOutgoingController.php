<?php

namespace RACDevelopment\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use RACDevelopment\ProductBundle\Entity\ProductStockOutgoing;

class ProductStockOutgoingController extends Controller
{
    public function indexAction()
    {
        $entities = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:ProductStockOutgoing')->findAll();
        $data["entities"] = $entities;
        return $this->render('RACDevelopmentProductBundle:ProductStockOutgoing:index.html.twig', $data);
    }

    public function createAction($productId)
    {
        $entity = new ProductStockOutgoing();
        $request = $this->get("request");
        $form = $this->createForm("racdevelopment_productbundle_productstockoutgoingtype", $entity);
        $form->bind($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('RACDevelopmentProductBundle:Product')->find($productId);
            $entity->setProduct($product->getId());
            $product->setQuantity($product->getQuantity()-$entity->getQuantity());
            $product->setPrice($product->getPrice()+$entity->getPrice()+$entity->getShippingClient()-$entity->getShippingRAC());
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('rac_development_product_index'));
        }
        $data["form"] = $form->createView();
        $data["productId"] = $productId;
        $data["route"] = "rac_development_product_stock_outgoing_create";
        return $this->render('RACDevelopmentProductBundle:ProductStockOutgoing:create.html.twig', $data);
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('RACDevelopmentProductBundle:ProductStockOutgoing')->find($id);
        if($query)
        {
            $request = $this->get("request");
            $form = $this->createForm("racdevelopment_productbundle_productstockoutgoingtype", $query);
            $form->bind($request);
            if ($form->isValid())
            {
                var_dump("test");
                exit();
                $em = $this->getDoctrine()->getManager();
                $em->persist($query);
                $em->flush();
                return $this->redirect($this->generateUrl('rac_development_product_index'));
            }
            $data["id"] = $id;
            $data["form"] = $form->createView();
            $data["route"] = "rac_development_product_stock_outgoing_edit";
        }
        return $this->render('RACDevelopmentProductBundle:ProductStockOutgoing:edit.html.twig', $data);
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('RACDevelopmentProductBundle:ProductStockOutgoing')->find($id);

        if ($query)
        {
            $em->remove($query);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('rac_development_product_index'));
    }
}

<?php

namespace RACDevelopment\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use RACDevelopment\ProductBundle\Entity\ProductStockIncoming;

class ProductStockIncomingController extends Controller
{
    public function indexAction()
    {
        $entities = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:ProductStockIncoming')->findAll();
        $data["entities"] = $entities;
        return $this->render('RACDevelopmentProductBundle:ProductStockIncoming:index.html.twig', $data);
    }

    public function createAction($productId)
    {
        $entity = new ProductStockIncoming();
        $request = $this->get("request");
        $form = $this->createForm("racdevelopment_productbundle_productstockincomingtype", $entity);
        $form->bind($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('RACDevelopmentProductBundle:Product')->find($productId);
            $entity->setProduct($product->getId());
            $product->setQuantity($product->getQuantity()+$entity->getQuantity());
            $product->setTurnover($product->getTurnover()-$entity->getPrice()-$entity->getShipping());
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('rac_development_product_index'));
        }
        $data["form"] = $form->createView();
        $data["productId"] = $productId;
        $data["route"] = "rac_development_product_stock_incoming_create";
        return $this->render('RACDevelopmentProductBundle:ProductStockIncoming:create.html.twig', $data);
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('RACDevelopmentProductBundle:ProductStockIncoming')->find($id);
        if($query)
        {
            $request = $this->get("request");
            $form = $this->createForm("racdevelopment_productbundle_productstockincomingtype", $query);
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($query);
                $em->flush();
                return $this->redirect($this->generateUrl('rac_development_product_index'));
            }
            $data["id"] = $id;
            $data["form"] = $form->createView();
            $data["route"] = "rac_development_product_stock_incoming_edit";
        }
        return $this->render('RACDevelopmentProductBundle:ProductStockIncoming:edit.html.twig', $data);
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('RACDevelopmentProductBundle:ProductStockIncoming')->find($id);

        if ($query)
        {
            $em->remove($query);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('rac_development_product_index'));
    }
}

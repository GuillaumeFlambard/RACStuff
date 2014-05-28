<?php

    namespace RACDevelopment\ProductBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use RACDevelopment\ProductBundle\Entity\Product;
    use Symfony\Component\HttpFoundation\File\UploadedFile;

    class ProductController extends Controller
    {
        public function indexAction()
        {
            $entities = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:Product')->findAll();
            $data["entities"] = $entities;
            return $this->render('RACDevelopmentProductBundle:Product:index.html.twig', $data);
        }

        public function historicAction($id)
        {
            $product = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:Product')->findOneBy(array('id' => $id));
            $data["product"] = $product;
            $productStockIncoming = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:ProductStockIncoming')->findBy(array('product' => $id));
            $data["productStockIncoming"] = $productStockIncoming;
            $productStockOutgoing = $this->getDoctrine()->getRepository('RACDevelopmentProductBundle:ProductStockOutgoing')->findBy(array('product' => $id));
            $data["productStockOutgoing"] = $productStockOutgoing;
            return $this->render('RACDevelopmentProductBundle:Product:historic.html.twig', $data);
        }

        public function createAction()
        {
            $entity = new Product();
            $request = $this->get("request");
            $form = $this->createForm("racdevelopment_productbundle_producttype", $entity);
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $this->upload($entity->getImage());
                if($entity->getImage() !== null)
                {
                    $entity->setImageName($entity->getImage()->getClientOriginalName());
                }
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl('rac_development_product_index'));
            }
            $data["form"] = $form->createView();
            $data["route"] = "rac_development_product_create";
            return $this->render('RACDevelopmentProductBundle:Product:create.html.twig', $data);
        }

        public function editAction($id)
        {
            $em = $this->getDoctrine()->getManager();
            $query = $em->getRepository('RACDevelopmentProductBundle:Product')->find($id);
            if($query)
            {
                $request = $this->get("request");
                $form = $this->createForm("racdevelopment_productbundle_producttype", $query);
                $form->bind($request);
                if ($form->isValid())
                {
                    $em = $this->getDoctrine()->getManager();
                    $this->upload($query->getImage());
                    if($query->getImage() !== null)
                    {
                        $query->setImageName($query->getImage()->getClientOriginalName());
                    }
                    $em->persist($query);
                    $em->flush();
                    return $this->redirect($this->generateUrl('rac_development_product_index'));
                }
                $data["id"] = $id;
                $data["form"] = $form->createView();
                $data["route"] = "rac_development_product_edit";
            }
            return $this->render('RACDevelopmentProductBundle:Product:edit.html.twig', $data);
        }

        public function deleteAction($id)
        {
            $em = $this->getDoctrine()->getManager();
            $query = $em->getRepository('RACDevelopmentProductBundle:Product')->find($id);

            if ($query)
            {
                $em->remove($query);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('rac_development_product_index'));
        }

        public function upload($image)
        {
            if (null === $image)
            {
                return;
            }

            $name = $image->getClientOriginalName();

            $image->move($this->getUploadRootDir(), $name);

            $this->url = $name;

            $this->alt = $name;
        }

        public function getUploadDir()
        {
            return 'rac/img_product';
        }

        protected function getUploadRootDir()
        {
            return __DIR__.'/../../../../web/'.$this->getUploadDir();
        }

        public function getWebPath()
        {
            return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
        }
    }

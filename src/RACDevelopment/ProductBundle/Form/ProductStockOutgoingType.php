<?php

namespace RACDevelopment\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ProductStockOutgoingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', 'integer', array(
                "label"     => "rac_develoment.product_stock_outgoing.field.quantity",
                "required"   => true
            ))
            ->add('price', 'integer', array(
                "label"     => "rac_develoment.product_stock_outgoing.field.price",
                "required"   => true
            ))
            ->add('shippingClient', 'integer', array(
                "label"     => "rac_develoment.product_stock_outgoing.field.shipping_client",
                "required"   => true
            ))
            ->add('shippingRAC', 'integer', array(
                "label"     => "rac_develoment.product_stock_outgoing.field.shipping_rac",
                "required"   => true
            ))
            ->add('origin', 'text', array(
                "label"     => "rac_develoment.product_stock_outgoing.field.origin",
                "required"   => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RACDevelopment\ProductBundle\Entity\ProductStockOutgoing'
        ));
    }

    public function getName()
    {
        return 'racdevelopment_productbundle_productstockoutgoingtype';
    }
}

?>
 
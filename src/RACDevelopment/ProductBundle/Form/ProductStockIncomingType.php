<?php

namespace RACDevelopment\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ProductStockIncomingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', 'integer', array(
                "label"     => "rac_develoment.product_stock_incoming.field.quantity",
                "required"   => true
            ))
            ->add('price', 'integer', array(
                "label"     => "rac_develoment.product_stock_incoming.field.price",
                "required"   => true
            ))
            ->add('shipping', 'integer', array(
                "label"     => "rac_develoment.product_stock_incoming.field.shipping",
                "required"   => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RACDevelopment\ProductBundle\Entity\ProductStockIncoming'
        ));
    }

    public function getName()
    {
        return 'racdevelopment_productbundle_productstockincomingtype';
    }
}

?>
 
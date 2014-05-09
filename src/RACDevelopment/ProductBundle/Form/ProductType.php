<?php

namespace RACDevelopment\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                "label"     => "rac_develoment.product.field.name",
                "required"   => true
            ))
            ->add('description', 'textarea', array(
                "label"     => "rac_develoment.product.field.description",
                "required"   => true
            ))
            ->add('image', 'text', array(
                "label"     => "rac_develoment.product.field.image",
                "required"   => true
            ))
            ->add('quantity', 'integer', array(
                "label"     => "rac_develoment.product.field.quantity",
                "required"   => true
            ))
            ->add('price', 'integer', array(
                "label"     => "rac_develoment.product.field.price",
                "required"   => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RACDevelopment\ProductBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'racdevelopment_productbundle_producttype';
    }
}

?>
 
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
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('image', 'text')
            ->add('quantity', 'integer')
            ->add('createdAt', 'datetime')
            ->add('updatedAt', 'datetime')
            ->add('price', 'integer')
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
 
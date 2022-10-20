<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference')
            ->add('name')
            ->add('src_img')
            ->add('id_price_category')
        ;

    //$builder
        // ->add('delivery_date', TextType::class, [         
        //     'attr' => [
        //         'data-min-date' => $minDate,
        //         'data-max-date' => $maxDate,
        //         'data-disabled-dates' => implode(';', $disableDates),
        //         ],
        //     ])            
        // ->add('product_size', ChoiceType::class, [
        //         'choices' => $options['data']['listSizeProduct'],
        //         'required' => true,
        //         ])           
        // ->add('product_size_radio', ChoiceType::class, [
        //         'choices' => $options['data']['listSizeProduct'],
        //         'expanded' => true,
        //     ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

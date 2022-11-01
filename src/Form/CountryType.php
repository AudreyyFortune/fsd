<?php

namespace App\Form;

use App\Entity\Country;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isocode', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'admin.country.form.isocode.required',
					]),
				],
			])
            ->add('sapa', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'admin.country.form.sapa.required',
					]),
				],
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Country::class,
			'constraints' => [
				new UniqueEntity([
					'fields' => 'isocode',
					'message' => 'admin.country.form.isocode.exist',
				]),
			]
        ]);
    }
}

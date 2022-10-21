<?php

namespace App\Form\user;

use App\Entity\user\Recipient;
use App\Entity\user\Title;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RecipientType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', ChoiceType::class, [
				'choices' => $options['isFuneral'] ? Title::$titlesFuneral : Title::$titlesRecipient,
				'multiple' => false,
			])
            ->add('name', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.recipient.form.name.required',
					]),
				],
			])
            ->add('firstname', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.recipient.form.firstname.required',
					]),
				],
			])
            ->add('adress', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.recipient.form.adress.required',
					]),
				],
			])
            ->add('zipcode', TextType::class, [
				'constraints' => [
					new Length([
						'max' => 5,
						'maxMessage' => 'order.recipient.form.zipcode.length',
					]),
					new NotBlank([
						'message' => 'order.recipient.form.zipcode.required',
					]),
				],
			])
            ->add('city', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.recipient.form.city.required',
					]),
				],
			])
            ->add('country', TextType::class, [
				'attr' => [
					'class'=> 'form-input'
				],
				'constraints' => [
					new NotBlank([
						'message' => 'order.recipient.form.country.required',
					]),
				],
			])
            ->add('additional_adress', TextareaType::class, [
				'required' => false
			])
            ->add('phone', TelType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.recipient.form.phone.required',
					]),
				],
			])
            ->add('details', TextType::class, [
				'required' => false
			]);

			if($options['isFuneral']) {
				$builder->add('funeral_ceremony', TextType::class, [
					'required' => false
				]);
			}

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipient::class,
			'isFuneral' => false
        ]);
    }
}

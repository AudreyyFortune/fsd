<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'registration.form.username.required',
					]),
				]
			])
			->add('email', EmailType::class)
			->add('password', RepeatedType::class, [
				'type' => PasswordType::class,
				'invalid_message' => 'registration.form.password.match.error',
				'required' => true,
				'first_options'  => [
					'label' => ' ',
					'attr' => [
						'placeholder' => 'registration.form.password.placeholder',
						'class' => 'form-input'
					]
				],
				'second_options' => [
					'label' => ' ',
					'attr' => [
						'placeholder' => 'registration.form.repeat.password.placeholder',
						'class' => 'form-input'
					]
				],
				'constraints' => [
					new Assert\Length([
						'min' => 5,
						'minMessage' => 'registration.form.password.length.error',
					]),
				]
		]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
			'constraints' => [
				new UniqueEntity([
					'fields' => 'email',
					'message' => 'registration.form.email.label.exist',
				]),
			]
        ]);
    }
}

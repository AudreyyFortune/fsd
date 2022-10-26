<?php

namespace App\Form\user;

use App\Entity\user\Sender;
use App\Entity\user\Title;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SenderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', ChoiceType::class, [
				'choices' => Title::$titlesSender ,
				'multiple' => false,
			])
            ->add('name', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.name.required',
					]),
				],
			])
            ->add('firstname', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.firstname.required',
					]),
				],
			])
            ->add('email', EmailType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.email.required',
					]),
					new Email([
						'message' => 'order.sender.form.email.invalid',
					]),
				],
			])
            ->add('adress', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.adress.required',
					]),
				],
			])
            ->add('zipcode', TextType::class, [
				'constraints' => [
					new Length([
						'max' => 5,
						'maxMessage' => 'order.sender.form.zipcode.length',
					]),
					new NotBlank([
						'message' => 'order.sender.form.zipcode.required',
					]),
				],
			])
            ->add('city', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.city.required',
					]),
				],
			])
            ->add('country', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.country.required',
					]),
				],
			])
            ->add('company', TextType::class, [
				'required' => false
			])
            ->add('phone', TelType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'order.sender.form.phone.required',
					]),
				],
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sender::class,
        ]);
    }
}

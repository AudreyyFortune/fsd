<?php

namespace App\Form;

use App\Entity\Order;
use App\Form\user\RecipientType;
use App\Form\user\SenderType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

		$builder
            ->add('recipient', RecipientType::class, [
				'isFuneral' => $options['isFuneral'],
			])
            ->add('sender', SenderType::class, [])
			->add('delivery_date', DateType::class, [
				'widget' => 'single_text',
			]);
			if($options['isFuneral']) {
				$builder->add('delivery_hour', TimeType::class, [
					'widget' => 'choice',
					'placeholder' => [
						'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
					],
					'required' => false,
				]);
			}
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
			'isFuneral' => false,
        ]);
    }
}

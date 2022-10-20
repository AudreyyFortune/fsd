<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'contact.form.email.required',
                    ]),
                    new Email([
                        'message' => 'contact.form.email.invalid',
                    ]),
                ],
            ])
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'contact.form.name.required',
                    ]),
                ],
            ])
            ->add('subject', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'contact.form.subject.required',
                    ]),
                ],
            ])
            ->add('question', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'contact.form.question.required',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

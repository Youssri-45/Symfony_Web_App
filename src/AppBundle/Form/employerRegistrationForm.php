<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class employerRegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nom',
                TextType::class,
                [
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Nom',
                    ),
                    'label' => false,
                ]
            )
            ->add(
                'prenom',
                TextType::class,
                [
                    'attr' => array(
                        'class' => 'form-control ',
                        'placeholder' => 'Prenom',
                    ),
                    'label' => false,
                ]
            )
            ->add(
                'numTel',
                TextType::class,
                [
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Numéro Tel',
                    ),
                    'label' => false,
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Email',
                    ),
                    'label' => false,
                ]
            )
            ->add(
                'password',
                RepeatedType::class,
                array(
                    'type' => PasswordType::class,
                    'invalid_message' => 'The password fields must match.',
                    'options' => array(
                        'attr' => array(
                            'class' => 'form-control input-md',
                        ),
                    ),
                    'required' => true,
                    'error_bubbling' => true,
                    'label' => false,
                    'first_options' => array(
                        'label' => false,
                        'attr' => array(
                            'placeholder' => 'Mot de passe',
                            'class' => 'form-control input-md',
                        ),
                    ),
                    'second_options' => array(
                        'label' => false,
                        'attr' => array(
                            'placeholder' => 'Confirmer Mot de passe',
                            'class' => 'form-control input-md',
                            ),
                    ),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Employer::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundleemployer_registration_form';
    }
}

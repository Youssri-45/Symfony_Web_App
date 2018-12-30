<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class employerLoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                '_username',
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
                '_password',
                PasswordType::class,
                [
                    'attr' => array(
                        'class' => 'form-control ',
                        'placeholder' => 'Password',
                    ),
                    'label' => false,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundleemployer_login_form';
    }
}

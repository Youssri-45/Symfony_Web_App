<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class clientModifierForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class , [
                'required' => false,
                'attr' => array('class' => 'form-control input-md'),
                'label_attr' => array('class' => 'control-label'),
            ])
            ->add('prenom',TextType::class, [
                'attr' => array('class' => 'form-control input-md'),
                'label_attr' => array('class' => 'control-label'),
                'required' => false
            ])
            ->add('numTel',TextType::class, [
                'attr' => array('class' => 'form-control input-md'),
                'label_attr' => array('class' => 'control-label')
            ])
            ->add('email',EmailType::class , [
                'attr' => array('class' => 'form-control input-md'),
                'label_attr' => array('class' => 'control-label')
            ])
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'form-control input-md'),
                    'label_attr' => array('class' => 'control-label')
                ),
                'required' => true,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmer mot de passe'),
                'error_bubbling' => true
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Client'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundleclient_modifier_form';
    }
}

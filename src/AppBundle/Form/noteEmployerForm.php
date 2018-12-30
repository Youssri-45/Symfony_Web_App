<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class noteEmployerForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('efficacite',ChoiceType::class,[
            'choices' => array(
                'star5' => '5',
                'star4' => '4',
                'star3' => '3',
                'star2' => '2',
                'star1' => '1',
            ),
            'expanded' => true,
            'choice_label' => function () {
            return ' ';
            },
            'label' => false,
            'attr' => array('class' => 'rating')
        ])->add('serieux',ChoiceType::class,[
            'choices' => array(
                'star5' => '5',
                'star4' => '4',
                'star3' => '3',
                'star2' => '2',
                'star1' => '1',
            ),
            'expanded' => true,
            'choice_label' => function () {
                return ' ';
            },
            'label' => false,
            'attr' => array('class' => 'rating')
        ])->add('gentillesse',ChoiceType::class,[
        'choices' => array(
            'star5' => '5',
            'star4' => '4',
            'star3' => '3',
            'star2' => '2',
            'star1' => '1',
        ),
        'expanded' => true,
        'choice_label' => function () {
            return ' ';
        },
        'label' => false,
        'attr' => array('class' => 'rating')
    ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'AppBundle\Entity\NoteEmployer',
            'allow_extra_fields' => true,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'dgdfhfdhdf';
    }
}

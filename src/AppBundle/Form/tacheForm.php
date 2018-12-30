<?php

namespace AppBundle\Form;


use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class tacheForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('nomTache',TextType::class,[
            'attr' => array(
                'class' => 'form-control col-md-7 col-xs-12 ',
            ),
            'label' => false,
        ])
            ->add('description',TextareaType::class,[
                'attr' => array(
                    'class' => 'form-control col-md-7 col-xs-12 ',
                    'rows' => '3'
                ),
                'label' => false,
            ])
            ->add('numTelClient',NumberType::class,[
                'attr' => array(
                    'class' => 'form-control col-md-7 col-xs-12 ',
                ),
                'label' => false
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \AppBundle\Entity\Tache::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundletache';
    }
}

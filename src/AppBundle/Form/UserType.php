<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-08
 * Time: 10:02
 */

namespace AppBundle\Form;

use AppBundle\Entity\Result;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Comps;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('name', TextType::class, array(
                'label' => 'Name',
            ))
            ->add('result', TextType::class, array(
                'label' => 'Result',
            ))
            ->add('total', TextType::class, array(
                'label' => 'Total',
            ))
            ->add('specChal', CheckboxType::class, array(
                'label' => 'specChal',
            ))
            ->add('sex', ChoiceType::class, array(
                'label' => 'Sex',
                'expanded' => true,
                'choices'  => array(
                    'male' => 'Male',
                    'female' => 'Female',
                ),
            ))
            ->add('pro', CheckboxType::class, array(
                'label' => 'Pro',
            ))
            ->add('comp', EntityType::class, array(
                'class' => 'AppBundle:Comps',
                'choice_label' => 'id',
                'expanded' => true,
                'label' => 'Comp',
            ))
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Result::class,
        ]);
    }
}
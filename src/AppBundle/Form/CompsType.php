<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-07
 * Time: 10:55
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Comps;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class CompsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('name', TextType::class, array(
                'label' => 'Name',
            ))
            ->add('date', DateType::class, array(
                'label' => 'Date',
                'input' => 'datetime'
            ))
            ->add('startTime', TimeType::class, array(
                'label' => 'Start time',
            ))
            ->add('endTime', TimeType::class, array(
                'label' => 'End Time',
            ))
            ->add('numberOfRoutes', TextType::class, array(
                'label' => 'Number of routes',
            ))
            ->add('specChal', CheckboxType::class, array(
                'label' => 'Special challenge',
            ))
            ->add('specChalPoints', TextType::class, array(
                'label' => 'Points for special challenge',
            ))
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comps::class,
        ]);
    }
}
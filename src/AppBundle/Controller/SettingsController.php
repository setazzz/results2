<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.09.03
 * Time: 16:22
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/set")
 * @Security("has_role('ROLE_SUPER_ADMIN')")
 */
class SettingsController extends Controller
{
    /**
     * @Route("/settings", name="compSetInput")
     */
    public function CompSetAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('routesSetInput'))
            ->setMethod('POST')
            ->add('name', TextType::class, array(
                'label' => 'Name',
            ))
            ->add('date', DateType::class, array(
                'label' => 'Date',
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



        return $this->render('contents/compSetInput.html.twig', [
            'form' => $form->getForm()->createView(),
        ]);
    }

    /**
     * @Route("/routesSettings", name="routesSetInput")
     */
    public function RoutesSetAction(Request $request)
    {
        $compSettings = $request->request->get('form');
        $numberOfRoutes = $compSettings['numberOfRoutes'];

        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('saveComp'))
            ->setMethod('POST');

        for ($i = 1; $i <= $numberOfRoutes; $i++) {
            $form = $form
                ->add('points' . $i, ChoiceType::class, array(
                    'label' => $i . '. Points',
                    'choices' => array(
                        '10' => 10,
                        '20' => 20,
                        '30' => 30,
                        '40' => 40,
                        '50' => 50,
                    ),
                    'expanded' => true,
                ))
                ->add('color' . $i, TextType::class, array(
                    'label' => 'Color',
                ))
                ->add('setter' . $i, EntityType::class, array(
                    'class' => 'AppBundle:Setter',
                    'choice_label' => 'firstName',
                    'expanded' => true,
                ))
            ;
        }

        var_dump($compSettings['startTime']);

        $form = $form
            ->add('name', HiddenType::class, array(
                'data' => $compSettings['name']))
//            ->add('date', HiddenType::class, array(
//                'data' => $compSettings['date']->format('Y-m-d')))
//            ->add('startTime', HiddenType::class, array(
//                'data' => $compSettings['startTime']))
//            ->add('endTime', HiddenType::class, array(
//                'data' => $compSettings['endTime']))
            ->add('numberOfRoutes', HiddenType::class, array(
                'data' => $compSettings['numberOfRoutes']))
            ->add('specChal', HiddenType::class, array(
                'data' => $compSettings['specChal']))
            ->add('specChalPoints', HiddenType::class, array(
                'data' => $compSettings['specChalPoints']))
            ->add('Submit', SubmitType::class)
        ;

        return $this->render('contents/routesSetInput.html.twig', [
            'form' => $form->getForm()->createView(),
        ]);
    }

    /**
     * @Route("/saveComp", name="saveComp")
     */
    public function SaveCompAction(Request $request)
    {
        $compSettings = $request->request->get('form');
var_dump($compSettings);

//        $compSettings = 'var';


        return $this->render('contents/test.html.twig', [
            'form' => $compSettings,
        ]);
    }
}
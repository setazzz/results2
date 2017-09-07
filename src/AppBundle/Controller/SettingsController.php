<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.09.03
 * Time: 16:22
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Comps;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CompsType;

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
        $form = $this->createForm(CompsType::class, null, [
            'action' => $this->generateUrl('saveComp')
        ]);

        return $this->render('contents/compSetInput.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/saveComp", name="saveComp")
     */
    public function SaveCompAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $newComp = new Comps();

        $form = $this->createForm(CompsType::class, $newComp);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($newComp);

            $em->flush();

            return $this->render('contents/test.html.twig', [
                'output' => 'comp saved',
            ]);
        } else {
            return $this->render('contents/test.html.twig', [
                'output' => 'Something went wrong. Try again',
            ]);
        }


    }
}
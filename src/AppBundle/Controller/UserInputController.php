<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.31
 * Time: 12:14
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Comps;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserInputController extends Controller
{
    /**
     * @Route("/input", name="userInput")
     */
    public function testAction(Request $request)
    {
        $form = $this->createForm(UserType::class, null, [
            'action' => $this->generateUrl('saveUser')
        ]);

        $list = $this->getDoctrine()->getRepository('AppBundle:Comps')->findAll();
        $comp = $list[0]; //todo: get a necessary id
        $settings = json_encode($comp);

        return $this->render('contents/resultsInput.html.twig', [
            'form' => $form->createView(),
            'comp' => $comp,
            'settings' => $settings,
        ]);
    }

    /**
     * @Route("/saveUser", name="saveUser")
     * @Method("POST")
     */
    public function CompSaveAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $newComp = new Comps();

        $form = $this->createForm(UserType::class, $newComp);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($newComp);

            $em->flush();

            return $this->render('contents/compSaveOutput.html.twig', [
                'output' => 'comp saved',
            ]);
        } else {
            return $this->render('contents/compSaveOutput.html.twig', [
                'output' => 'Something went wrong. Try again',
            ]);
        }
    }
}
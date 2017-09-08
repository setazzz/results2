<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.31
 * Time: 12:14
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Comps;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserInputController extends Controller
{
    /**
     * @Route("/input", name="userInput")
     */
    public function indexAction(Request $request)
    {
        $list = $this->getDoctrine()->getRepository('AppBundle:Comps')->findAll();

        $comp = $list[0]; //todo: get a necessary id

        return $this->render('contents/resultsInput.html.twig', [
            'comp' => $comp,
        ]);
    }
}
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
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class UserInputController extends Controller
{
    /**
     * @Route("/input", name="userInput")
     */
    public function indexAction(Request $request)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $list = $this->getDoctrine()->getRepository('AppBundle:Comps')->findAll();

        $comp = $list[0]; //todo: get a necessary id


        $comp->setDate($comp->getDate()->format('Y-m-d'));
        $comp->setStartTime($comp->getStartTime()->format('H:i:s'));
        $comp->setEndTime($comp->getEndTime()->format('H:i:s'));

        $json = $serializer->serialize($comp, 'json');

        return $this->render('contents/resultsInput.html.twig', [
            'json' => $json,
        ]);
    }
}
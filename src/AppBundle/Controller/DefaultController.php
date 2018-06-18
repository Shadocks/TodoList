<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController.
 */
class DefaultController extends Controller
{
    /**
     * @Route(
     *     path="/",
     *     name="homepage"
     * )
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}

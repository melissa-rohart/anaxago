<?php

namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Anaxago\CoreBundle\Entity\Project;
use Anaxago\CoreBundle\Entity\User;
use Anaxago\CoreBundle\Entity\Investment;
use Unirest;
use Unirest\Request\Body;

/**
 * Class ProjectController
 *
 * @package Anaxago\CoreBundle\Controller
 */
class ProjectController extends Controller
{
    /**
     * @Route("/simulation", name="invesment_simulation")
     */
    public function simulateInvestmentAction(Request $request)
    {
        $headers = array('Accept' => 'application/json');
        $duration = $request->request->get('duration');
        $asset = $request->request->get('asset');
        $body = Body::Json(array('duration' => $duration, 'interest_rate' => 1, 'asset' => $asset));

        $response = Unirest\Request::post("http://localhost:8888/anaxago-starter-kit/web/app_dev.php/api/simulation", $headers, $body);

        return new Response($response->body->result);
    }

    /**
     * @Route("/invesment", name="add_invesment")
     */
    public function investmentAction(Request $request) 
    {
        $headers = array('Accept' => 'application/json');
        $amount = $request->request->get('amount');
        $user = $request->request->get('user');
        $project = $request->request->get('project');
        $body = Body::Json(array('amount' => $amount, 'user' => $user, 'project' => $project));

        $response = Unirest\Request::post("http://localhost:8888/anaxago-starter-kit/web/app_dev.php/api/investment", $headers, $body);

        return new Response();
    }
}
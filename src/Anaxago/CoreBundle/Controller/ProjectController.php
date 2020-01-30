<?php

namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Anaxago\CoreBundle\Entity\Project;

/**
 * Class ProjectController
 *
 * @package Anaxago\CoreBundle\Controller
 */
class ProjectController extends Controller
{
    /**
     * @Route("/api/projects", name="projects_list")
     * @Method({"GET"})
     */
    public function getProjectsAction(Request $request)
    {
        $projects = $this->get('doctrine.orm.entity_manager')->getRepository(Project::class)->findAll();
        /* @var $projects Project[] */

        $formatted = [];
        foreach ($projects as $project) {
            $formatted[] = [
               'id' => $project->getId(),
               'title' => $project->getTitle(),
               'description' => $project->getDescription(),
               'financed' => $project->getFinanced()
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Route("/api/investment", name="add_invesment")
     * @Method({"POST"})
     */
    public function addInvestmentAction(Request $request)
    {
    }

    /**
     * @Route("/api/simulation", name="invesment_simulation")
     * @Method({"POST"})
     */
    public function simulateInvestmentAction(Request $request)
    {
        $body = json_decode($request->getContent(), true);

        $formatted = [ 'result' => $body['asset'] / ($body['duration']*12) ];

        return new JsonResponse($formatted);
    }
}
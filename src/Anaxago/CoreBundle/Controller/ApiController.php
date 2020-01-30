<?php

namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Anaxago\CoreBundle\Entity\Project;
use Anaxago\CoreBundle\Entity\User;
use Anaxago\CoreBundle\Entity\Investment;

/**
 * Class ProjectController
 *
 * @package Anaxago\CoreBundle\Controller
 */
class ApiController extends Controller
{
    /**
     * @Route("/api/projects", name="projects_list_api")
     * @Method({"GET"})
     */
    public function getProjectsApiAction(Request $request)
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
     * @Route("/api/investment", name="add_invesment_api")
     * @Method({"POST"})
     */
    public function addInvestmentApiAction(Request $request, EntityManagerInterface $entityManager)
    {
        $body = json_decode($request->getContent(), true);

        $project = $entityManager->getRepository(Project::class)->find($body['project']);
        $user = $entityManager->getRepository(User::class)->find($body['user']);

        $investment = new Investment();
        $investment->setAsset($body['amount']);
        $investment->setProject($project);
        $investment->setUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($investment);
        $em->flush();

        return new JsonResponse('ok');
    }

    /**
     * @Route("/api/simulation", name="invesment_simulation_api")
     * @Method({"POST"})
     */
    public function simulateInvestmentApiAction(Request $request)
    {
        $body = json_decode($request->getContent(), true);

        $formatted = [ 'result' => $body['asset'] / ($body['duration']*12) ];

        return new JsonResponse($formatted);
    }
}
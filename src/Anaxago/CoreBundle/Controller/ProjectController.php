<?php

namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
}
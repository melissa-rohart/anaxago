<?php declare(strict_types = 1);

namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Anaxago\CoreBundle\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package Anaxago\CoreBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     */
    public function indexAction(EntityManagerInterface $entityManager): Response
    {
        $projects = $entityManager->getRepository(Project::class)->findAll();

        return $this->render('@AnaxagoCore/Default/index.html.twig', ['projects' => $projects]);
    }

    /**
     * @Route("/project/{id}", name="project")
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     */
    public function projectAction(EntityManagerInterface $entityManager, $id): Response
    {
        $project = $entityManager->getRepository(Project::class)->find($id);

        return $this->render('@AnaxagoCore/Default/project.html.twig', ['project' => $project]);
    }
}

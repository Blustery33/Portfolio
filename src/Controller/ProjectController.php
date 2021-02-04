<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\TechnologyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project")
     */
    public function index(EntityManagerInterface $entityManager, ProjectRepository $projectRepository, CategoryRepository $categoryRepository, TechnologyRepository $technologyRepository): Response
    {
        $projects = $projectRepository->findAll();
        $categories = $categoryRepository->findAll();
        $technologies = $technologyRepository->findAll();

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
            'categories' => $categories,
            'technologies' => $technologies,
        ]);
    }
}

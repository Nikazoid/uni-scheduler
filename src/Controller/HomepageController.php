<?php

namespace App\Controller;

use App\Repository\LecturerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    private $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    /**
     * @App\Route("/", name="homepage")
     */
    public function __invoke(): Response {
        return $this->render('homepage/index.html.twig', [
            'lecturersCount' => count($this->lecturerRepository->getNumberOfLecturers()),
        ]);
    }
}

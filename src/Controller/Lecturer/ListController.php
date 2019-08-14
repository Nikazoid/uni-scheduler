<?php

namespace App\Controller\Lecturer;

use App\Repository\LecturerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ListController extends AbstractController
{
    private $lecturerRepository;

        public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    /**
     * @App\Route("/lecturer/list", name="list_lecturer")
     */
    public function __invoke(): Response
    {
        return $this->render('lecturer/list.html.twig', [
            'lecturer' => $this->lecturerRepository->findAll(),
        ]);
    }
}

<?php

namespace App\Controller\Lecturer;

use App\Entity\Lecturer;
use App\Repository\LecturerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends AbstractController
{
    private $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    /**
     * @App\Route("/lecturer/{id}", name="show_lecturer", methods="GET")
     */
    public function __invoke(Lecturer $lecturer, Request $request): Response
    {
        return $this->render('lecturer/show.html.twig', [
            'lecturer' => $lecturer,
            'lecturerMonday' => $this->lecturerRepository->getExercisesByDay('Monday', $request->get('id')),
            'lecturerTuesday' => $this->lecturerRepository->getExercisesByDay('Tuesday', $request->get('id')),
            'lecturerWednesday' => $this->lecturerRepository->getExercisesByDay('Wednesday', $request->get('id')),
            'lecturerThursday' => $this->lecturerRepository->getExercisesByDay('Thursday', $request->get('id')),
            'lecturerFriday' => $this->lecturerRepository->getExercisesByDay('Friday', $request->get('id')),
        ]);
    }
}

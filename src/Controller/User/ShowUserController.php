<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowUserController extends AbstractController
{
    /**
     * @App\Route("/profile", name="show_user_profile", methods="GET")
     */
    public function __invoke(Request $request): Response
    {
        return $this->render('user/profile_show.html.twig');
    }
}

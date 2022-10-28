<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimaisController extends AbstractController
{
    /**
     * @Route("/animais", name="app_animais")
     */
    public function index(): Response
    {
        return $this->render('animais/index.html.twig', [
            'controller_name' => 'AnimaisController',
        ]);
    }
}

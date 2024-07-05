<?php

namespace App\Home\Infraestructure\Symfony\Controller;

use App\Home\Application\Service\MeasurementService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MeasurementController extends AbstractController
{
    private $measurementService;

    public function __construct(MeasurementService $measurementService)
    {
        $this->measurementService = $measurementService;
    }

    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'MeasurementController',
        ]);
    }

    // #[Route('/save', name: 'app_user_save_registry')]
    // public function saveRegister(Request $request): Response
    // {
    //     $email = $request->get('_username');
    //     $password = $request->get('_password');
    //     $this->userService->register($email, $password);
    //     return new Response('User registered', Response::HTTP_CREATED);
    // }

    // #[Route('/back', name: 'backLogin')]
    // public function backLogin()
    // {
    //     return $this->redirectToRoute('app_login');
    // }
}

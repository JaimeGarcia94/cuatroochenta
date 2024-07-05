<?php

namespace App\Auth\Infraestructure\Symfony\Controller;

use App\Auth\Application\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Route('/registry', name: 'app_user_registry')]
    public function registry(): Response
    {
        return $this->render('user/registry.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/save', name: 'app_user_save_registry')]
    public function saveRegister(Request $request): Response
    {
        $email = $request->get('_username');
        $password = $request->get('_password');
        $this->userService->register($email, $password);
        return new Response('User registered', Response::HTTP_CREATED);
    }

    #[Route('/back', name: 'backLogin')]
    public function backLogin()
    {
        return $this->redirectToRoute('app_login');
    }
}

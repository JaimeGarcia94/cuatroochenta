<?php

namespace App\Home\Infraestructure\Symfony\Controller;

use App\Home\Application\Service\MeasurementService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;

class MeasurementController extends AbstractController
{
    private $measurementService;
    private $security;

    public function __construct(MeasurementService $measurementService, Security $security)
    {
        $this->measurementService = $measurementService;
        $this->security = $security;
    }

    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/addMeasurement', name: 'app_add_measurement', methods: ["POST"])]
    public function addMeasurement(Request $request): Response
    {
        $user = $this->getUser();
        $data = [
            'user' => $user,
            'year' => $request->get('year'),
            'variety' => $request->get('variety'),
            'type' => $request->get('type'),
            'color' => $request->get('color'),
            'temperature' => $request->get('temperature'),
            'graduation' => $request->get('graduation'),
            'ph' => $request->get('ph'),
            'observations' => $request->get('observations'),
        ];

        $this->measurementService->addMeasurement($data);
        return $this->redirectToRoute('app_home');
        // return new Response('Measurement added', Response::HTTP_CREATED);
    }
}

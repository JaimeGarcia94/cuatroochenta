<?php

namespace App\Home\Infraestructure\Symfony\Controller;

use App\Home\Application\Service\MeasurementService;
use App\Home\Application\Service\TypeSensorService;
use App\Home\Application\Service\SensorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class MeasurementController extends AbstractController
{
    private $measurementService;
    private $typeSensorService;
    private $sensorService;

    public function __construct(MeasurementService $measurementService, TypeSensorService $typeSensorService, SensorService $sensorService)
    {
        $this->measurementService = $measurementService;
        $this->typeSensorService = $typeSensorService;
        $this->sensorService = $sensorService;
    }

    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        $typeSensor = $this->typeSensorService->getAllTypeSensor();

        return $this->render('home/index.html.twig', [
            'typeSensor' => $typeSensor
        ]);
    }

    #[Route('/measurements', name: 'app_get_measurement', methods: ["GET"])]
    public function getMeasurements(): JsonResponse
    {
        $user = $this->getUser();
        $measurements = $this->measurementService->getAllMeasurements($user);

        $data = [];

        foreach ($measurements as $measurement) {
            $data[] = [
                'year' => $measurement->getYear(),
                'variety' => $measurement->getVariety(),
                'type' => $measurement->getType(),
                'color' => $measurement->getColor(),
                'temperature' => $measurement->getTemperature(),
                'graduation' => $measurement->getGraduation(),
                'ph' => $measurement->getPh(),
                'observations' => $measurement->getObservations(),
            ];
        }

        return new JsonResponse($data);
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

    #[Route('/addSensor', name: 'app_add_sensor', methods: ["POST"])]
    public function addSensor(Request $request): Response
    {
        $user = $this->getUser();
        $data = [
            'user' => $user,
            'value' => $request->get('value'),
            'typeSensor' => $request->get('typeSensor'),
        ];

        $this->sensorService->addSensor($data);

        return $this->redirectToRoute('app_home');
        // return new Response('Measurement added', Response::HTTP_CREATED);
    }
}

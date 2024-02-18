<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Repository\HourRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarsController extends AbstractController
{
    #[Route('/voitures', name: 'cars')]
    public function index(CarRepository $carRepository, HourRepository $hourRepository): Response
    {
        $cars = $carRepository->findAll();
        $hours = $hourRepository->findAll();

        return $this->render('cars/index.html.twig', [
            'cars' => $cars,
            'hours' => $hours,
        ]);
    }
}

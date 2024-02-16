<?php

namespace App\Controller;

use App\Entity\Review;
use App\Repository\CarRepository;
use App\Repository\ContactRepository;
use App\Repository\ReviewRepository;
use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    public function __construct(
        private CarRepository $carRepository,
        private ReviewRepository $reviewRepository,
        private ServiceRepository $serviceRepository,
        private UserRepository $userRepository,
        private ContactRepository $contactRepository
    )
    {}

    #[Route('/admin', name: 'admin_dashboard')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'cars' => $this->carRepository->findAll(),
            'reviews' => $this->reviewRepository->findAll(),
            'services' => $this->serviceRepository->findAll(),
            'users' => $this->userRepository->findAll(),
            'contacts' => $this->contactRepository->findAll(),
        ]);
    }
}

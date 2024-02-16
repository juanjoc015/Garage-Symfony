<?php

namespace App\Controller;

use App\Repository\HourRepository;
use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewController extends AbstractController
{
    #[Route('/reviews', name: 'review_index')]
    public function index(ReviewRepository $reviewRepository, HourRepository $hourRepository): Response
    {

        return $this->render('review/index.html.twig', [
            'reviews' => $reviewRepository->findBy(['enabled' => true], ['createdAt' => 'DESC']),
            'hours' => $hourRepository->findAll(),
        ]);
    }
}

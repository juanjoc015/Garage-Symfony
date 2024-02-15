<?php

namespace App\Controller;


use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\CarRepository;
use App\Repository\HourRepository;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(CarRepository $carRepository, ReviewRepository $reviewRepository, HourRepository $hourRepository, Request $request): Response
    {
        $cars = $carRepository->findWithQuantity(4);
        
        $hours = $hourRepository->findAll();

        // Crear una nueva reseña y el formulario asociado
        $reviewForm = new Review();
        $form = $this->createForm(ReviewType::class, $reviewForm);
        $form->handleRequest($request);
        
        // Verificar si el formulario ha sido enviado y es válido
        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($reviewForm);
            $this->entityManager->flush();

            $this->addFlash('success', 'Votre avis a bien été envoyé');
            return $this->redirectToRoute('home');
        }


        $reviews = $reviewRepository->findBy([], ['createdAt' => 'DESC'], 3);


        return $this->render('home/index.html.twig', [
            'cars' => $cars,
            'reviews' => $reviews,
            'review_form' => $form,
            'hours' => $hours,
        ]);
    }

    
}

<?php

namespace App\Controller;


use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\CarRepository;
use App\Repository\HourRepository;
use App\Repository\ReviewRepository;
use App\Repository\ServiceRepository;
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
    public function index(
        CarRepository $carRepository,
        ReviewRepository $reviewRepository,
        HourRepository $hourRepository,
        ServiceRepository $serviceRepository,
        Request $request): Response
    {
        $cars = $carRepository->findWithQuantity(4);
        $services = $serviceRepository->findAll();
        $hours = $hourRepository->findAll();
        $reviews = $reviewRepository->findBy(['enabled' => true], ['createdAt' => 'DESC'], 3);

        // Crear una nueva reseña y el formulario asociado
        $reviewForm = new Review();
        $form = $this->createForm(ReviewType::class, $reviewForm);
        $form->handleRequest($request);

        // Verificar si el formulario ha sido enviado y es válido
        if($form->isSubmitted() && $form->isValid()) {
            $reviewForm->setCreatedAt(new \DateTime());
            $reviewForm->setEnabled(false);

            $this->entityManager->persist($reviewForm);
            $this->entityManager->flush();

            $this->addFlash('success', 'Votre avis a bien été envoyé');
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'cars' => $cars,
            'reviews' => $reviews,
            'review_form' => $form,
            'hours' => $hours,
            'services' => $services
        ]);
    }
}

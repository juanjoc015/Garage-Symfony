<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/vehicules')]
class CarsController extends AbstractController
{
    #[Route('/', name: 'admin_cars_index', methods: ['GET'])]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('admin/cars/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_cars_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $car->setUser($this->getUser());
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('admin_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/cars/new.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_cars_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('admin/cars/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_cars_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/cars/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_cars_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_cars_index', [], Response::HTTP_SEE_OTHER);
    }
}

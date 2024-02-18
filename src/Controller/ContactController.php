<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\HourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'contact')]
    public function index(Request $request, HourRepository $hourRepository): Response
    {
        $hours = $hourRepository->findAll();
        $infosForm = new Contact();
        $form = $this->createForm(ContactType::class, $infosForm);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($infosForm);
            $this->entityManager->flush();

            $this->addFlash('success','Votre demande a bien été envoyé');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'infosForm' => $form->createView(),
            'hours' => $hours,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AddannonceType;
use App\Repository\AnnonceRepository;
use App\Utils\PriceCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnnoncesController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index(AnnonceRepository $annonceRepository)
    {
        $annonces = $annonceRepository->findAll();
        return $this->render('annonces/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }


    /**
     * @Route("/addannonces", name="addannonces")
     */
    public function addannonce(Request $request,EntityManagerInterface $em, PriceCalculator $priceCalculator)
    {

        $annonce = new Annonce();
        $form = $this->createForm(AddannonceType::class,$annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $annonce->setPrice($priceCalculator->givePrice($annonce->getCarYear(),$annonce->getNbKm(),$annonce->getNbDays()));
            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute("annonces");
        }


        return $this->render('annonces/add.html.twig', [
            'form' =>  $form->createView(),
        ]);
    }


}

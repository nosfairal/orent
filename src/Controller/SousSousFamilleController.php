<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\SousFamille;
use App\Entity\SousSousFamille;
use App\Service\Search;
use App\Form\SousSousFamilleType;
use App\Repository\SousSousFamilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SousSousFamilleController extends AbstractController

{
    public function __construct(SousSousFamilleRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="home")
     */
    function searchFamily(Request $request)
    {
        $search = new Search();
        $form = $this->createForm(SousSousFamilleType::class, $search); // Formulaire de recherche

        $form->handleRequest($request);

        // Si le formulaire de recherche est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Cherche le ou les patients qui correspondent
            $ssFamille = $this->repo->findWithSearch($search);
            if (empty($ssFamille)) {
                $this->addFlash('alert', "Cette sous sous famille n'existe pas");
                return $this->redirectToRoute('home');
                /*$this->getDoctrine()->getRepository(SousSousFamille::class)->findAll()*/
            }

            //\dd($ssFamille);

            //\var_dump($ssfamilles);
            return $this->render('sousSousFamilleSearch.html.twig', [
                'ssFamille' => $ssFamille,
                'form' => $form->createView()
                /*$this->getDoctrine()->getRepository(SousSousFamille::class)->findAll()*/
            ]);
        }
        return $this->render('sousSousFamilleSearch.html.twig', [
            'form' => $form->createView()
            /*$this->getDoctrine()->getRepository(SousSousFamille::class)->findAll()*/
        ]);
    }
}

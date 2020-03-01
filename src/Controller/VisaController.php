<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VisaController extends AbstractController
{
    /**
     * @Route("/visa", name="visa")
     */
    public function index()
    {
        return $this->render('visa/index.html.twig', [
            'controller_name' => 'VisaController',
        ]);
    }
}

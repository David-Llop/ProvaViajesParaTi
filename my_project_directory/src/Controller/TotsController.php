<?php

namespace App\Controller;

use App\Entity\Proveidors;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TotsController extends AbstractController
{
    /**
     * @Route("/tots",name="veure_proveidors")
     */
    public function new(): Response
    {
        $proveidors=$this->getDoctrine()->getRepository(Proveidors::class)->getAll();
        return $this->render('views/tots.html.twig',[
            'proveidors' =>$proveidors
        ]);
    }
}

?>
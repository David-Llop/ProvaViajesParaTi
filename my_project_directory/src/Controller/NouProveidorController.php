<?php
// src/Controller/NouProveidorController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NouProveidorController extends AbstractController
{
    /**
     * @Route("/nou_proveidor")
     */
    public function index(): Response
    {
       return $this->render('views/nou_proveidor.html.twig');
    }
}
?>
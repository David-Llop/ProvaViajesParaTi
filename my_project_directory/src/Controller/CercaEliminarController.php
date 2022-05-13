<?php

namespace App\Controller;

use App\Entity\Buit;
use App\Entity\Proveidors;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityManagerInterface;

class CercaEliminarController extends AbstractController
{
    /**
     * @Route("/cerca_delete", name="eliminar_proveidor")
     */
    public function index(Request $request): Response
    {
        $cerca=new Buit();
        $cerca->setA("");
        $proveidor=null;
        $form=$this->createFormBuilder($cerca)
            ->add('a', TextType::class, ['label'=>'Nom proveidor'])
            ->add('Cerca', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $cerca=$form->getData();
            $proveidor=$this->getDoctrine()->getRepository(Proveidors::class)->getByName($cerca->getA());
        }
        return $this->render('views/cerca_eliminar.html.twig',[
            'form'=>$form->createView(),
        ]);
    }
}

?>
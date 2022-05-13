<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Buit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends AbstractController
{
    /**
     * @Route("",name="home")
     */
    public function new(Request $request)
    {
        
        $buit=new Buit();
        $buit->setA('a');
        $nouProveidor=$this->createFormBuilder($buit)
            ->add('nouProveidor', SubmitType::class, ['label'=>'Nou Proveidor'])
            ->getForm();
        $nouProveidor->handleRequest($request);
        
        if ($nouProveidor->isSubmitted() && $nouProveidor->isValid()) { 
            return $this->redirectToRoute('nou_proveidor');
        }

        $eliminarProveidor=$this->createFormBuilder($buit)
            ->add('eliminarProveidor', SubmitType::class, ['label'=>'Editar/Eliminar Proveidor'])
            ->getForm();
        $eliminarProveidor->handleRequest($request);
        
        if ($eliminarProveidor->isSubmitted() && $eliminarProveidor->isValid()) { 
            return $this->redirectToRoute('eliminar_proveidor');
        }
        
        $veureProveidor=$this->createFormBuilder($buit)
            ->add('veureProveidor', SubmitType::class, ['label'=>'Veure Proveidors'])
            ->getForm();
        
        $veureProveidor->handleRequest($request);
        
        if ($veureProveidor->isSubmitted() && $veureProveidor->isValid()) { 
            return $this->redirectToRoute('veure_proveidors');
        }

        return $this->render('views/home.html.twig',
                                ['nouProveidor'=>$nouProveidor->createView(),
                                'eliminarProveidor'=>$eliminarProveidor->createView(),
                                'veureProveidors'=>$veureProveidor->createView()
                            ]);
    }
}
?>
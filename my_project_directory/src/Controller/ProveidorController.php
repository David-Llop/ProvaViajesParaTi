<?php

namespace App\Controller;

use App\Entity\Proveidors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ProveidorController extends AbstractController
{
    /**
     * @Route("/proveidor",name="nou_proveidor")
     */
    public function new(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $proveidor = new Proveidors();
        $proveidor->setNom('A');
        $proveidor->setMail('a@a.a');
        $proveidor->setTelf('123456789');
        $proveidor->setTipus('poma');
        $proveidor->setActiu(TRUE);
        $proveidor->setInsert(time());
        $proveidor->setUpdate(time());
        
        $form  = $this->createFormBuilder($proveidor)
            ->add('nom',TextType::class)
            ->add('mail',EmailType::class)
            ->add('telf', TelType::class)
            ->add('tipus', ChoiceType::class, [
                'choices' => [
                    'Hotel' => 'Hotel',
                    'Pista' => 'Pista',
                    'Complement' => 'Complement',
                ],
            ])
            ->add('actiu', CheckboxType::class, ['label'=>'Actiu', 'required' => false,])
            ->add('desa', SubmitType::class, ['label'=>'Desar'])
            ->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $proveidor=$form->getData();
            $proveidor->setInsert(time());
            $proveidor->setUpdate(time());
            $entityManager->persist($proveidor);
            $entityManager->flush();
            //$this->getDoctrine()->getRepository(Proveidor::class)->insert($proveidor);
            return $this->redirectToRoute('home');
        }
        return $this->render('views/nou_proveidor.html.twig', ['form' => $form->createView(),]);
    }
    

}

?>
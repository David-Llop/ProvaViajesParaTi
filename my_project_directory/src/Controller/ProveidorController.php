<?php

namespace App\Controller;

use App\Entity\Proveidor;
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

class ProveidorController extends AbstractController
{
    /**
     * @Route("/proveidor")
     */
    public function new(): Response
    {
        $proveidor = new Proveidor();
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
            ->add('actiu', CheckboxType::class, ['label'=>'Actiu'])
            ->add('desa', SubmitType::class, ['label'=>'Desar'])
            ->getForm();
        return $this->render('views/nou_proveidor.html.twig', ['form' => $form->createView(),]);
    }
    

}

?>
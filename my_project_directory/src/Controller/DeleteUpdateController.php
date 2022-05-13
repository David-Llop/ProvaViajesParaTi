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

class DeleteUpdateController extends AbstractController
{
    /**
     * @Route("/modificar/{id}", name="modificar")
     */
    public function index(Request $request, $id): Response
    {
        $proveidor=$this->getDoctrine()->getRepository(Proveidors::class)->getById($id);
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
            ->add('suprimeix', SubmitType::class, ['label'=>'Eliminar'])
            ->getForm();

        return $this->render('views/tots.html.twig',[
            'proveidors'=>$proveidor//form->createView()
       ]);
    }
}

?>
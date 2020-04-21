<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('client', NumberType::class, array('attr' => array('placeholder' =>
                'N° client'), 'constraints' => array(new NotBlank(array("message" => "Merci de
                renseigner le N° du client.")))))

            ->add('date', DateType::class, array('attr' => array('placeholder' =>
                'Nom client'), 'constraints' => array(new NotBlank(array("message" => "Merci de
                renseigner le nom du client.")))))

            ->add('PDF', FileType::class, array('attr' => array('placeholder' =>
                'Nom client'), 'constraints' => array(new NotBlank(array("message" => "Merci de
                renseigner le nom du client.")))));*/
        $builder
            ->add('nom', TextType::class, array('attr' => array('placeholder' =>
                'N° client'), 'constraints' => array(new NotBlank(array("message" => "Merci de
                renseigner le N° du client.")))));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'error_bubbling' => true
        ]);
    }
}

<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use App\Entity\Booking;
use App\Entity\Rate;
use App\Entity\Type;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstName')
            ->add('country', CountryType::class,[
              'data' => 'FR',
            ])
            ->add('birthDate',TextType::class)
            ->add('rateId', CheckboxType::class,[
                'mapped'=>false,
                'required' => false,
                'value'=>'Réduit'
            ])
            ->add('typeId', EntityType::class, [
              'class' => Type::class,
              'choice_label' => function($rate){
                return $rate->getLabelForm();
              }
            ])
            ->add('visitDate',TextType::class,[
              'data' => date_format(new \DateTime(),'Y-m-d H:i:s')
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}

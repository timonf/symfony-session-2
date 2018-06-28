<?php

namespace App\Form;

use App\Entity\Vessel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VesselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('imo')
            ->add('country'/*, CountryType::class*/)
            ->add('built', DateType::class, [
                'format' => 'dd.MM.yyyy',
                'years' => range(1950,2000),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vessel::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Relacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RelacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fechaRelacion')
            ->add('descripcion')
            ->add('resumen')
            ->add('usuario')
            ->add('norma')
            ->add('complementada')
            ->add('tipoRelacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Relacion::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\PostPub;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PubPostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('date')
            ->add('Code_Postal')
            ->add('Pays')
            ->add('Pub')
            ->add('pub')
            ->add('genre')
            ->add('auteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PostPub::class,
        ]);
    }
}

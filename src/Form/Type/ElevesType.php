<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ElevesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('idClasse', 'choice', array(
                'choices' => array(
                    null => '-- Sélectionner une classe --',
                    1 => '6ième A',
                    2 => '6ième B',
                    3 => '5ième A',
                    4 => '5ième B',
                    5 => '4ième A',
                    6 => '4ième B',
                    7 => '3ième A',
                    8 => '3ième B')
            ))
            ->add('idSexe', 'choice', array(
                'choices' => array(
                    null => '-- Sélectionner --',
                    1 => 'Garçon',
                    2 => 'Fille'
                   /* , 3 => 'Transexuel'*/
                )
            ))
            ->add('idUtilisateur', 'choice', array(
                'choices' => array(
                    2 => 'UTILISATEUR')
            ))
            ;
    }

    public function getName()
    {
        return 'eleves';
    }
}

<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Projet_web\DAO\NiveauxDAO;

class ClassesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('idNiveau', 'choice', array(
                'choices' => array(
                    null => '-- Sélectionner un niveau --',
                    1 => '6ème',
                    2 => '5ème',
                    3 => '4ème',
                    4 => '3ème')
            ))
            ->add('idAnnee', 'choice', array(
                'choices' => array(
                    null => '-- Sélectionner une Année --',
                    1 => '2016-2017',
                    2 => '2017-2018')
            ));
    }

    public function getName()
    {
        return 'classe';
    }

}

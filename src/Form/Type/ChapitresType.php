<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Projet_web\DAO\NiveauxDAO;

class ChapitresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text')
            ->add('idNiveau', 'choice', array(
                'choices' => array(
                    null => '-- Sélectionner un Niveaux --',
                    1 => '6ème',
                    2 => '5ème',
                    3 => '4ème',
                    4 => '3ème')
            ));
    }

    public function getName()
    {
        return 'chapitres';
    }

}

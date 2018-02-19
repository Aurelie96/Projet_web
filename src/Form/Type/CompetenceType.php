<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Projet_web\DAO\ChapitresDAO;

class CompetenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
                ->add('titre', 'text')
                ->add('idChapitre', 'choice', array(
                    'choices' => array(
                        null => '-- Sélectionner un Chapitre --',
                        1 => 'chapitre 1',
                        2 => 'chapitre 2',
                        3 => 'chapitre 3',
                        4 => 'chapitre 4',
                        5 => 'chapitre 5',
                        6 => 'chapitre 6',
                        7 => 'chapitre 7',
                        8 => 'chapitre 8')
                ))
                ;
    }

    public function getName()
    {
        return 'competences';
    }
}

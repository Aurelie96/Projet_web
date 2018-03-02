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
                        47 => 'Cours sur les volumes et les pavés droits',
                        46 => 'Cours sur les symétries axiales',
                        45 => 'Cours sur l aire et le périmètre',
                        44 => 'Cours sur les angles et leur mesure',
                        43 => 'Cours sur les figures planes',
                        42 => 'Cours sur l organisation et la représentation de données',
                        41 => 'Cours sur la proportionnalité et les pou centages',
                        40 => 'Cours sur les fractions',
                        39 => 'Cours sur les opérations',
                        38 => 'Cours sur les nombres entiers et les nombres décimaux',
                        37 => 'Cours sur le prisme et le cylindre',
                        36 => 'Cours sur les aires',
                        35 => 'Cours sur les parallélogrammes',
                        34 => 'Cours sur angles et parallèles',
                        33 => 'Cours sur la symétrie centrale',
                        32 => 'Cours sur les triangles',
                        31 => 'Cours sur les statistiques',
                        30 => 'Cours sur le calcCul littéral, équations',
                        29 => 'Cours sur les nombres relatifs',
                        28 => 'Cours sur la proportionnalité',
                        27 => 'Cours sur les fractions',
                        26 => 'Cours sur les opérations sur les nombres entiers et décimaux positifs',
                        25 => 'Cours sur les pyramides et les cônes',
                        24 => 'Cours sur le cosinus',
                        23 => 'Cours sur les droites remarquables du triangle',
                        22 => 'Cours sur les triangles et parallèles',
                        21 => 'Cours sur le théorème de Pythagore',
                        20 => 'Cours sur le triangle rectangle',
                        19 => 'Cours sur les statistiques',
                        18 => 'Cours sur la proportionnalité',
                        17 => 'Cours sur les puissances',
                        16 => 'Cours sur les équations et négalités',
                        15 => 'Cours sur le calcul littéral',
                        14 => 'Cours sur les fractions',
                        13 => 'Cours sur les nombres relatifs',
                        12 => 'Cours sur les angles et polygones',
                        11 => 'Cours sur la géométrie dans l espace',
                        10 => 'Cours sur la trigonométrie',
                        9 => 'Cours sur le théorème de Thales',
                        8 => 'Cours sur les statistiques et probabilités',
                        7 => 'Cours sur les fonctions linéaires et les fonctions affines',
                        6 => 'Cours sur les puissances et grandeurs',
                        5 => 'Cours sur les inégalités et les inéquations',
                        4 => 'Cours sur les systèmes d équations',
                        3 => 'Cours sur les racines carrées',
                        2 => 'Cours sur le calcul littéral et les équations',
                        1 => 'Cours sur les nombres entiers et rationnels')
                ))
                ;
    }

    public function getName()
    {
        return 'competences';
    }
}

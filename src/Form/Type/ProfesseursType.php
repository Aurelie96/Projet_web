<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfesseursType extends AbstractType
{
    public function getName()
    {
        return 'user';
    }
}

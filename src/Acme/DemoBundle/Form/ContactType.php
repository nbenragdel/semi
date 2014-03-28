<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('message', 'textarea');
        //$this->get('session')->remove('email');
        //$this->get('session')->remove('pass');
        //$this->get('session')->remove('valid');
    }

    public function getName()
    {
        return 'contact';
    }
}

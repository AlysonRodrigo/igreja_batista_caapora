<?php

namespace Cookiesoft\Forms;

use Kris\LaravelFormBuilder\Form;

class UserProfileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('uf', 'text')
            ->add('cep', 'text')
            ->add('cidade', 'text')
            ->add('rua', 'text')
            ->add('numero', 'text')
            ->add('complemento', 'text');
    }
}

<?php

namespace Cookiesoft\Forms;

use Kris\LaravelFormBuilder\Form;

class NoticiaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text')
            ->add('descricao', 'textarea');
    }
}

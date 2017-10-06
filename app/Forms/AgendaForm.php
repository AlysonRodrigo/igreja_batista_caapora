<?php

namespace Cookiesoft\Forms;

use Kris\LaravelFormBuilder\Form;

class AgendaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text')
            ->add('descricao', 'textarea')
            ->add('dt_evento', 'date',[
                'label' => 'Data do evento'
            ])
            ->add('hr_evento', 'text',[
                'label' => 'Horario do evento'
            ])
            ->add('local', 'text');
    }
}

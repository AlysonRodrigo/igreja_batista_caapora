<?php

namespace Cookiesoft\Forms;

use Cookiesoft\Models\User;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('sexo', 'select', [
                'choices' => ['Masculino' => 'Masculino', 'Feminino' => 'Feminino'],
                'selected' => 'Masculino',
                'empty_value' => '=== Selecione o sexo ==='
            ])
            ->add('role', 'select', [
                'choices' => [User::ROLE_ADMIN => 'Administrador', User::ROLE_CLIENT => 'Cliente'],
                'selected' => User::ROLE_ADMIN,
                'empty_value' => '=== Selecione o perfil ==='
            ])
            ->add('password','password',[
                'label' => 'Senha'
            ])
            ->add('data_nascimento', 'date');
    }
}

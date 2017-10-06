<?php

namespace Cookiesoft\Http\Controllers\Admin;

use Cookiesoft\Forms\UserForm;
use Cookiesoft\Forms\UserProfileForm;
use Cookiesoft\Models\User;
use Illuminate\Http\Request;
use Cookiesoft\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(UserForm::class,[
            'url' => route('admin.users.store'),
            'method' => 'POST'
        ]);
        return view('admin.users.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var UserForm $form */
        $form = \FormBuilder::create(UserForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        $request->session()->flash('message', 'Usuário cadastro com sucesso');

        return redirect()->route('admin.users.index');

    }

    public function showDetails(){
        $userData = session('user_created');
        $user = User::findOrFail($userData['id']);
        $user->password = $userData['password'];

        return view('admin.users.show_details',compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('admin.users.detalhes',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $form = \FormBuilder::create(UserForm::class,[
            'url' => route('admin.users.update',['id' => $user->id]),
            'method' => 'PUT',
            'model' => $user
        ]);

        $form->remove('password');
        $form->remove('role');

        return view('admin.users.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $form = \FormBuilder::create(UserForm::class);


        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }


        $data = array_except($form->getFieldValues(),['password','role']);
        $user->fill($data);
        $user->save();
        $request->session()->flash('message', 'Usuário alterado com sucesso');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');

    }
}

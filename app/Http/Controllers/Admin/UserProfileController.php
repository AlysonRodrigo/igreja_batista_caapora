<?php

namespace Cookiesoft\Http\Controllers\Admin;

use Cookiesoft\Forms\UserProfileForm;
use Cookiesoft\Http\Requests\ProfileImageRequest;
use Cookiesoft\Models\ProfileImage;
use Cookiesoft\Models\User;
use Cookiesoft\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Cookiesoft\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserProfileForm::class, [
            'url' => route('admin.users.profile.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user->profile,
            'data' => ['user' => $user]
        ]);
        return view('admin.users.profile.edit', compact('form'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Cookiesoft\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $form = \FormBuilder::create(UserProfileForm::class);
        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $user->profile->address?$user->profile->update($data):$user->profile()->create($data);
        session()->flash('message', 'Perfil alterado com sucesso.');
        return redirect()->route('admin.users.profile.update', ['user' => $user->id]);
    }

    public function photo(User $user){

        return view('admin.users.profile.photo',compact('user'));
    }

    public function storeImage(ProfileImageRequest $request, $id, ProfileImage $profileImage){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $profileImage::create(['user_id'=>$id,'extension'=>$extension]);
        // Public local Storage para adicionar
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        // S3 Storage para adicionar
        //Storage::disk('s3')->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('admin.users.show',['id' => $id]);
    }
}

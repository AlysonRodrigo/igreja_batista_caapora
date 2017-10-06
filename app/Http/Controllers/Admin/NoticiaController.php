<?php

namespace Cookiesoft\Http\Controllers\Admin;

use Cookiesoft\Forms\NoticiaForm;
use Cookiesoft\Models\Noticia;
use Illuminate\Http\Request;
use Cookiesoft\Http\Controllers\Controller;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::paginate();
        return view('admin.noticia.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(NoticiaForm::class,[
            'url' => route('admin.noticia.store'),
            'method' => 'POST'
        ]);
        return view('admin.noticia.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var NoticiaForm $form */
        $form = \FormBuilder::create(NoticiaForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Noticia::create($data);
        $request->session()->flash('message', 'Noticia cadastrada com sucesso');

        return redirect()->route('admin.noticia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return view('admin.noticia.show',compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        $form = \FormBuilder::create(NoticiaForm::class,[
            'url' => route('admin.agenda.update',['id' => $noticia->id]),
            'method' => 'PUT',
            'model' => $noticia
        ]);

        return view('admin.noticia.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $form = \FormBuilder::create(NoticiaForm::class);


        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }


        $data = $form->getFieldValues();
        $noticia->fill($data);
        $noticia->save();
        $request->session()->flash('message', 'Noticia alterada com sucesso');
        return redirect()->route('admin.noticia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('admin.noticia.index');
    }
}

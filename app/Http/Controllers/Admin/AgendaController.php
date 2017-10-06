<?php

namespace Cookiesoft\Http\Controllers\Admin;

use Cookiesoft\Forms\AgendaForm;
use Cookiesoft\Models\Agenda;
use Cookiesoft\Models\User;
use Illuminate\Http\Request;
use Cookiesoft\Http\Controllers\Controller;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::paginate();
        return view('admin.agenda.index',compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(AgendaForm::class,[
            'url' => route('admin.agenda.store'),
            'method' => 'POST'
        ]);
        return view('admin.agenda.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var AgendaForm $form */
        $form = \FormBuilder::create(AgendaForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Agenda::create($data);
        $request->session()->flash('message', 'Agenda cadastrada com sucesso');

        return redirect()->route('admin.agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('admin.agenda.show',compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $form = \FormBuilder::create(AgendaForm::class,[
            'url' => route('admin.agenda.update',['id' => $agenda->id]),
            'method' => 'PUT',
            'model' => $agenda
        ]);

        return view('admin.agenda.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $form = \FormBuilder::create(AgendaForm::class);


        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }


        $data = $form->getFieldValues();
        $agenda->fill($data);
        $agenda->save();
        $request->session()->flash('message', 'Evento alterado com sucesso');
        return redirect()->route('admin.agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactFieldRequest;
use App\Http\Requests\StoreContactFieldRequest;
use App\Http\Requests\UpdateContactFieldRequest;
use App\Models\About;
use App\Models\ContactField;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactFieldController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_field_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactFields = ContactField::with(['about'])->get();

        return view('admin.contactFields.index', compact('contactFields'));
    }

    public function create()
    {
        abort_if(Gate::denies('contact_field_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abouts = About::pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contactFields.create', compact('abouts'));
    }

    public function store(StoreContactFieldRequest $request)
    {
        $contactField = ContactField::create($request->all());

        return redirect()->route('admin.contact-fields.index');
    }

    public function edit(ContactField $contactField)
    {
        abort_if(Gate::denies('contact_field_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abouts = About::pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contactField->load('about');

        return view('admin.contactFields.edit', compact('abouts', 'contactField'));
    }

    public function update(UpdateContactFieldRequest $request, ContactField $contactField)
    {
        $contactField->update($request->all());

        return redirect()->route('admin.contact-fields.index');
    }

    public function show(ContactField $contactField)
    {
        abort_if(Gate::denies('contact_field_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactField->load('about');

        return view('admin.contactFields.show', compact('contactField'));
    }

    public function destroy(ContactField $contactField)
    {
        abort_if(Gate::denies('contact_field_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactField->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactFieldRequest $request)
    {
        ContactField::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

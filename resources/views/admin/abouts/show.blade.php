@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.about.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.id') }}
                        </th>
                        <td>
                            {{ $about->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.title_en') }}
                        </th>
                        <td>
                            {{ $about->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $about->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.logo') }}
                        </th>
                        <td>
                            @if($about->logo)
                                <a href="{{ $about->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $about->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.description_en') }}
                        </th>
                        <td>
                            {{ $about->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $about->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.key_words_en') }}
                        </th>
                        <td>
                            {{ $about->key_words_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.key_words_ar') }}
                        </th>
                        <td>
                            {{ $about->key_words_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.phone') }}
                        </th>
                        <td>
                            {{ $about->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.email') }}
                        </th>
                        <td>
                            {{ $about->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.website') }}
                        </th>
                        <td>
                            {{ $about->website }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#about_contact_fields" role="tab" data-toggle="tab">
                {{ trans('cruds.contactField.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="about_contact_fields">
            @includeIf('admin.abouts.relationships.aboutContactFields', ['contactFields' => $about->aboutContactFields])
        </div>
    </div>
</div>

@endsection
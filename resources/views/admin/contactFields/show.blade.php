@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contactField.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-fields.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contactField.fields.id') }}
                        </th>
                        <td>
                            {{ $contactField->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactField.fields.title') }}
                        </th>
                        <td>
                            {{ $contactField->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactField.fields.value') }}
                        </th>
                        <td>
                            {{ $contactField->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactField.fields.about') }}
                        </th>
                        <td>
                            {{ $contactField->about->title_en ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-fields.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.id') }}
                        </th>
                        <td>
                            {{ $partner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.image') }}
                        </th>
                        <td>
                            @if($partner->image)
                                <a href="{{ $partner->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $partner->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.name_en') }}
                        </th>
                        <td>
                            {{ $partner->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.name_ar') }}
                        </th>
                        <td>
                            {{ $partner->name_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.job_title_en') }}
                        </th>
                        <td>
                            {{ $partner->job_title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.job_title_ar') }}
                        </th>
                        <td>
                            {{ $partner->job_title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.description_en') }}
                        </th>
                        <td>
                            {{ $partner->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $partner->description_ar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.page.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <td>
                            {{ $page->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.image') }}
                        </th>
                        <td>
                            @if($page->image)
                                <a href="{{ $page->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $page->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.description_en') }}
                        </th>
                        <td>
                            {!! $page->description_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.description_ar') }}
                        </th>
                        <td>
                            {!! $page->description_ar !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.title_en') }}
                        </th>
                        <td>
                            {{ $page->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $page->title_ar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contactField.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contact-fields.update", [$contactField->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.contactField.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $contactField->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactField.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.contactField.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $contactField->value) }}" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactField.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_id">{{ trans('cruds.contactField.fields.about') }}</label>
                <select class="form-control select2 {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about_id" id="about_id" required>
                    @foreach($abouts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('about_id') ? old('about_id') : $contactField->about->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactField.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
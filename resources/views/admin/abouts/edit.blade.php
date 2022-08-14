@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.about.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.abouts.update", [$about->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.about.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', $about->title_en) }}" required>
                @if($errors->has('title_en'))
                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ar">{{ trans('cruds.about.fields.title_ar') }}</label>
                <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $about->title_ar) }}" required>
                @if($errors->has('title_ar'))
                    <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.about.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description_en">{{ trans('cruds.about.fields.description_en') }}</label>
                <textarea class="form-control {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en" required>{{ old('description_en', $about->description_en) }}</textarea>
                @if($errors->has('description_en'))
                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_ar">{{ trans('cruds.about.fields.description_ar') }}</label>
                <textarea class="form-control {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{{ old('description_ar', $about->description_ar) }}</textarea>
                @if($errors->has('description_ar'))
                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.description_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="key_words_en">{{ trans('cruds.about.fields.key_words_en') }}</label>
                <textarea class="form-control {{ $errors->has('key_words_en') ? 'is-invalid' : '' }}" name="key_words_en" id="key_words_en">{{ old('key_words_en', $about->key_words_en) }}</textarea>
                @if($errors->has('key_words_en'))
                    <span class="text-danger">{{ $errors->first('key_words_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.key_words_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="key_words_ar">{{ trans('cruds.about.fields.key_words_ar') }}</label>
                <textarea class="form-control {{ $errors->has('key_words_ar') ? 'is-invalid' : '' }}" name="key_words_ar" id="key_words_ar" required>{{ old('key_words_ar', $about->key_words_ar) }}</textarea>
                @if($errors->has('key_words_ar'))
                    <span class="text-danger">{{ $errors->first('key_words_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.key_words_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.about.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $about->phone) }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.about.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $about->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="website">{{ trans('cruds.about.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $about->website) }}" required>
                @if($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.website_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.abouts.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($about) && $about->logo)
      var file = {!! json_encode($about->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection
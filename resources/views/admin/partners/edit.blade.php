@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partners.update", [$partner->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.partner.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.partner.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $partner->name_en) }}" required>
                @if($errors->has('name_en'))
                    <span class="text-danger">{{ $errors->first('name_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ar">{{ trans('cruds.partner.fields.name_ar') }}</label>
                <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $partner->name_ar) }}" required>
                @if($errors->has('name_ar'))
                    <span class="text-danger">{{ $errors->first('name_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.name_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job_title_en">{{ trans('cruds.partner.fields.job_title_en') }}</label>
                <input class="form-control {{ $errors->has('job_title_en') ? 'is-invalid' : '' }}" type="text" name="job_title_en" id="job_title_en" value="{{ old('job_title_en', $partner->job_title_en) }}" required>
                @if($errors->has('job_title_en'))
                    <span class="text-danger">{{ $errors->first('job_title_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.job_title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job_title_ar">{{ trans('cruds.partner.fields.job_title_ar') }}</label>
                <input class="form-control {{ $errors->has('job_title_ar') ? 'is-invalid' : '' }}" type="text" name="job_title_ar" id="job_title_ar" value="{{ old('job_title_ar', $partner->job_title_ar) }}" required>
                @if($errors->has('job_title_ar'))
                    <span class="text-danger">{{ $errors->first('job_title_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.job_title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description_en">{{ trans('cruds.partner.fields.description_en') }}</label>
                <textarea class="form-control {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en" required>{{ old('description_en', $partner->description_en) }}</textarea>
                @if($errors->has('description_en'))
                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description_ar">{{ trans('cruds.partner.fields.description_ar') }}</label>
                <textarea class="form-control {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar" required>{{ old('description_ar', $partner->description_ar) }}</textarea>
                @if($errors->has('description_ar'))
                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.description_ar_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.partners.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($partner) && $partner->image)
      var file = {!! json_encode($partner->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
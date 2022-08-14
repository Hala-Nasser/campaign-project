@extends('layouts.admin')
@section('content')
@can('about_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.abouts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.about.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.about.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-About">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.about.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.title_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.description_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.description_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.key_words_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.key_words_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.about.fields.website') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abouts as $key => $about)
                        <tr data-entry-id="{{ $about->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $about->id ?? '' }}
                            </td>
                            <td>
                                {{ $about->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $about->title_ar ?? '' }}
                            </td>
                            <td>
                                @if($about->logo)
                                    <a href="{{ $about->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $about->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $about->description_en ?? '' }}
                            </td>
                            <td>
                                {{ $about->description_ar ?? '' }}
                            </td>
                            <td>
                                {{ $about->key_words_en ?? '' }}
                            </td>
                            <td>
                                {{ $about->key_words_ar ?? '' }}
                            </td>
                            <td>
                                {{ $about->phone ?? '' }}
                            </td>
                            <td>
                                {{ $about->email ?? '' }}
                            </td>
                            <td>
                                {{ $about->website ?? '' }}
                            </td>
                            <td>
                                @can('about_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.abouts.show', $about->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('about_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.abouts.edit', $about->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('about_delete')
                                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('about_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.abouts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-About:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
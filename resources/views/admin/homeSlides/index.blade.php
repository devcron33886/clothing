@extends('layouts.admin')
@section('content')
@can('home_slide_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.home-slides.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.homeSlide.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.homeSlide.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HomeSlide">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.homeSlide.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeSlide.fields.header') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeSlide.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeSlide.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeSlide.fields.is_active') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeSlide.fields.show_text') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homeSlides as $key => $homeSlide)
                        <tr data-entry-id="{{ $homeSlide->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $homeSlide->id ?? '' }}
                            </td>
                            <td>
                                {{ $homeSlide->header ?? '' }}
                            </td>
                            <td>
                                {{ $homeSlide->description ?? '' }}
                            </td>
                            <td>
                                @if($homeSlide->image)
                                    <a href="{{ $homeSlide->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $homeSlide->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $homeSlide->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $homeSlide->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $homeSlide->show_text ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $homeSlide->show_text ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('home_slide_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.home-slides.show', $homeSlide->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('home_slide_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.home-slides.edit', $homeSlide->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('home_slide_delete')
                                    <form action="{{ route('admin.home-slides.destroy', $homeSlide->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('home_slide_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.home-slides.massDestroy') }}",
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
  let table = $('.datatable-HomeSlide:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
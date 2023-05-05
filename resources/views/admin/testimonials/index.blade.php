@extends("layouts.admin")
@section("title","Testimonial management")

@section("title-side")
<a href="{{asset('admin/testimonial/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>Add</span>
    </span>
</a>
@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <div id="m_tabale_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    @if($items->count()>0)
                    <table
                        class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
                        id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1150px;">
                        <thead>
                            <tr role="row">
                                <th>
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-group-checkable">
                                        <span></span>
                                    </label>
                                </th>
                                <th>name</th>
                                <th>Subject</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th width='15%'>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr role="row" class="odd">
                                <td width="5%" class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>
                                    <img style="width: 50px;" src="{{ asset('storage/images/'.$item->image)}}" />
                                </td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->active }}</td>

                                <td width="15%">

                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('testimonial.edit',$item->id)}}" title="edit"><i
                                            class="la la-edit"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('testimonial.delete',$item->id)}}"
                                        onclick="return confirm('Are you sure to delete {{$item->name}} ?')" title="delete"><i
                                            class="la la-remove"></i> </a>
                                </td>
        </tr>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class='alert alert-info'><b>Sorry</b>! No Result Avalible
                        <button type="button" class="close pt-0" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                </div>
            </div>
        </div>

</div>
</div>


@endsection

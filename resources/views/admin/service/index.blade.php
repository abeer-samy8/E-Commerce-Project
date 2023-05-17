@extends("layouts.admin")
@section("title","Services Management")
@section("title-side")
<a href="{{asset('admin/service/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
        Add New Services
        </span>
    </span>
</a>
@endsection





@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form class='mb-3'>
            <div class="row">
                <div class='col-6'>
                    <input name='q' id='q' value='{{request()->q}}' autofocus type="text" class='form-control  p-4'
                        placeholder="Search Here ..." />
                </div>


                <div class='col-2'>
                <select name='status' id='status' class='select2 form-control'>
                    <option value=''>Status</option>
                    <option {{ request()->status == \App\Models\Service::STATUS_ACTIVE ? "selected" : "" }} value='{{ \App\Models\Service::STATUS_ACTIVE }}'>Active</option>
                    <option {{ request()->status == \App\Models\Service::STATUS_INACTIVE ? "selected" : "" }} value='{{ \App\Models\Service::STATUS_INACTIVE }}'>Inactive</option>
                </select>
            </div>

                <div class='col-4'>
                    <input type="submit" class='btn btn-primary mr-2' value='Search' />
                    <input type="submit" class='btn btn-secondary' value='Clear search'
                        onclick="document.getElementById('q').value = ''; document.getElementById('category').value = ''; document.getElementById('store').value = ''; document.getElementById('status').value = ''; return true;" />
                </div>

            </div>
        </form>
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                <th>Service</th>
                                <th>Summery</th>
                                <th>Status</th>
                                <th>Image</th>
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
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->summary }}</td>
                                <td>{{ $item->status == \App\Models\Service::STATUS_ACTIVE ? 'Active' : 'Inactive' }}</td>
                                <td><img style="width: 100px;" src="{{asset('storage/images/'.$item->image)}}"/>
                                <div class="m-spinner"></div>
                                </td>   
                                <td width="15%">

                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('service.edit',$item->id)}}" title="edit"><i
                                            class="la la-edit"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('service.delete',$item->id)}}"
                                        onclick="return confirm('Are you sure to delete {{$item->name}} ?')" title="delete"><i
                                            class="la la-remove"></i> </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $items->links() }}
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

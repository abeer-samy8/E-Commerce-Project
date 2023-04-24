@extends('layouts.admin')
@section('title','Stores Management')

@section("title-side")
<a href="{{asset('admin/store/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
        Add New Store
        </span>
    </span>
</a>
@endsection


@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form>
            <div class='row mb-3'>
                <div class='col-sm-11'>
                    <input type='text' value="{{request()->q}}" name="q" class='form-control'
                        placeholder='Enter Search Keyword Here'/>
                </div>

                <div class='col-sm-1 text-right'>
                    <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i></button>
                </div>
            </div>
        </form>
        <!--begin: Datatable -->
        @if($items->count()>0)
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th width='10%'>
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-group-checkable">
                                        <span></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th width='15%'>
                                    Last Update</th>

                                <th width='15%'>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr role="row" class="odd">
                                <td >
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('store.show',$item->id)}}" title="Show"><i
                                            class="la la-eye"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('store.edit',$item->id)}}" title="Edit"><i
                                            class="la la-edit"></i> </a>
                                            <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('store.delete',$item->id)}}"
                                        onclick="return confirm('Are you sure to  delete{{$item->name}} ?')" title="delete"><i
                                            class="la la-remove"></i> </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info"> There are no results in the search... </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

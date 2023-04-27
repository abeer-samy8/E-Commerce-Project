@extends("layouts.admin")
@section("title","Customer Management")

@section("title-side")

@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form class='row mb-3'>
            <div class='col-sm-8'>
                <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control'
                    placeholder="Enter your search ..." />
            </div>
            <div class='col-sm-1'>
                <button class='btn btn-primary' value='Search'><i class='fa fa-search'></i></button>
            </div>

        </form>
        @if($items->count()>0)
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th >Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{$item -> user->name??""}}</td>
                    <td>{{$item -> user->email??""}}</td>
                    <td>{{ $item->city }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('customer.show',$item->id)}}" title="Show"><i
                                            class="la la-eye"></i> </a>

                                            <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('customer.delete',$item->id)}}"
                                        onclick="return confirm('Are you sure to  delete{{$item->name}} ?')" title="delete"><i
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

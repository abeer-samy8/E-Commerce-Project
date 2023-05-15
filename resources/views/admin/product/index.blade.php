@extends("layouts.admin")
@section("title", "Products Management ")
@section("css")
<style>
    .cbActive+div{
        display:none;
    }
</style>
@endsection
@section("title-side")

<a href="{{asset('admin/product/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            Add New Product
        </span>
    </span>
</a>
@endsection

@section("js")
    <script>
        $(function(){
            $(".cbActive").click(function(){
                var id= $(this).val();
                var cb = $(this);
                $(this).hide();
                $(this).next().show();

                $.get('/admin/product/'+id+'/activate',function(){
                    // alert("Updated successfully")
                    $(cb).next().hide();
                    $(cb).show();
                })
            })
        })
    </script>
@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form class='mb-3'>
            <div class="row">
                <div class='col-2'>
                    <input name='q' id='q' value='{{request()->q}}' autofocus type="text" class='form-control  p-4'
                        placeholder="Search Here ..." />
                </div>
                <div class='col-2'>
                    <select name='category' id='category' class='select2 form-control '>
                        <option value=''>Category</option>
                        @foreach($categories as $category)
                        <option {{request()->category==$category->id?"selected":""}} value="{{$category->id}}">
                            {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='col-2'>
                    <select name='store' id='store' class='select2 form-control '>
                        <option value=''>Store</option>
                        @foreach($stores as $store)
                        <option {{request()->store==$store->id?"selected":""}} value="{{$store->id}}">
                            {{$store->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='col-2'>
                    <select name='status' id='status' class='select2 form-control'>
                        <option value=''>Status</option>
                        <option {{ request()->active=='Active'?"selected":"" }} value='active'>Active</option>
                        <option {{ request()->Inactive=='0'?"selected":"" }} value='inactive'>Inactive</option>
                    </select>
                </div>



                <div class='col-4'>
                    <input type="submit" class='btn btn-primary mr-2' value='Search' />
                    <input type="submit" class='btn btn-secondary' value='Clear search'
                        onclick="document.getElementById('q').value = ''; document.getElementById('category').value = ''; document.getElementById('store').value = ''; document.getElementById('active').value = ''; return true;" />
                </div>

            </div>
        </form>
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    @if($products->count()>0)
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
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Store</th>
                                <th>Normal Price</th>
                                <th>Sale Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th width='15%'>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr role="row" class="odd">
                                <td width="5%" class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{$product->category->name??''}}</td>
                                <td>{{$product->store->name??''}}</td>
                                <td>{{ $product->currency->symbol ?? '' }}{{ $product->regular_price ?? 0 }}</td>
                                <td>{{ $product->currency->symbol ?? '' }}{{ $product->sale_price ?? 0 }}</td>

                                <td>{{ $product->quantity }}</td>
                                <td align="center"><input value="{{ $product->id }}" type="checkbox" class="cbActive" {{ $product->status == 'active' ? 'checked' : '' }} /></td>
                                </td>
                                <td><img height=50 width= 50 src='{{asset("storage/assets/img/{$product->main_image}")}}' alt=""></td>
                                <td width="15%">
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('product.show',$product->id)}}" title="show"><i
                                            class="la la-eye"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('product.edit',$product->id)}}" title="edit"><i
                                            class="la la-edit"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('product.delete',$product->id)}}"
                                        onclick="return confirm('Are you sure to delete {{$product->name}} ?')" title="delete"><i
                                            class="la la-remove"></i> </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
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

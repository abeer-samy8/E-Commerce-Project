@extends("layouts.admin")
@section("title", "Permissions  ")
@section("title-side")

@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method='post' action='{{route("users.post-links",$item->id)}}'>
    @csrf
    <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
            <ul class='links list-unstyled'>
            @foreach($links->where('parent_id',0) as $link)
                <li>
                    <label><input {{$link->users->where('id',$item->id)->count()?"checked":""}} name='links[]' type='checkbox' value='{{$link->id}}'  /><b> {{$link->title}}</b></label>
                </li>
                <ul class='links list-unstyled' style='padding-left:20px'>
                @foreach($links->where('parent_id',$link->id) as $subLink)
                <li>
                    <label><input {{$item->links->where('id',$subLink->id)->count()?"checked":""}}  name='links[]' type='checkbox' value='{{$subLink->id}}'/>  {{$subLink->title}}
                @endforeach
                </ul>
            @endforeach
            </ul>

        </div>
        <button class="btn btn-primary" type="submit">save permissions</button>
    <a class='btn btn-light' href='{{route("user.index")}}'>cancel</a>

    </div>
</form>
</div>

@endsection

@section("js")
<script>
    $(".links :checkbox").click(function(){
        $(this).parent().next().find(":checkbox")
            .prop("checked",$(this).prop("checked"));

        $(this).closest('ul').prev().find(":checkbox")
            .prop("checked",$(this).closest('ul').find(":checked").length>0)
    })
</script>
@endsection

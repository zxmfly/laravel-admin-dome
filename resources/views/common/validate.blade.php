@if($errors->count())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $value)
            <li>{{$value}}</li>
        @endforeach
    </ul>
</div>
@endif
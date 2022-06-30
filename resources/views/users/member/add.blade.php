@extends('users.home')
@section('content')
<div class="content-wrapper p-5">
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for="name"></label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
    </form>
</div>
@endsection
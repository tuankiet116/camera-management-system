@extends('layouts.main_users')
@section('content')
<div class="content-wrapper">
    @foreach ($data as $cam)
    <div class="card m-5">
        <div class="card-header">
            <h3 class="card-title" style="color: black">{{ $cam->name }}</h3>
        </div>
        <div class="card-body text-center">
            <a class="link-no-underline" href="{{ route('camera.stream', ['id' => $cam->id]) }}">
                <i class="fa-solid fa-camera" style="font-size: 200px;"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
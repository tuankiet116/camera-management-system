@extends('layouts.main_users')
@section('content')
<div class="content-wrapper">
    <div class="row" style="width: 100%;">
        <div class="col-3 p-5">
            <a class="link-no-underline" href="{{ route('camera.list') }}">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: black">{{ __('user.camera.list') }}</h3>
                    </div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-camera" style="font-size: 200px;"></i>
                    </div>
                    <div class="card-footer" style="color: black">
                        {{ __('user.camera.list_description') }}
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 p-5">
            <a class="link-no-underline" href="{{ route('camera.list') }}">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: black">{{ __('user.member.list') }}</h3>
                    </div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-people-roof" style="font-size: 200px"></i>
                    </div>
                    <div class="card-footer" style="color: black">
                        {{ __('user.member.list_description') }}
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 p-5">
            <a class="link-no-underline" href="{{ route('camera.list') }}">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: black">{{ __('user.setting.title') }}</h3>
                    </div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-gear" style="font-size: 200px"></i>
                    </div>
                    <div class="card-footer" style="color: black">
                        {{ __('user.setting.description') }}
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
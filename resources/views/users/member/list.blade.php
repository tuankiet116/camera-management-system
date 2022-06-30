@extends('users.home')
@section('content')
<div class="content-wrapper p-5">

    <div class="row">
        <button class="btn btn-primary col-2 mb-5">
            {{ __('user.member.add') }}
        </button>
    </div>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">{{ __('user.member.table_list.name') }}</th>
                </tr>
                <tr></tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td class="col-1 text-center">
                            {{ $member->id }}
                        </td>
                        <td class="col-8">
                            {{ $member->name }}
                        </td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-warning btn-sm mr-2">
                                {{ __('user.member.table_list.edit_btn') }}
                            </a>
                            <a class="btn btn-danger btn-sm ml-2">
                                {{ __('user.member.table_list.delete_btn') }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            {{ __('user.member.table_list.no_data') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
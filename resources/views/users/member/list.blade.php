@extends('users.home')
@section('content')
<div class="content-wrapper p-5">
    <div class="row">
        <a href="{{ route('member.add') }}" class="btn btn-primary col-2 mb-5">
            {{ __('user.member.add') }}
        </a>
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
                            <a href="{{ route('member.edit', ['id' => $member->id]) }}" class="btn btn-warning btn-sm mr-2">
                                {{ __('user.member.table_list.edit_btn') }}
                            </a>
                            <a id="{{ $member->id }}" class="btn btn-danger btn-sm ml-2 btn-delete">
                                <form method="post" action="{{ route('member.delete', ['id' => $member->id]) }}">
                                    @csrf
                                    {{ __('user.member.table_list.delete_btn') }}
                                </form>
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

<script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function() {
            let formDel = $(this).find('form');
            Swal.fire({
                title: 'Notice!',
                text: 'Are you sure you want to delete this member?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then(function(result) {
                if (result.isConfirmed) {
                    formDel.submit();
                }
            });
        });
    });
</script>
@endsection
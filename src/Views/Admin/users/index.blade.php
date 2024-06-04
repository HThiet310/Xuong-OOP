@extends('layouts.master')

@section('title')
    Danh sách User
@endsection

@section('content')
    <a class="btn btn-primary" href="{{ url('admin/users/create') }}">Thêm mới</a>

    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">
            {{ $_SESSION['msg'] }}
        </div>

        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    <table class="table table-striped">
        @foreach ($users as $user)
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['created_at'] ?></td>
                <td><?= $user['updated_at'] ?></td>
                <td>
                    <a class="btn btn-info" href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                        <a class="btn btn-warning" href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                        <a class="btn btn-danger" href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
                            onclick="return confirm('Chắc chắn xóa không?')">Xóa
                        </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
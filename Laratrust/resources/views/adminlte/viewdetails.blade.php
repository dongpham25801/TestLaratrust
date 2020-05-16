@extends('adminlte.layouts.main')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Descriptions</th>
            <th scope="col">Sửa</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $view->id }}</th>
                <td>{{  $view->name }}</td>
                <td>{{ $view->email }}</td>
                <td></td>
                <td>
                    <a href="{{ route('admin.edit', $view->id) }}">
                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    </a>
                </td>
            </tr>
{{--        @foreach($users as $view)--}}
{{--        <tr>--}}
{{--            <th scope="row">{{ $view->id }}</th>--}}
{{--            <td>{{ $view->name }}</td>--}}
{{--            <td>{{ $view->email }}</td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        @endforeach--}}
        </tbody>
    </table>

@endsection

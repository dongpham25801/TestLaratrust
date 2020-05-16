@extends('adminlte.layouts.main')
@section('content')
    <div class="card-header"> System Account<br>

{{--        <a href="/admin/create"><button type="button" class="btn btn-success btn-sm">Add now</button></a>--}}
        @if(auth()->user()->hasRole('sp_admin'))
        <a href="{{ route('admin.create') }}"><button type="button" class="btn btn-success btn-sm">Add now</button></a>
        @endif

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $row)
            <tr>
                <th scope="row"><a href="{{ route('admin.show', $row->id) }}">{{ $row->id }}</a></th>
                <td><a href="{{ route('admin.show', $row->id) }}">{{ $row->name }}</a></td>
                <td>{{ $row->email }}</td>
                <td>
{{--                    <a href="/admin/new_update/{{ $row->id }}" class="td-a float-left">--}}
                    <a href="{{ route('admin.edit',$row->id) }}" class="td-a float-left">
                        <button type="button" class="btn btn-primary btn-sm">Edit</button> &nbsp;
                    </a>

                    @if(auth()->user()->hasRole('sp_admin'))
                        <form action="/admin/{{$row->id}}" method="POST" class="float-left" onsubmit="return ConfirmDelete( this )">
                            {{--                        {{method_field('DELETE')}}--}}
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links()  }}
    </div>
@endsection

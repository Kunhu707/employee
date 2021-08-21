@extends('layouts.header')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Employees</h2>
                        <a class="btn btn-success" style="float:right" href="{{ route('add-employee') }}">Add Employee</a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $item)
                                <tr class="item{{$item->id}}">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td> <img class="photo" src="{{ asset('storage/images/photo/'.($item->photo ? $item->photo : 'default.png')) }}" alt="Photo"> </td>
                                    <td>{{$item->designation->name}}</td>
                                    <td>
                                        <a href="{{ url('edit-employee/'.$item->id) }}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ url('delete-employee/'.$item->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@push('scripts')
<script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
@endpush

<style>
    .photo {
        height:40px;
        width:40px;
    }
</style>
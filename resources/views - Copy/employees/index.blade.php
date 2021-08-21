@extends('layouts.header')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employees Listing</h3>
                <a class="btn btn-success" style="float:right" href="{{ route('add-employee') }}">Add Employee</a>
              </div>
              <!-- /.card-header -->
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
                <a href="{{ url('edit-employee/'.$item->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('delete-employee/'.$item->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
@endpush

<style>
    .photo {
        height:20px;
        width:20px;
    }
    </style>
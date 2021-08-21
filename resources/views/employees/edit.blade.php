@extends('layouts.header')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Employee Details</h3>
                    </div><br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Errors:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('create-employee') }}" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $employer->id }}" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Name" name="name" value="{{ $employer->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $employer->email }}">
                            </div>
                            <div class="form-group">
                                <strong>Photo</strong>
                                    @if(isset($employer->photo))
                                        <img id="original" src="{{ asset('storage/images/photo/'.$employer->photo) }}" height="70" width="70">
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="designation_id">Designation</label>
                                <select class="form-control" name="designation_id">
                                    <option value="0">Select</option>
                                    @foreach ($designations as $dg)
                                        <option value="{{ $dg->id }}" {{$dg->id == $employer->designation_id ? 'selected' : ''}} >{{ $dg->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-default btn-close" href="{{ route('employees') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
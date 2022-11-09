@extends('frontend.layouts.app')

@section('title')
Manajemen Pegawai
@endsection


@section('content')

@if (Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		{{ Session::get('error') }}
	</div>
@endif

<form action="{{ route('empmanagement.update', $employee->id) }}" method="POST">
    @csrf
	@method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Pegawai:</strong>
                <input type="number" name="id_number" value="{{$employee->id_number}}" class="form-control" placeholder="Name">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="name" value="{{$employee->name}}" class="form-control" placeholder="Name">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin:</strong>
                <input type="text" name="gender" value="{{$employee->gender}}" class="form-control" placeholder="Name">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Divisi:</strong>
                <input type="text" name="division" value="{{$employee->division}}" class="form-control" placeholder="Name">
            </div>
        </div>
		<div class="form-group @if ($errors->has('type_id')) has-error @endif col-md-12 col-lg-4">
			<label for="exampleFormControlSelect1">Level:</label>
				{{ Form::select('level_id', $levels, null, ['class' => 'form-control', 'id' => 'type-option']); }}
			@if ($errors->has('level_id')) <small class="form-text help-block" style="color:red">{{ $errors->first('level_id') }}</small>  @endif
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                <input type="text" name="role" value="{{$employee->role}}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
@endsection
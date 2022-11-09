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

<form action="{{ route('emplevel.store') }}" method="POST">
    @csrf
  
     <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
@endsection

@section('script')
<script>

$(document).ready( function () {
    $('#type-option').select2({
      placeholder: "-- Pilih Level --",
      theme: "bootstrap4",
    });
  } );

</script>
@endsection

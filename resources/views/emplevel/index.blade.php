

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endpush

@extends('frontend.layouts.app')


@section('content')
<section class="bg-white text-gray-600 p-6 sm:p-20 ">
    <div class="card">
		<div class="row mx-auto">
					<div class="col-md-12">
								
								@if (Session::has('success'))
									<div class="alert alert-success alert-dismissible" role="alert">
										{{ Session::get('success') }}
									</div>
								@endif

									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center">
												<h4 class="card-title">Tabel Level Pegawai</h4>
												<a href="{{ route('emplevel.create') }}"  class="btn btn-primary btn-round ml-auto">
													<i class="fa fa-plus"></i>
													Tambah Level Pegawai
												</a>
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive table table-striped">
												<table class="display table table-striped table-hover" >
													<thead>
														<tr>
															<th>#</th>
															<th>Nama</th>

														</tr>
													</thead>
													<!-- <tfoot>
														<tr>
															<th>#</th>
															<th>NIK</th>
															<th>Nama</th>
															<th>Jenis Kelamin</th>
															<th>Divisi</th>
															<th>Level</th>
															<th>Posisi</th>
															<th>Aksi</th>
														</tr>
													</tfoot> -->
													<tbody>
														@foreach($levels as $emp)
														<tr>
															<td>{{ $loop->index + 1 }}</td>
															<td>{{ $emp->name }}</td>

															<td>
									<!-- <a href="{{ route('emplevel.edit', $emp->id) }}" type="button" class="btn btn-success btn-sm">
															<i class="fa fa-edit my-auto"></i> Edit 
									</a> -->
									<td>
										<form action="{{ route('emplevel.destroy',$emp->id) }}" method="POST">	
							
											<a class="btn btn-primary" href="{{ route('emplevel.edit',$emp->id) }}">Edit</a>
						
											@csrf
											@method('DELETE')
							
											<button class="btn btn-danger" type="submit" class="btn btn-danger">Delete</button>
										</form>
									</td>
									<!-- <button onclick="deleteItem('{{ $emp->id }}')" type="button" class="btn btn-danger btn-sm">
															<i class="fa fa-trash"></i> Hapus
									</button> -->
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
	</div>
</section>
@endsection

@section('script')
<script>

$(document).ready( function () {
    $('#type-option').select2({
      placeholder: "-- Pilih Tipe --",
      theme: "bootstrap4",
    });
  } );

</script>
@endsection



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
												<h4 class="card-title">Tabel Pegawai</h4>
												<a href="{{ route('empmanagement.create') }}"  class="btn btn-primary btn-round ml-auto">
													<i class="fa fa-plus"></i>
													Tambah Pegawai
												</a>
												<a href="{{ route('emplevel.index') }}"  class="btn btn-success btn-round ml-auto">
													<i class="fa fa-plus"></i>
													Daftar Level Pegawai
												</a>
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive table table-striped">
												<table class="display table-auto table-striped table-hover" >
													<thead>
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
														@foreach($employees as $emp)
														<tr>
															<td>{{ $loop->index + 1 }}</td>
															<td>{{ $emp->number }}</td>
															<td>{{ $emp->name }}</td>
															<td>{{ $emp->gender }}</td>
															<td>{{ $emp->division }}</td>
															<td>{{ $emp->level->name }}</td>
															<td>{{ $emp->role }}</td>
															<td>
									<!-- <a href="{{ route('empmanagement.edit', $emp->id) }}" type="button" class="btn btn-success btn-sm">
															<i class="fa fa-edit my-auto"></i> Edit 
									</a> -->
									<td>
										<form action="{{ route('empmanagement.destroy',$emp->id) }}" method="POST">	
							
											<a class="btn btn-primary" href="{{ route('empmanagement.edit',$emp->id) }}">Edit</a>
						
											@csrf
											@method('DELETE')
							
											<button class="btn btn-red" type="submit" class="btn btn-danger">Delete</button>
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
		
<!-- <div class="overflow-x-auto relative">
	<h2 class="text-4xl font-extrabold dark:text-white">Payments tool for companies</h2>
	<div>
		<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button>
		<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Red</button>
	</div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Color
                </th>
                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="py-4 px-6">
                    Sliver
                </td>
                <td class="py-4 px-6">
                    Laptop
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="py-4 px-6">
                    White
                </td>
                <td class="py-4 px-6">
                    Laptop PC
                </td>
                <td class="py-4 px-6">
                    $1999
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="py-4 px-6">
                    Black
                </td>
                <td class="py-4 px-6">
                    Accessories
                </td>
                <td class="py-4 px-6">
                    $99
                </td>
            </tr>
        </tbody>
    </table>
</div> -->

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

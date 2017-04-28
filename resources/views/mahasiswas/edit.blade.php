@extends('home')
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Data Mahasiswa</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('mahasiswas.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

{{ Form::model($mahasiswa, ['method' => 'PATCH','route' => ['mahasiswas.update', $mahasiswa->idmahasiswa]]) }}
	<p>NIM</p>
	<input type="text" name="nim" value="{{ $mahasiswa->nim }}" required="" class="form-control"><br>

	<p>Nama</p>
	<input type="text" name="nama" value="{{ $mahasiswa->nama }}" required="" class="form-control"><br>

	<p>Tanggal Lahir</p>
	<input type="date" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}" required="" class="form-control"><br>

	<p>Agama</p>
	<select name="agama" required="" class="form-control">
		<option value="{{ $mahasiswa->agama }}"> {{$mahasiswa->agama}} </option>
		<option> --Pilih Agama-- </option>
        <option> Islam </option>
        <option> Kristen </option>
        <option> Katolik </option>
        <option> Hindu </option>
        <option> Budha </option>
	</select><br>

	<p>Telp</p>
	<input type="text" name="telp" value="{{ $mahasiswa->telp }}" required="" class="form-control"><br>

	<p>Email</p>
	<input type="text" name="email" value="{{ $mahasiswa->email }}" required="" class="form-control"><br>

	<p>Jurusan</p>
	<select name="jurusan" required="" class="form-control">
		<option value="{{ $mahasiswa->jurusan }}"> {{$mahasiswa->jurusan}} </option>
		<option> --Pilih Jurusan-- </option>
        <option> Teknik Mesin </option>
        <option> Teknik Elektronika </option>
        <option> Teknologi Informasi </option>
        <option> Akuntansi </option>
        <option> Bahasa Inggris </option>
        <option> Teknik Sipil </option>
        <option> ADM Bisnis </option>
	</select><br>

	<p>Prodi</p>
	<select name="prodi" required="" class="form-control">
		<option value="{{ $mahasiswa->prodi }}"> {{$mahasiswa->prodi}} </option>
		<option> --Pilih Prodi-- </option>
        <option> Teknik Mesin </option>
        <option> Teknik Listrik </option>
        <option> Teknik Komputer </option>
        <option> Akuntansi </option>
        <option> Bahasa Inggris </option>
        <option> Manajemen Komputer </option>
        <option> ADM Bisnis </option>
	</select><br>

	<input type="hidden" name="_method" value="PATCH">	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
{{ Form::close() }}
@endsection
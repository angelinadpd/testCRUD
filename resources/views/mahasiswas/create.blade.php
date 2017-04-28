@extends('home')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Data Mahasiswa</h2>
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
 
{{ Form::open(array('route' => 'mahasiswas.store','method'=>'POST')) }}
	<p>NIM</p>
	<input type="text" name="nim" value="" required="" class="form-control">
	{{ ($errors->has('nim')) ? $errors->first('nim') : '' }}<br>

	<p>Nama</p>
	<input type="text" name="nama" value="" required="" class="form-control">
	{{ ($errors->has('nama')) ? $errors->first('nama') : '' }}<br>

    <p>Tanggal Lahir</p>
    <input type="date" name="tgl_lahir" value="" required="" class="form-control">
    {{ ($errors->has('tgl_lahir')) ? $errors->first('tgl_lahir') : '' }}<br>

    <p>Agama</p>
    <select name="agama" required="" class="form-control">
        <option> --Pilih Agama-- </option>
        <option> Islam </option>
        <option> Kristen </option>
        <option> Katolik </option>
        <option> Hindu </option>
        <option> Budha </option>
    </select>
    {{ ($errors->has('agama')) ? $errors->first('agama') : '' }}<br>

    <p>Telp</p>
    <input type="text" name="telp" value="" required="" class="form-control">
    {{ ($errors->has('telp')) ? $errors->first('telp') : '' }}<br>

    <p>Email</p>
    <input type="text" name="email" value="" required="" class="form-control">
    {{ ($errors->has('email')) ? $errors->first('email') : '' }}<br>

	<p>Jurusan</p>
    <select name="jurusan" required="" class="form-control">
        <option> --Pilih Jurusan-- </option>
        <option> Teknik Mesin </option>
        <option> Teknik Elektronika </option>
        <option> Teknologi Informasi </option>
        <option> Akuntansi </option>
        <option> Bahasa Inggris </option>
        <option> Teknik Sipil </option>
        <option> ADM Bisnis </option>
    </select>
    {{ ($errors->has('jurusan')) ? $errors->first('jurusan') : '' }}<br>

    <p>Prodi</p>
    <select name="prodi" required="" class="form-control">
        <option> --Pilih Prodi-- </option>
        <option> Teknik Mesin </option>
        <option> Teknik Listrik </option>
        <option> Teknik Komputer </option>
        <option> Akuntansi </option>
        <option> Bahasa Inggris </option>
        <option> Manajemen Komputer </option>
        <option> ADM Bisnis </option>
    </select>
    {{ ($errors->has('prodi')) ? $errors->first('prodi') : '' }}<br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-warning" type="reset" name="reset">Reset</button>
{{ Form::close() }}
@endsection
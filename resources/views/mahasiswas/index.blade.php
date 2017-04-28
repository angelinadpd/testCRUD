@extends('home')
@section('content')

<div class="row">
 <div class="col-lg-12">
  <h1 class="page-header" align="center">
    Data Mahasiswa
  </h1>
<a href="{{route('mahasiswas.create')}}" class="pull-left btn btn-primary" id="create-mahasiswa" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Mahasiswa</th>
    		<th>NIM</th>
    		<th>Nama</th>
    		<th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Telp</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Prodi</th>
        <th>Action</th>
    	</tr>
            {{ csrf_field() }}
    </thead>

    @foreach($mahasiswas as $mahasiswa)
    <tr>
       <td> {{ $mahasiswa->idmahasiswa}} </td>
       <td> {{ $mahasiswa->nim}} </td>
       <td> {{ $mahasiswa->nama}} </td>
       <td> {{ $mahasiswa->tgl_lahir}} </td>
       <td> {{ $mahasiswa->agama}} </td>
       <td> {{ $mahasiswa->telp}} </td>
       <td> {{ $mahasiswa->email}} </td>
       <td> {{ $mahasiswa->jurusan}} </td>
       <td> {{ $mahasiswa->prodi}} </td>
       <td>
         		<a href="/mahasiswas/{{$mahasiswa->idmahasiswa}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
            <a href="/mahasiswas/{{$mahasiswa->idmahasiswa}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>

@endforeach
</tbody>
</table>
          {!! $mahasiswas->links() !!} 
  </div>
  </div>  
@endsection
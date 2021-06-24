@extends('layouts.master')
@section('title', 'Modalform -')

@section('content')

<div class="section-body">  
  @if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
  @endif
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <a href="{{ route('crud.tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
      <hr>
      <table class="table table-striped table-bordered table-lg">
        <tr>
          <th>No</th>
          <th>Kode barang</th>
          <th>Nama barang</th>
          <th>Nama pengirim</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
        @foreach ($data_barang as $no => $data)
        <tr>
          <td>{{ $data_barang->firstItem()+$no }}</td>
          <td>{{ $data->kode_barang }}</td>
          <td>{{ $data->nama_barang }}</td>
          <td>{{ $data->nama_pengirim }}</td>
          <td>{{ $data->deskripsi_barang }}</td>
          <td>
            <a href="{{ route('crud.edit',$data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
          |
            
          <form action="{{ route('crud.delete',$data->id) }}" method="post" id="delete{{$data->id}}" onsubmit="return confirm('Yakin hapus data?')">
            @method('delete') 
            @csrf
                <button class="btn btn-icon btn-danger swal-confirm" data-id="{{$data->id}}">
                  <i class="fas fa-times"></i> 
                </button>
              </form>
          </td> 
        </tr>
        @endforeach
      </table>
      {{ $data_barang->links() }}
    </div>
  </div>
</div>
    
@endsection


@push('page-scripts')
<script src="{{ asset("node_modules/sweetalert/sweetalert.min.js") }}"></script>
    
@endpush

@push('after-scripts')
{{-- <script>
$("swal-confirm").click(function(e) {

id = e.target.dataset.id

  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Poof! Your imaginary file has been deleted!', {
        icon: 'success',
      });
      $(`#delete${id}`).submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script> --}}
@endpush


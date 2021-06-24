@extends('layouts.master')
@section('title', 'Modalform -')

@section('content')

<div class="section-body">  
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="alert alert-info">
              <b>Perhatian!</b> Harap isi dengan benar
            </div>
            <form action="{{ route('crud.simpan')}}" method="post">
              @csrf
              <div class="row">
                <div class="form-group col-12-sm col-md-6 col-lg-6 ">
                  <label>Kode barang</label>
                  <input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" value="{{ old('kode_barang') }}" autofocus>
                  @error('kode_barang')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-12-sm col-md-6 col-lg-6">
                  <label>Nama barang</label>
                  <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}">
                  @error('nama_barang')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12-sm col-md-6 col-lg-6">
                  <label>Nama pengirim</label>
                  <input type="text" name="nama_pengirim" class="form-control @error('nama_pengirim') is-invalid @enderror" value="{{ old('nama_pengirim') }}">
                  @error('nama_pengirim')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-12-sm col-md-6 col-lg-6">
                  <label>Deskripsi barang</label>
                  <input type="text" name="deskripsi_barang" class="form-control @error('deskripsi_barang') is-invalid @enderror" value="{{ old('deskripsi_barang') }}">
                  @error('deskripsi_barang')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
              <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>
    
@endsection


@push('page-scripts')
    
@endpush


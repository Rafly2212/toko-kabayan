@extends('AppAdmin')
@section('Page Title')
  <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Ubah Transaksi</h1>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('Content')
  <div class="content mt-3">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <strong>Ubah Transaksi</strong>
                  <br>
                  Form ubah transaksi K-Style Outlet
              </div>
              <div class="card-body card-block">
                  <form action="{{url('Transaksis/'.$pesanans->id)}}" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                      @if ($pesanans->ongkir == null && $pesanans->kurir == null)
                        <div class="col-md-12">
                          <label for="inputNoResi" class="form-label"><h6>No Resi</h6></label>
                          <input name="no_resi" type="text" class="form-control @error('no_resi') is-invalid @enderror" id="inputNoResi" value="{{old('no_resi',$pesanans->no_resi)}}" disabled>
                          @error('no_resi')
                              <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      @else
                        <div class="col-md-12">
                          <label for="inputNoResi" class="form-label"><h6>No Resi</h6></label>
                          <input name="no_resi" type="text" class="form-control @error('no_resi') is-invalid @enderror" id="inputNoResi" value="{{old('no_resi',$pesanans->no_resi)}}">
                          @error('no_resi')
                              <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      @endif
                      <div class="col-md-4">
                        <label for="inputStatus" class="form-label"><h6>Status Pemesanan</h6></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="inputStatus" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Konfirmasi Admin" @if ($pesanans->status == 'Konfirmasi Admin') selected @endif>Konfirmasi Admin</option>
                            <option value="Proses" @if ($pesanans->status == 'Proses') selected @endif>Proses</option>
                            <option value="Lunas" @if ($pesanans->status == 'Lunas') selected @endif>Lunas</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label for="inputOngkir" class="form-label"><h6>Ongkir</h6></label>
                        <input name="ongkir" type="text" class="form-control @error('ongkir') is-invalid @enderror" id="inputOngkir" placeholder="Ex.8000" value="{{old('ongkir',$pesanans->ongkir)}}">
                        @error('ongkir')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label for="inputKurir" class="form-label"><h6>Kurir</h6></label>
                          <select name="kurir" id="inputKurir" class="form-select @error('kurir') is-invalid @enderror">
                            <option value="">- Pilih Kurir -</option>
                            <option value="Gojek" @if ($pesanans->kurir == 'Gojek') selected @endif>Gojek</option>
                            <option value="Shopee" @if ($pesanans->kurir == 'Shopee') selected @endif>Shopee</option>
                          </select>
                          @error('kurir')
                              <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="inputNamaKurir" class="form-label"><h6>Nama Kurir</h6></label>
                        <input name="nama_kurir" type="text" class="form-control @error('nama_kurir') is-invalid @enderror" id="inputNamaKurir" placeholder="Ex. Jack Sparrow" value="{{old('nama_kurir',$pesanans->nama_kurir)}}">
                        @error('nama_kurir')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="inputNoTeleponKurir" class="form-label"><h6>Nomor Telepon Kurir</h6></label>
                        <input name="nomor_telepon_kurir" type="text" class="form-control @error('nomor_telepon_kurir') is-invalid @enderror" id="inputNoTeleponKurir" placeholder="Ex. 0887434654" value="{{old('nomor_telepon_kurir',$pesanans->nomor_telepon_kurir)}}">
                        @error('nomor_telepon_kurir')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                          <i class="ti-save"></i> Simpan
                        </button>
                        <a href="{{route('Transaksis.index')}}">
                          <button type="button" class="btn btn-secondary">
                            <i class="ti-back-left"></i> Kembali
                          </button>
                        </a>
                      </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
@endsection
@extends('template.layout')

@section('title')
    Inventaris
@endsection

@push('style')
    
@endpush

@section('contentTitle')
    <h1>Tambah Data Pegawai</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{route('employeeStore')}} " method="post">
                @csrf
                <div class="form-group">
                    <span for="name">Nama Pegawai</span>
                    <input class="form-control @error('name')
                        is-invalid
                    @enderror" type="text" name="name" id="name">
                    <div class="invalid-feedback">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <span for="address">Alamat</span>
                    <input class="form-control @error('address')
                        is-invalid
                    @enderror" type="text" name="address" id="address">
                    <div class="invalid-feedback">
                        @error('address')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <span for="role">Bagian</span>
                    <select name="role" id="role" class="form-control">
                      @foreach ($role as $row)
                      <option value="{{ $row->id }}">{{ $row->role_name }}</option>
                      @endforeach
                    </select>
                    {{-- <input class="form-control @error('role')
                        is-invalid
                    @enderror" type="number" name="role" id="role"> --}}
                    <div class="invalid-feedback">
                        @error('role')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('script')
    
@endpush
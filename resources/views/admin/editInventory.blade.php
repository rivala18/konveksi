@extends('template.layout')

@section('title')
    Inventaris
@endsection

@push('style')
    
@endpush

@section('contentTitle')
    <h1>Ubah Data Inventaris</h1>
@endsection

@section('content')

    <div class="card">
      <div class="card-body">
        <form action=" {{route('inventoryUpdate')}} " method="post">
        <input type="hidden" name="inventory_id" class="form-control" value="  {{$inventory[0]->inventory_id}}  ">
        <input type="hidden" name="employe_id" class="form-control" value="  {{$inventory[0]->employe_id}}  ">
          @csrf
        @foreach ($inventory as $row)
          <div class="form-row">
                  <div class="col-auto mb-3">
                    <!-- <label for="">Warna</label> -->
                    <input type="text" name="color[]" id="color" class="form-control" value="  {{$row->color}}  ">
                  </div>
                  <div class="col-auto mb-3">
                    <input type="number" name="qty[]" id="qty" class="form-control" value="{{$row->qty}}">
                  </div>
                  <div class="col-auto mb-3">
                    <input type="text" name="date[]" id="date" class="form-control" readonly value="{{$row->date}}">
                  </div>
            </div>
            @endforeach
            
            <div class="form-row">
            <div class="col-auto mb-3">
                    <button class="btn btn-primary btn-sm" id="tambah" type="submit">Update</button>
              </div>
            </div>
            </form>
       </div>
    </div>
@endsection

@push('script')
<script>

</script>
@endpush
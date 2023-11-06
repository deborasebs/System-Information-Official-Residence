@section('js')
<style>
.button {
  border: none;
  color: green;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('permohonanrumah.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Permohonan Rumah</a>
  </div>

    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data Permohonan Rumah</h4>
                  <!-- <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format Buku</a> -->
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nota Dinas
                          </th>
                          <th>
                            Nama Pemohon
                          </th>
                          <th>
                            Personal Number
                          </th>
                          <th>
                            Jabatan
                          </th>
                          <th>
                            TMT Jabatan
                          </th>
                          <th>
                            Unit Kerja
                          </th>
                          <th>
                            Upload SK
                          </th>
                          <th>
                            Plotting
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <!-- <td class="py-1">
                          @if($data->cover)
                            <img src="{{url('images/buku/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          <a href="{{route('buku.show', $data->id)}}"> 
                            {{$data->judul}}
                          </a>
                          </td> -->
                          <td>
                            {{$data->notadinas}}
                          
                          </td>
                          <td>
                            {{$data->namapemohon}}
                          </td>
                          <td>
                            {{$data->personalnumber}}
                          </td>
                          <td>
                            {{$data->jabatan}}
                          </td>
                          <td>
                            {{$data->tmtjabatan}}
                          </td>
                          <td>
                            {{$data->unitkerja}}
                          </td>
                          <td>
                            {{$data->plotting}}
                          </td>
                          <td>
                          <button class="button button">Plotting</button>
                          </td>
                          <!-- <td>
                            {{$data->lokasi}}
                          </td> -->
                          
                          <td>
                          <!-- <button class="button button1">Green</button> -->
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('permohonanrumah.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('permohonanrumah.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection
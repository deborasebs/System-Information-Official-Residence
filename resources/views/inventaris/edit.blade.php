@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('inventaris.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Inventaris</h4>
                      
                        <div class="form-group{{ $errors->has('namabarang') ? ' has-error' : '' }}">
                            <label for="namabarang" class="col-md-4 control-label">namabarang</label>
                            <div class="col-md-6">
                                <input id="namabarang" type="text" class="form-control" name="namabarang" value="{{ $data->namabarang }}" required>
                                @if ($errors->has('namabarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namabarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">kategori</label>
                            <div class="col-md-6">
                            <select class="form-control" name="kategori" required="">
                                <option value=""></option>
                                <option value="furniture" {{$data->kategori === "furniture" ? "selected" : ""}}>furniture</option>
                                <option value="elektronik" {{$data->kategori === "elektronik" ? "selected" : ""}}>elektronik</option>
                            </select>
                            </div>
                        </div>
              

                        <div class="form-group{{ $errors->has('tglperolehan') ? ' has-error' : '' }}">
                            <label for="tglperolehan" class="col-md-4 control-label">Tanggal Perolehan</label>
                            <div class="col-md-6">
                                <input id="tglperolehan" type="date" class="form-control" name="tglperolehan" value="{{ $data->tglperolehan }}" required>
                                @if ($errors->has('tglperolehan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tglperolehan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hargaperolehan') ? ' has-error' : '' }}">
                            <label for="hargaperolehan" class="col-md-4 control-label">hargaperolehan</label>
                            <div class="col-md-6">
                                <input id="hargaperolehan" type="number" class="form-control" name="hargaperolehan" value="{{ $data->hargaperolehan }}" required>
                                @if ($errors->has('hargaperolehan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hargaperolehan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

      
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Ubah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('rumah.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
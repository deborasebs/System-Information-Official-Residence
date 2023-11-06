@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('rumah.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Rumah <b>{{$data->koderumah}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('koderumah') ? ' has-error' : '' }}">
                            <label for="koderumah" class="col-md-4 control-label">Kode Rumah</label>
                            <div class="col-md-6">
                                <input id="koderumah" type="text" class="form-control" name="koderumah" value="{{ $data->koderumah }}" required>
                                @if ($errors->has('koderumah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('koderumah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('komplek') ? ' has-error' : '' }}">
                            <label for="komplek" class="col-md-4 control-label">komplek</label>
                            <div class="col-md-6">
                            <select class="form-control" name="komplek" required="">
                                <option value="Teluk Betung" {{$data->komplek === "Teluk Betung" ? "selected" : ""}}>Teluk Betung </option>
                                <option value="Tanjung karang" {{$data->komplek === "Tanjung karang" ? "selected" : ""}}>Tanjung karang </option>
                                <option value="Luar Komplek" {{$data->komplek === "Luar Komplek" ? "selected" : ""}}>Luar Komplek </option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('luastanahbangunan') ? ' has-error' : '' }}">
                            <label for="luastanahbangunan" class="col-md-4 control-label">luas tanah bangunan</label>
                            <div class="col-md-6">
                                <input id="luastanahbangunan" type="text" class="form-control" name="luastanahbangunan" value="{{ $data->luastanahbangunan }}" required>
                                @if ($errors->has('luastanahbangunan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('luastanahbangunan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" required="">
                                <option value="terisi" {{$data->komplek === "terisi" ? "selected" : ""}}>terisi </option>
                                <option value="siaphuni" {{$data->komplek === "siaphuni" ? "selected" : ""}}>siaphuni </option>
                                <option value="perapihan" {{$data->komplek === "perapihan" ? "selected" : ""}}>perapihan </option>
                                <option value="renovasi" {{$data->komplek === "renovasi" ? "selected" : ""}}>renovasi </option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
                            <label for="tipe" class="col-md-4 control-label">tipe</label>
                            <div class="col-md-6">
                            <select class="form-control" name="tipe" required="">
                                <option value="a" {{$data->tipe === "a" ? "selected" : ""}}>a </option>
                                <option value="b" {{$data->tipe === "b" ? "selected" : ""}}>b </option>
                                <option value="c" {{$data->tipe === "c" ? "selected" : ""}}>c </option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Layout</label>
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->layout) src="{{ asset('images/rumah/'.$data->layout) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="layout">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
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
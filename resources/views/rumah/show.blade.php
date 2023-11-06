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

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->koderumah}}</b> </h4>
                      <form class="forms-sample">

    

                        <div class="form-group{{ $errors->has('koderumah') ? ' has-error' : '' }}">
                            <label for="koderumah" class="col-md-4 control-label">kode Rumah</label>
                            <div class="col-md-6">
                                <input id="koderumah" type="text" class="form-control" name="koderumah" value="{{ $data->koderumah }}" readonly="">
                                @if ($errors->has('koderumah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('koderumah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('komplek') ? ' has-error' : '' }}">
                            <label for="komplek" class="col-md-4 control-label">Komplek</label>
                            <div class="col-md-6">
                            <select class="form-control" name="komplek" disabled="">
                                <option value="cipete" {{$data->komplek === "Cipete" ? "selected" : ""}}>Cipete</option>
                                <option value="rawasari" {{$data->komplek === "Rawasari" ? "selected" : ""}}>Rawasari</option>
                                <option value="luarkomplek" {{$data->komplek === "Luar Komplek" ? "selected" : ""}}>Luar Komplek</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" readonly>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('luastanahbangunan') ? ' has-error' : '' }}">
                            <label for="luastanahbangunan" class="col-md-4 control-label">Luas Tanah Bangunan</label>
                            <div class="col-md-6">
                                <input id="luastanahbangunan" type="text" class="form-control" name="luastanahbangunan" value="{{ $data->luastanahbangunan }}" readonly>
                                @if ($errors->has('luastanahbangunan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('luastanahbangunan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" disabled="">
                                <option value="terisi" {{$data->status === "Terisi" ? "selected" : ""}}>Terisi</option>
                                <option value="siaphuni" {{$data->status === "Siap Huni" ? "selected" : ""}}>Siap Huni</option>
                                <option value="perapihan" {{$data->status === "Perapihan" ? "selected" : ""}}>Perapihan</option>
                                <option value="renovasi" {{$data->status === "Renovasi" ? "selected" : ""}}>Renovasi</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
                            <label for="tipe" class="col-md-4 control-label">Tipe</label>
                            <div class="col-md-6">
                            <select class="form-control" name="tipe" disabled="">
                                <option value="a" {{$data->tipe === "A" ? "selected" : ""}}>A</option>
                                <option value="b" {{$data->tipe === "B" ? "selected" : ""}}>B</option>
                                <option value="c" {{$data->tipe === "C" ? "selected" : ""}}>C</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->layout) src="{{ asset('images/rumah/'.$data->layout) }}" @endif />
                            </div>
                        </div>
                
                        <a href="{{route('rumah.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection
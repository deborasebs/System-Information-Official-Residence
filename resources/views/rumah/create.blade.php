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

<form method="POST" action="{{ route('rumah.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Rumah Baru</h4>
                      
                        <div class="form-group{{ $errors->has('koderumah') ? ' has-error' : '' }}">
                            <label for="koderumah" class="col-md-4 control-label">Kode Rumah</label>
                            <div class="col-md-6">
                                <input id="koderumah" type="text" class="form-control" name="koderumah" value="{{ old('koderumah') }}" required>
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
                            <select class="form-control" name="komplek" required="">
                                <option value=""></option>
                                <option value="Teluk Betung">Teluk Betung</option>
                                <option value="Tanjung karang">Tanjung karang</option>
                                <option value="Luar Komplek">Luar Komplek</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('luastanahbangunan') ? ' has-error' : '' }}">
                            <label for="luastanahbangunan" class="col-md-4 control-label">Luas Tanah/Bangunan</label>
                            <div class="col-md-6">
                                <input id="luastanahbangunan" type="text" class="form-control" name="luastanahbangunan" value="{{ old('luastanahbangunan') }}" required>
                                @if ($errors->has('luastanahbangunan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('luastanahbangunan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
                            <label for="tipe" class="col-md-4 control-label">Tipe</label>
                            <div class="col-md-6">
                            <select class="form-control" name="tipe" required="">
                                <option value=""></option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="layout" class="col-md-4 control-label">Layout</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="layout">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
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
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

<form method="POST" action="{{ route('inventaris.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Inventaris Baru</h4>
                      
                        <div class="form-group{{ $errors->has('namabarang') ? ' has-error' : '' }}">
                            <label for="namabarang" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                                <input id="namabarang" type="text" class="form-control" name="namabarang" value="{{ old('namabarang') }}" required>
                                @if ($errors->has('namabarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namabarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">Kategori</label>
                            <div class="col-md-6">
                            <select class="form-control" name="kategori" required="">
                                <option value=""></option>
                                <option value="furniture">Furniture</option>
                                <option value="elektronik">Elektronik</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tglperolehan') ? ' has-error' : '' }}">
                            <label for="tglperolehan" class="col-md-4 control-label">Tanggal Perolehan</label>
                            <div class="col-md-6">
                                <input id="tglperolehan" type="date" class="form-control" name="tglperolehan" value="{{ old('tglperolehan') }}" required>
                                @if ($errors->has('tglperolehan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tglperolehan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hargaperolehan') ? ' has-error' : '' }}">
                            <label for="hargaperolehan" class="col-md-4 control-label">Harga Perolehan</label>
                            <div class="col-md-6">
                                <input id="hargaperolehan" type="number" class="form-control" name="hargaperolehan" value="{{ old('hargaperolehan') }}" required>
                                @if ($errors->has('hargaperolehan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hargaperolehan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('inventaris.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
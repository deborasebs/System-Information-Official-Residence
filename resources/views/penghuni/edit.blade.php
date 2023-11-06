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

<form action="{{ route('penghuni.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Penghuni <b>{{$data->namapemohon}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('namapemohon') ? ' has-error' : '' }}">
                            <label for="namapemohon" class="col-md-4 control-label">Nama Pemohon</label>
                            <div class="col-md-6">
                                <input id="namapemohon" type="text" class="form-control" name="namapemohon" value="{{ $data->namapemohon }}" required>
                                @if ($errors->has('namapemohon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namapemohon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('personalnumber') ? ' has-error' : '' }}">
                            <label for="personalnumber" class="col-md-4 control-label">Personal Number</label>
                            <div class="col-md-6">
                                <input id="personalnumber" type="text" class="form-control" name="personalnumber" value="{{ $data->personalnumber }}" required>
                                @if ($errors->has('personalnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personalnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ $data->jabatan }}" required>
                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('unitkerja') ? ' has-error' : '' }}">
                            <label for="unitkerja" class="col-md-4 control-label">Unit Kerja</label>
                            <div class="col-md-6">
                                <input id="unitkerja" type="text" class="form-control" name="unitkerja" value="{{ $data->unitkerja }}" required>
                                @if ($errors->has('unitkerja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unitkerja') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('plotting') ? ' has-error' : '' }}">
                            <label for="plotting" class="col-md-4 control-label">plotting</label>
                            <div class="col-md-6">
                                <input id="plotting" type="button" class="form-control" name="plotting" value="{{ $data->plotting }}" required>
                                @if ($errors->has('plotting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plotting') }}</strong>
                                    </span>
                                @endif
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
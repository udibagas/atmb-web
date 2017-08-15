<br />

{!! Form::model($donatur, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama', $donatur->nama, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama']) }}

            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('instansi') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Instansi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('instansi', $donatur->instansi, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Instansi']) }}

            @if ($errors->has('instansi'))
                <span class="help-block">
                    <strong>{{ $errors->first('instansi') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('alamat', $donatur->alamat, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Alamat', 'rows' => 3]) }}

            @if ($errors->has('alamat'))
                <span class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('telpon') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('telpon', $donatur->telpon, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Telpon']) }}

            @if ($errors->has('telpon'))
                <span class="help-block">
                    <strong>{{ $errors->first('telpon') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('jenis', $donatur->jenis, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Jenis']) }}

            @if ($errors->has('jenis'))
                <span class="help-block">
                    <strong>{{ $errors->first('jenis') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{url('donatur')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}

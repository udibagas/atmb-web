<br />

{!! Form::model($kelurahan, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
		<label for="kecamatan_id" class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
    		{{ Form::select('kecamatan_id',
    			\App\Kecamatan::orderBy('nama', 'ASC')->pluck('nama', 'id'),
    			$kelurahan->kecamatan_id, [
    				'class' => 'form-control',
    				'placeholder' => '-- Pilih Kecamatan --'
    			]
    		) }}

    		@if ($errors->has('kecamatan_id'))
    			<span class="help-block">
    				<strong>{{ $errors->first('kecamatan_id') }}</strong>
    			</span>
    		@endif
        </div>
	</div>


    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama', $kelurahan->nama, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama']) }}

            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('kode', $kelurahan->kode, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode']) }}

            @if ($errors->has('kode'))
                <span class="help-block">
                    <strong>{{ $errors->first('kode') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nama_lurah') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Lurah
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama_lurah', $kelurahan->nama_lurah, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Lurah']) }}

            @if ($errors->has('nama_lurah'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama_lurah') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('no_hp_lurah') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor HP Lurah
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('no_hp_lurah', $kelurahan->no_hp_lurah, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nomor HP Lurah']) }}

            @if ($errors->has('no_hp_lurah'))
                <span class="help-block">
                    <strong>{{ $errors->first('no_hp_lurah') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{url('kelurahan')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}

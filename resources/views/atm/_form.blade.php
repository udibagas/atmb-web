<br />

{!! Form::model($atm, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
		<label for="kecamatan_id" class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
    		{{ Form::select('kecamatan_id',
    			\App\Kecamatan::orderBy('nama', 'ASC')->pluck('nama', 'id'),
    			$atm->kecamatan_id, [
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

    <div class="form-group{{ $errors->has('kelurahan_id') ? ' has-error' : '' }}">
		<label for="kelurahan_id" class="control-label col-md-3 col-sm-3 col-xs-12">Kelurahan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
    		{{ Form::select('kelurahan_id',
    			\App\Kelurahan::orderBy('nama', 'ASC')->pluck('nama', 'id'),
    			$atm->kelurahan_id, [
    				'class' => 'form-control',
    				'placeholder' => '-- Pilih Kelurahan --'
    			]
    		) }}

    		@if ($errors->has('kelurahan_id'))
    			<span class="help-block">
    				<strong>{{ $errors->first('kelurahan_id') }}</strong>
    			</span>
    		@endif
        </div>
	</div>

    <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('kode', $atm->kode, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode']) }}

            @if ($errors->has('kode'))
                <span class="help-block">
                    <strong>{{ $errors->first('kode') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ip_address') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IP Address <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('ip_address', $atm->ip_address, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'IP Address']) }}

            @if ($errors->has('ip_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('ip_address') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('alamat', $atm->alamat, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Alamat']) }}

            @if ($errors->has('alamat'))
                <span class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nama_petugas') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Petugas <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama_petugas', $atm->nama_petugas, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Petugas']) }}

            @if ($errors->has('nama_petugas'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama_petugas') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('telpon_petugas') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon Petugas <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('telpon_petugas', $atm->telpon_petugas, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Telpon Petugas']) }}

            @if ($errors->has('telpon_petugas'))
                <span class="help-block">
                    <strong>{{ $errors->first('telpon_petugas') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{url('atm')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}

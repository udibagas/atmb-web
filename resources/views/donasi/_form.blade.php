<br />

{!! Form::model($donasi, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('tanggal', $donasi->tanggal, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'yyyy-mm-dd']) }}

            @if ($errors->has('tanggal'))
                <span class="help-block">
                    <strong>{{ $errors->first('tanggal') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('donatur_id') ? ' has-error' : '' }}">
		<label for="donatur_id" class="control-label col-md-3 col-sm-3 col-xs-12">Donatur <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
    		{{ Form::select('donatur_id',
    			\App\Donatur::orderBy('nama', 'ASC')->pluck('nama', 'id'),
    			$donasi->donatur_id, [
    				'class' => 'form-control',
    				'placeholder' => '-- Pilih Donatur --'
    			]
    		) }}

    		@if ($errors->has('donatur_id'))
    			<span class="help-block">
    				<strong>{{ $errors->first('donatur_id') }}</strong>
    			</span>
    		@endif
        </div>
	</div>

    <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah (Liter) <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('jumlah', $donasi->jumlah, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Jumlah (Liter)']) }}

            @if ($errors->has('jumlah'))
                <span class="help-block">
                    <strong>{{ $errors->first('jumlah') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="/donasi" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}

<div class="form-group row">
    <label class="col-4 col-form-label"> Name </label>
    <div class="col-8">
        {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
        @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-4 col-form-label"> Device </label>
    <div class="col-8">
        {{ Html::text('device', (isset($data->device) ? $data->device : ''))->class([ $errors->has('device') ? 'form-control is-invalid' : 'form-control'])->required() }}
        @error('device') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-4 col-form-label"> IP Address </label>
    <div class="col-8">
        {{ Html::text('ip_address', (isset($data->ip_address) ? $data->ip_address : ''))->class([ $errors->has('ip_address') ? 'form-control is-invalid' : 'form-control'])->required() }}
        @error('ip_address') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-4 col-form-label"> MAC Address </label>
    <div class="col-8">
        {{ Html::text('mac_address', (isset($data->mac_address) ? $data->mac_address : ''))->class([ $errors->has('mac_address') ? 'form-control is-invalid' : 'form-control'])->required() }}
        @error('mac_address') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-4 col-form-label"> Port </label>
    <div class="col-8">
        {{ Html::text('port', (isset($data->port) ? $data->port : '80'))->class([ $errors->has('port') ? 'form-control is-invalid' : 'form-control'])->required() }}
        @error('port') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
    </div>
</div>
 
<div class="form-group row">
    <label class="col-4 col-form-label"> Description </label>
    <div class="col-8">
        {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control'])->id('ex-textarea') }}
        @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
    </div>
</div>
 


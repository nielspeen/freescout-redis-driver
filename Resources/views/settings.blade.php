<form class="form-horizontal margin-top margin-bottom" method="POST" action="">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('settings.customapp->url') ? ' has-error' : '' }}">
        <label class="col-sm-2 control-label">{{ __('Callback URL') }}</label>

        <div class="col-sm-6">
            <div class="input-group input-sized-lg">
                <input type="text" class="form-control input-sized-lg" name="settings[customapp.callback_url]" value="{{ old('settings') ? old('settings')['customapp.callback_url'] : $settings['customapp.callback_url'] }}">
            </div>

            @include('partials/field_error', ['field'=>'settings.customapp->url'])

            <p class="form-help">
                {{ __('Example') }}: https://crm.example.org/api/freescout/callback
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">{{ __('Secret Key') }}</label>

        <div class="col-sm-6">
            <input type="text" class="form-control input-sized-lg" name="settings[customapp.secret_key]" value="{{ $settings['customapp.secret_key'] }}">

            <p class="form-help">
                {{ __('The secret key used to generate a signature header X-FREESCOUT-SIGNATURE. This can be used to verify the authenticity of the request.') }}
            </p>
        </div>
    </div>

    <div class="form-group margin-top margin-bottom">
        <div class="col-sm-6 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>

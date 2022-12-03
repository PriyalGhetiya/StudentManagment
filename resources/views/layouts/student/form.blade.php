<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

    <div class="col-md-6">
        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ (isset($edit->first_name)) ? $edit->first_name : old('first_name') }}" required autocomplete="first_name" autofocus>

        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

    <div class="col-md-6">
        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{  (isset($edit->last_name)) ? $edit->last_name : old('last_name') }}" required autocomplete="last_name" autofocus>

        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="enrollment_no" class="col-md-4 col-form-label text-md-right">{{ __('Enrollment No') }}</label>

    <div class="col-md-6">
        <input id="enrollment_no" type="text" class="form-control @error('enrollment_no') is-invalid @enderror" name="enrollment_no" value="{{  (isset($edit->enrollment_no)) ? $edit->enrollment_no : old('enrollment_no') }}" required autocomplete="enrollment_no" autofocus>

        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
    <div class="form-group row">
    <label for="standard" class="col-md-4 col-form-label text-md-right">{{ __('Standard') }}</label>

    <div class="col-md-6">
        <select id="standard" class="form-control @error('standard') is-invalid @enderror" name="standard" value="{{ old('standard') }}">
            <option id="1" value="6" @if(isset($edit->standard)) @if($edit->standard == 6) {{ 'selected' }} @endif @endif >6</option>
            <option id="2" value="7" @if(isset($edit->standard))  @if($edit->standard == 7) {{ 'selected' }} @endif @endif >7</option>
        </select>

        @error('standard')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
 <div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">
        {{ (isset($edit)) ? 'Update' : 'Submit' }}
    </button>
</div>

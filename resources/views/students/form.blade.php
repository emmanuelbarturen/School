<div class="form-horizontal">
    <div class="col-xs-6">
        <div class="form-group {{ $errors->has('names') ? 'has-error' :'' }}">
            <label for="names" class="col-lg-4 control-label">Nombres</label>
            <div class="col-lg-8">
                <input class="form-control input-sm" id="names" name="names" value="{{old('names',$student->names)}}"
                       required dusk="student-name">
            </div><!-- /.col -->
            @if($errors->has('names'))
                <small class="text-danger">{{ $errors->first('names') }}</small>
            @endif
        </div><!-- /form-group -->
        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
            <label for="email" class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8">
                <input class="form-control input-sm" id="email" name="email" value="{{old('email',$student->email)}}"
                       required dusk="student-email">
            </div><!-- /.col -->
            @if($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div><!-- /form-group -->
    </div>
</div>
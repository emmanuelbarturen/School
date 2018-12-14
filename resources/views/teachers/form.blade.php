<div class="form-horizontal">
    <div class="col-xs-6">
        <div class="form-group {{ $errors->has('names') ? 'has-error' :'' }}">
            <label for="names" class="col-lg-4 control-label">Nombres</label>
            <div class="col-lg-8">
                <input class="form-control input-sm" id="names" name="names" value="{{old('names',$teacher->names)}}"
                       required dusk="teacher-name">
            </div><!-- /.col -->
            @if($errors->has('names'))
                <small class="text-danger">{{ $errors->first('names') }}</small>
            @endif
        </div><!-- /form-group -->
        <div class="form-group {{ $errors->has('phone') ? 'has-error' :'' }}">
            <label for="phone" class="col-lg-4 control-label">Teléfono</label>
            <div class="col-lg-8">
                <input class="form-control input-sm" id="phone" name="phone" value="{{old('phone',$teacher->phone)}}"
                       required dusk="teacher-phone">
            </div><!-- /.col -->
            @if($errors->has('phone'))
                <small class="text-danger">{{ $errors->first('phone') }}</small>
            @endif
        </div><!-- /form-group -->
    </div>
</div>
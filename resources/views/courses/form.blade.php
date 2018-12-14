<div class="form-horizontal">
    <div class="col-xs-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
            <label for="name" class="col-lg-4 control-label">Nombres</label>
            <div class="col-lg-8">
                <input class="form-control input-sm" id="name" name="name" value="{{old('name',$course->name)}}"
                       required dusk="course-name">
            </div><!-- /.col -->
            @if($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div><!-- /form-group -->
        <div class="form-group {{ $errors->has('semester') ? 'has-error' :'' }}">
            <label for="semester" class="col-lg-4 control-label">Teléfono</label>
            <div class="col-lg-8">
                <input class="form-control input-sm" id="semester" name="semester"
                       value="{{old('semester',$course->semester)}}"
                       required dusk="course-semester" type="number">
            </div><!-- /.col -->
            @if($errors->has('semester'))
                <small class="text-danger">{{ $errors->first('semester') }}</small>
            @endif
        </div><!-- /form-group -->
    </div>
</div>
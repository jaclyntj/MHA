<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'Judul' }}</label>
    <input class="form-control" name="judul" type="text" id="judul" value="{{ isset($artikel->judul) ? $artikel->judul : ''}}" >
    {!! $errors->first('judul', '<p class="help-block">Judul wajib diisi.</p>') !!}
</div>
<div class="form-group {{ $errors->has('artikel') ? 'has-error' : ''}}">
    <label for="artikel" class="control-label">{{ 'Artikel' }}</label>
    <textarea class="form-control" rows="5" name="artikel" type="textarea" id="artikel" >{{ isset($artikel->artikel) ? $artikel->artikel : ''}}</textarea>
    {!! $errors->first('artikel', '<p class="help-block">Artikel wajib diisi.</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

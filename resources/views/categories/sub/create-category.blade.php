{!! Form::model(new App\Category, [
    'route' => ['categories.store'],
    'class'=>'form-horizontal',
    'role' => 'form'
]) !!}
<div class="form-group">
    <label for="category-name" class="col-sm-3 control-label">Category
        Name</label>

    <div class="col-sm-6">
        <input type="text" name="name" id="category-name" class="form-control"
               value="{{ old('category') }}">
    </div>
</div>
<div class="form-group">
    <label for="category-description"
           class="col-sm-3 control-label">Description</label>

    <div class="col-sm-6">
        <textarea name="description" id="category-description"
                  class="form-control"
                  value="{{ old('category') }}" maxlength="155"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="category-color"
           class="col-sm-3 control-label">Color</label>

    <div class="col-sm-6">
        <select name="color" id="category-color" class="form-control"
                aria-label="Select color">
            <option disabled selected>Select color</option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option value="Yellow">Yellow</option>
            <option value="Green">Green</option>
            <option value="Blue">Blue</option>
            <option value="Indigo">Indigo</option>
            <option value="Violet">Violet</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        {{Form::button('<span class="fa fa-plus fa-fw"
        aria-hidden="true"></span> Create Category', array('type' => 'submit',
        'class' => 'btn btn-default'))}}
    </div>
</div>

{!! Form::close() !!}

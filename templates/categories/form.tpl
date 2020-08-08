<form method="post" class="form f400p">
    <input type="hidden" name="id" value="{$category.id}">
    <div class="form-group">
        <label class="col-form-label">Название:</label>
        <input class="form-control" type="text" name="name" value="{$category.name}" required>
    </div>
    <div class="form-group">
        <input class="form-control btn btn-primary" type="submit" value="{$sub_name|default:"Cохранить"}">
    </div>
</form>
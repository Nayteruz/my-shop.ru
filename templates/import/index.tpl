{include file='header.tpl' h1="Загрузка файла импорта" mode='import'}
<p>
<form method="post" class="form f400p" enctype="multipart/form-data" action="/import/upload">
    <div class="form-group">
        <label class="col-form-label">Файл импорта(csv):</label>
        <input class="form-control" type="file" multiple name="import_file">
    </div>
    <div class="form-group">
        <input class="form-control btn btn-primary" type="submit" value="{$sub_name|default:"Импортировать"}"/>
    </div>
</form>
</p>

{include file='bottom.tpl'}
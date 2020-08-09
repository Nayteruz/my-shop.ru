<form method="post" class="form f400p" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="id" value="{$product.id}">
    <div class="form-group">
        <label class="col-form-label">Название:</label>
        <input class="form-control" type="text" name="name" value="{$product.name}" required>

    </div>
    <div class="form-group">
        <label class="col-form-label">Категория:</label>
        <select class="form-control" name="category_id">
            <option value="0">Не выбрано</option>
            {foreach from=$categories item=category}
                <option {if $product.category_id == $category.id}selected{/if} value="{$category.id}">{$category.name}</option>
            {/foreach}
        </select>

    </div>
    <div class="form-group">
        <label class="col-form-label">Фото товара:</label>
        <input class="form-control" type="file" multiple name="images[]" >
    </div>
    <div class="form-group">
        <label class="col-form-label">Артикул:</label>
        <input class="form-control" type="text" name="article" value="{$product.article}" required>
    </div>
    <div class="form-group">
        <label class="col-form-label">Описание:</label>
        <textarea class="form-control" name="anonce" cols="50" rows="5" required>{$product.anonce}</textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label">Цена:</label>
        <input class="form-control" type="text" name="price" value="{$product.price}" required>
    </div>
    <div class="form-group">
        <label class="col-form-label">Количество:</label>
        <input class="form-control" type="text" name="amount" value="{$product.amount}" required>
    </div>
    <div class="form-group">
        <input class="form-control btn btn-primary" type="submit" value="{$sub_name|default:"Cохранить"}">
    </div>
</form>
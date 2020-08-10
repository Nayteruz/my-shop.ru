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
                <option {if $product.category_id == $category.id}selected{/if}
                        value="{$category.id}">{$category.name}</option>
            {/foreach}
        </select>

    </div>
    <div class="form-group">
        <label class="col-form-label">Фото товара:</label>
        <input class="form-control" type="file" multiple name="images[]">
    </div>
    {if $product.images}
        <div class="form-group d-flex">
            {foreach from=$product.images item=image}
                <div class="card" style="width: 90px;">
                    <div class="card-body">
                        <button class="btn btn-danger btn-sm" data-image-id="{$image.id}"
                                onclick="return deleteImage(this)">Удалить
                        </button>
                    </div>
                    <img style="max-height: 150px; max-width: 100%; width: auto;" src="{$image.path}"
                         alt="{$image.name}">
                </div>
            {/foreach}
        </div>
    {literal}
        <script>
            function deleteImage(button) {
                let imageId = $(button).attr('data-image-id');
                imageId = parseInt(imageId);
                if (!imageId) {
                    alert('Проблема с imageId');
                    return false;
                }

                let url = '/products/delete_image';

                const formData = new FormData();
                formData.append('product_image_id', imageId);

                fetch(url, {
                    method: "POST",
                    body: formData
                }).then((response) => {
                    response.text()
                    .then((text) =>{
                        if(text.includes('error')){
                            alert('Ошибка при удалении')
                        } else {
                            location.reload();
                        }
                    })
                })


                return false;
            }
        </script>
    {/literal}
    {/if}
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

{include file='header.tpl' h1="Список категорий" mode="folder"}
<p>
    <a class="btn btn-info" href="/categories/add">Добавить</a>
</p>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название категории</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$categories item=category}
        <tr>
            <td>{$category.id}</td>
            <td>{$category.name}</td>
            <td width="140">
                <a class="btn btn-primary" href='/categories/edit?id={$category.id}'>Ред.</a>
                <form style='display:inline;' method='post' action='/categories/delete'><input type='hidden' name='id'
                                                                                               value='{$category.id}'><input
                            class="btn btn-secondary" type='submit' value='Уд.'></form>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>
{include file='bottom.tpl'}


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/assets/styles.css" rel="stylesheet" type="text/css">
    <title>{$h1}</title>
</head>
<body>
<div class="container site-wrap">
    <div class="header ">
        <div class="row bd-navbar">
            <ul class="navbar-nav bd-navbar-nav flex-row top-menu">
                <li class="nav-item"><a class="nav-link {if $mode=='list'}active{/if}" href="/products/list">Список товаров</a></li>
                <li class="nav-item"><a class="nav-link {if $mode=='folder'}active{/if}" href="/categories/list">Список категорий</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <aside class="col-3 left-column ">
            <nav class="nav flex-column nav-pills left-folders">
                <div class="folders-name">Категории</div>
                <ul class="navbar-nav list-group">
                    {$category}
                    {foreach from=$categories_shared item=category}
                        <li class="nav-item "><a class="list-group-item list-group-item-action {if $current_category.id == $category.id}active{/if}" href="/categories/view?id={$category.id}">{$category.name}</a></li>
                    {/foreach}
                </ul>
            </nav>
        </aside>
        <main class="col-9 text-side">
            <div class="content">
            {if $h1}<h1>{$h1}</h1>{/if}
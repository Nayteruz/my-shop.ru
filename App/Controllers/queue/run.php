<?php

$id = Request::getIntFromGet('id');

$result = TasksQueue::run($id);

//Responce::redirect();

<?php


class Db
{
    private static $host = 'my-shop.ru';
    private static $database = 'my_shop_lesson';
    private static $username = 'mysql';
    private static $password = 'mysql';

    private static $connect;

    public static function getConnect()
    {
        if (is_null(static::$connect)) {
            static::$connect = static::connect();
        }

        return static::$connect;
    }

    public static function query($query)
    {
        $connect = static::getConnect();
        $result = mysqli_query($connect, $query);

        if (mysqli_errno($connect)) {
            var_dump(mysqli_errno($connect));
            exit;
        }

        return $result;
    }

    public static function fetchAll(string $query): array
    {
        $result = static::query($query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function fetchRow(string $query): array
    {
        $result = static::query($query);

        $row = mysqli_fetch_assoc($result);
        if (is_null($row)) {
            $row = [];
        }

        return $row;
    }

    public static function fetchOne(string $query): string
    {
        $result = Db::query($query);

        $row = mysqli_fetch_row($result);

        return (string)($row[0] ?? '');
    }

    public static function delete(string $table_name, string $where)
    {
        $query = 'DELETE FROM ' . $table_name;
        if ($where) {
            $query .= ' WHERE ' . $where;
        }
        Db::query($query);

        return static::affectedRows();
    }

    public static function insert(string $table_name, array $fields)
    {
        $field_names = [];
        $field_values = [];

        foreach ($fields as $field_name => $field_value) {
            $field_names[] = "`$field_name`";
            $field_values[] = "'$field_value'";
        }
        $field_names = implode(',', $field_names);
        $field_values = implode(',', $field_values);

        $query = "INSERT INTO $table_name($field_names) VALUES ($field_values)";

        Db::query($query);

        return Db::lastInsertId();
    }

    public static function update(string $table_name, array $fields, string $where)
    {
        $set_fields = [];

        foreach ($fields as $field_name => $field_value) {
            $set_fields[] = "`$field_name` = '$field_value'";
        }
        $set_fields = implode(',', $set_fields);
        $query = "UPDATE $table_name SET $set_fields";
        if ($where) {
            $query .= ' WHERE ' . $where;
        }

        Db::query($query);

        return Db::affectedRows();
    }

    public
    static function affectedRows()
    {
        $connect = static::getConnect();
        return mysqli_affected_rows($connect);
    }

    static function lastInsertId()
    {
        $connect = static::getConnect();
        return mysqli_insert_id($connect);
    }

    private
    static function connect()
    {
        $connect = mysqli_connect(static::$host, static::$username, static::$password, static::$database);

        if (mysqli_connect_errno()) {
            $error = mysqli_connect_error();
            var_dump($error);
            exit;
        }

        return $connect;

    }


}
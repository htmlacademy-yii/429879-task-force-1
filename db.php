
<?php
if (!file_exists('db_config.php')) {
    exit('Нет конфигурации для БД');
}

require_once 'db_config.php';

$connection = mysqli_connect($database_host, $database_user, $database_password, $database_name);

if ($connection->connect_error) {
    echo 'Ошибка подключения:' . $connection->connect_error;
    exit('Невозможно подключиться к базе данных');
}

mysqli_options($connection, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
mysqli_set_charset($connection, 'utf8');

function insert_user(mysqli $link, array $user_info)
{
    $user_insert_sql =
        "INSERT INTO
			`users`
			(
				`date_register`,
				`name`,
				`email`,
				`password`,
        `date_birth`,
        `city_id`
			)
		VALUES
			( '$user_info[3]', '$user_info[1]', '$user_info[0]', '$user_info[2]', '$user_info[3]', 2)";


if ($link->query($user_insert_sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $user_insert_sql . "<br>" . $link->error;
};
}


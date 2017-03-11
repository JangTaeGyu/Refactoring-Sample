<?php

use App\Models\Session as Database;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

Database::delete(session_id());

redirect(APP_URL);

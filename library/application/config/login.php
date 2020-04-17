<?php

$status = 0;
echo "<script src=\"/public/js/jquery.js\"></script>";
echo "<script type=\"text/javascript\">
            function clearAuth() {
                jQuery.ajax({
                    type: \"GET\",
                    url: \"/admin/view\",
                    async: false,
                    username: \"logmeout\",
                    password: \"123456\",
                    headers: { \"Authorization\": \"Basic xxx\" }
                })
                    .done(function(){
                    })
                    .fail(function(){
                        window.location = \"/admin/view\";
                    });
                return false;
            }
      </script>";
if (!empty($_SERVER['PHP_AUTH_USER'])) {
    $row = $this->model->isAdmin();
    if ($row != false) {
        $hash = htmlentities ($row[0]["password"]);
        $pass = htmlentities ($_SERVER['PHP_AUTH_PW']);
        if (password_verify($pass, $hash)) {
            header("200 OK HTTP/1.1");
            $status = 1;
        } else {
            echo "<script>alert('Password is incorrect!');</script>";
            echo "<script type=\"text/javascript\">clearAuth();</script>";
        }
    } else {
        echo "<script>alert('Such user not found!');</script>";
        echo "<script type=\"text/javascript\">clearAuth();</script>";
    }
} else {
    // если ошибка при авторизации, выводим соответствующие заголовки и сообщение
    header('HTTP/1.1 401 Authorization Required');
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    // The actions to be done when the user clicks on 'cancel'
    die("401 Access denied");
}
return $status;

?>
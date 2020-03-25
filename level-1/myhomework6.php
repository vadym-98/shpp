<?php
$counter = file_get_contents("counter.txt");
if ($counter === "") {
    file_put_contents("counter.txt", 1);
} else {
    file_put_contents("counter.txt", ++$counter);
}
echo file_get_contents("counter.txt");
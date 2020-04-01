<?php

/**
 * This script sets headers for
 * cross origin resource sharing
 */

header('Access-Control-Allow-Origin: http://example.loc');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Access-Control-Allow-Credentials');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS, DELETE');
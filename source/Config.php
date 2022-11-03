<?php

$require_secure = file_get_contents(__DIR__ . "/../secure/db_config.json");
$db = json_decode($require_secure);

const ROOT = "http://127.0.0.1/";

const ApiCEP = [
    "url" => "https://viacep.com.br/ws/",
    "callback" => "/json/"
];

const PersonDATA = [
    "name" => "Marcelo Silva",
    "gmail" => "mdmion@gmail.com",
    "linkedin" => "https://www.linkedin.com/in/marcelo-ramos-silva/",
    "github" => "https://www.github.com/Mdmion",
    "git_status" => "https://github-readme-stats.vercel.app/api?username=Mdmion&show_icons=true&theme=darcula&include_all_commits=true&count_private=true",
    "git_commits" => "https://github-readme-stats.vercel.app/api/top-langs/?username=Mdmion&layout=compact&langs_count=5&theme=darcula",
    "git_cobrinha" => "https://raw.githubusercontent.com/Mdmion/Mdmion/output/github-contribution-grid-snake.svg"
];

const IframeMAPS = [
    "request" => "https://maps.google.com/maps?q=",
    "output" => "&t=&z=13&ie=UTF8&iwloc=&output=embed"
];

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => $db->host,
    "port" => $db->port,
    "dbname" => "cepsearch",
    "username" => $db->user,
    "passwd" => $db->pass,
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ],
]);

function url(string $path = null): string
{
    if ($path) {
        return ROOT . "{$path}";
    }
    return ROOT;
}
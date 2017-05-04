<?php
error_reporting(1);
$target = __DIR__ . '/../coffeboy'; // 生产环境web目录
$token = '';
$wwwUser = 'www-data';
$wwwGroup = 'apache';
$json = json_decode(file_get_contents('php://input'), true);
if (empty($json['token']) || $json['token'] !== $token) {
   // exit('error request');
}
$repo = $json['repository']['name'];
$dir = __DIR__ . '/../coffeboy/' . $repo;
$cmds = array(
	"git pull",
	"jekyll build",
);
foreach ($cmds as $cmd) {
	shell_exec($cmd);

}

//echo "$dir";

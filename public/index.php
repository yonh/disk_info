<?php

set_time_limit(0);

if (@$_REQUEST['path']) {
	$path = @$_REQUEST['path'];
} else {
	$user = get_current_user();
	$path = "/home/$user";
}

$msg = `cd $path; ls $path |xargs du -sh`;

echo "<form action='index.php'>";
echo "<input name='path' value='$path'/>";
echo "<input type='submit' value='show'/>";

print('<hr/>');
pp(`df -h`);
print('<hr/>');
pp($msg);

echo "</form>";

function pp($msg) {
	echo "<pre>";
	print_r($msg);
	echo "</pre>";
}

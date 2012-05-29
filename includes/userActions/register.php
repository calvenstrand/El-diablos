<?php
function cleaner ($s) {
	if (get_magic_quotes_gpc()) {
		$s = stripslashes($s);
	}
	if (phpversion() >= '4.3.0') {
		$s = mysql_real_escape_string($s);
	} else {
		$s = mysql_escape_string($s);
	}
	return $s;
}

function checkduplicates ($s) {
	$mysqlidup = new mysqli('localhost', 'root', '', 'diablofy');
	if ($mysqlidup->connect_errno) {
		echo 'Failed to connect to MySQL: (' . $mysqlidup->connect_errno . ') ' . $mysqlidup->connect_error;
	} else {
		$st = $mysqlidup->prepare('
			SELECT * FROM users
			WHERE username = ?
		');
		$st->bind_param('s', $s);
		if ($st->execute()) {
			if ($st->fetch() == 1) {
				echo 'Duplicate!';
				$duplicate = 1;
				return $duplicate;
			} else {
				echo 'Not duplicate!';
				$duplicate = 0;
				return $duplicate;
			}
		} else {
			echo 'Failed duplicate-search.';
		}
	}
}

$mysqli = new mysqli('localhost', 'root', '', 'diablofy');
if ($mysqli->connect_errno) {
	echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
} else {
	$username = cleaner($_POST['username']);
	$password = cleaner($_POST['password']);
	$email = cleaner($_POST['email']);
	$dups =	checkduplicates($username);
	if ($dups == 1) {
		header('Location: ../../register.php?error=1');
		exit;
	} else {
		$stmt = $mysqli->prepare('
			INSERT INTO users (username, password, email)
			VALUES (?, ?, ?)
		');
		$stmt->bind_param('sss', $username, $password, $email);
		if ($stmt->execute()) {
			header('Location: ../../index.php');
			exit;
		} else {
			echo 'Failed to insert.';
		}
	}
}
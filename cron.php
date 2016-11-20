<?php
namespace cbulock\chore_notify;
date_default_timezone_set('America/Detroit');

require_once('vendor/autoload.php');


$valid_day = (new Schedule)->valid_day();

if ($valid_day) {
	$users = (new User)->all();

	$chores = (new Chores)->get();

	foreach($users as $user) {
		$needs_text = TRUE;

		foreach($chores as $chore) {
			if ($user->id == $chore->user_id) $needs_text = FALSE;
		}

		if ($needs_text) (new Message)->send($user->number, "Don't forget to do a chore today!");
	}
}




<?php

namespace cbulock\chore_notify;


class Chores
{
	public function get($date = NULL) {
		if ($date == NULL) $date = date('Y-m-d');

		$settings = (new Settings)->get();

		$chores = json_decode(file_get_contents($settings->chore_url));

		$results = [];

		foreach($chores as $chore) {
			if ($chore->date == $date) {
				$results[] = $chore;
			}
		}

		return $results;
	}
}
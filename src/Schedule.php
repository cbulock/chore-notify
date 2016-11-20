<?php

namespace cbulock\chore_notify;


class Schedule
{
	public function valid_day($date = NULL) {
		/* Chores to be completed every Monday and Tuesday,
			 also every Friday, Saturday and Sunday of the
			 second and forth weekends of the month */

		if ($date == NULL) $date = date('Y-m-d');

		$valid_day = FALSE;
		$day_of_week = date('D', strtotime($date));

		if ($day_of_week == 'Mon' || $day_of_week == 'Tue') {
			$valid_day = TRUE;
		}

		//Weekends are determined by the Saturday, need to find the nearest
		switch ($day_of_week) {
			case 'Fri':
			case 'Sat':
			case 'Sun':
				$weekend_date = \DateTime::createFromFormat("Y-m-d", $date)
					->modify("-4 days")->modify("next Saturday");
				$closest_saturday = $weekend_date->format("Y-m-d");

				$second_saturday = date('Y-m-d', strtotime('Second Saturday of ' . date('F Y', strtotime($date))));
				$fourth_saturday = date('Y-m-d', strtotime('Fourth Saturday of ' . date('F Y', strtotime($date))));

				if ($closest_saturday == $second_saturday || $closest_saturday == $fourth_saturday) {
					$valid_day = TRUE;
				}
		}

		return $valid_day;

	}
}
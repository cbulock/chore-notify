<?php

namespace cbulock\chore_notify;


class User
{
	public function all() {

		$settings = (new Settings)->get();

		return $settings->users;
	}
}
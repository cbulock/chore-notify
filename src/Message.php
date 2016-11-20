<?php

namespace cbulock\chore_notify;


class Message
{

	public function send($to, $message) {

		$settings = (new Settings)->get();

		$client = new \Twilio\Rest\Client($settings->twilio_sid, $settings->twilio_token);
		$client->messages->create(
			$to,
			[
				'from' => $settings->from_number,
				'body' => $message
			]
		);
	}
}
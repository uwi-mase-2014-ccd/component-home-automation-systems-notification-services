<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	require_once './swiftmailer/lib/swift_required.php';

	define('SENDER_EMAIL_NAME', "Home Automation Systems' Email Client");
	define('SENDER_EMAIL_ADDR', 'notifyhas@gmail.com');
	define('SENDER_EMAIL_ADDR_PASSWORD', 'ctrl-alt-delete');
	
	
	try {
	
		if (!isset($_POST["To"]) || !isset($_POST["Subject"]) || !isset($_POST["Body"])) {
			$response = array(
				'code' => 400,
				'data' => new stdClass,
				'debug' => array(
					'data' => new stdClass,
					'message' => 'This service requires the following arguments [To, Body, Subject]. THe request body must be formatted as URL-Form-Encoded'
				)
			);
	
			die(json_encode($response, JSON_PRETTY_PRINT));
		}
		//echo "Constants Created\n";
	
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587,'tls');
		$transport->setUsername(SENDER_EMAIL_ADDR);
		$transport->setPassword(SENDER_EMAIL_ADDR_PASSWORD);
	
		//echo "Transport Created\n";
	
		$receiverAddress = $_POST["To"];
		$emailSubject = $_POST["Subject"];
		$emailBody = $_POST["Body"];
	
		//echo "Arguments Extracted\n";
	
		// Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);
	
		// Create the message
		$message = Swift_Message::newInstance();

		// Give the message a subject
		$message->setSubject($emailSubject);

		// Set the From address with an associative array
		$message->setFrom(array(SENDER_EMAIL_ADDR => SENDER_EMAIL_NAME));

		// Set the To addresses with an associative array
		$message->setTo(array($receiverAddress));

		// Give it a body
		$message->setBody($emailBody,'text/html');
	
		// Send the message!
		$result = $mailer->send($message);
		
		$response = array(
			'code' => 200,
			'data' => array(
				'From' => SENDER_EMAIL_ADDR,
				'To' => $receiverAddress,
				'Subject' => $emailSubject,
				'Body' => $emailBody
			),
			'debug' => new stdClass
		);
	} catch (Exception $e) {
		$response = array(
			'code' => 503,
			'data' => new stdClass,
			'debug' => array(
				'data' => array(
					'Caught exception: ' => $e->getMessage(),
				),
				'message' => 'An exception has occured.'
			)
		);
	}
	
	echo json_encode($response, JSON_PRETTY_PRINT);
	
} else {
	$response = array(
		'code' => 400,
		'data' => new stdClass,
		'debug' => array(
			'data' => new stdClass,
			'message' => 'his service only accepts a POST Request.'
		)
	);
	
	echo json_encode($response, JSON_PRETTY_PRINT);
	//echo "This service only accepts a POST Request.";
	//When a web page is requested in a browser a 'GET' request is sent for that specific URL
}
	
	


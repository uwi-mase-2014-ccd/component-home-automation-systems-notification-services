Project H.A.S Component - Email Notification Documentation
------------------------------------------------------------
Prepared for: Dr. Curtis Busby-Earle

Prepared by: Aston Hamilton, Renee Whitelocke, Orane Edwards

March 18, 2014

Version number: 000-0002


##Component Description
The purpose of this component is to provide a client with Email Notification

##Services
Email Notification Web Service

The Email Notification web service was created with the aim of allowing integration with other components and other applications to serve the purpose of alerting a client when an email is sent. 
	
###Endpoint
This component has been deployed to the UWI server at the endpoint: 

	POST http://cs-proj-srv:8083/service-email/src/send_email.php

###Arguments
	To: 
		This STRING argument specifies the email recipient. This requires a valid email address.

	Subject:
		This STRING argument specifies the subject of the email to be sent, which is displayed 
		within the recipient's desired email client. 

	Body:
		This STRING argument specifies the content of the email. Email content holds a 
		'text/html' format in order to facilitate the inclusion of HTML within messages.
		
	
###Description:
+ Send Email Notification
	This web service flexible message pushing service, which allows email notifications
	to be sent directly to subscribed clients. It seamlessly integrates Google's 
	email services with any application desirous of using this service.
	
###Success Schema:
+ Email Notification
	- On Success Refer to _**response-200.json**_
	- On An Invalid HTTP Method or Invalid Parameters Refer to _**response-400.json**_
	- On Any Other Error Refer to _**response-503.json**_


####Deployed Server Notes:
This component has been deployed to a server that is provisioned by UWI and does not allow outbound connections.
Because of this restriction, the Email Notification script will not successfully send any emails from this server.
To allow other components to utilize the functionality, a clone of the script is deployed to a publicly accessible 
private server, at the endpoint:

	POST http://uwi-has.appspot.com/email/



	
	

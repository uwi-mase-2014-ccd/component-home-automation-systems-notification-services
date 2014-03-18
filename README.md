Project H.A.S Component - Email Notification Documentation
------------------------------------------------------------
Prepared for: Dr. Curtis Busby-Earle

Prepared by: Aston Hamilton, Renee Whitelocke, Orane Edwards

March 18, 2014

Version number: 000-0001


##Component Description
The purpose of this component is to provide a client with Email Notification

##Services
+ Email Notification Web Service

	The Email Notification web service was created with the aim of allowing integration with other components and other applications to serve the purpose of alerting a client when an email is sent. 
	
###Endpoint 
+ Email Notification : <serverAddress>/emailClient/send_email.php

###Arguments
+ Email Notification 
	+ To: 
		This argument refers to the email recipient. This requires a valid email address.

	+ Subject:
		This argument refers to the subject of the email to be sent, which is displayed 
		within the recipient's desired email client. 

	+ Body:
		This argument refers to the content of the email. Email content holds a 
		'text/html' format in order to facilitate the inclusion of HTML within messages.
		
	
###Description:
+ Email Notification
	This web service flexible message pushing service, which allows email notifications
	to be sent directly to subscribed clients. It seamlessly integrates Google's 
	email services with any application desirous of using this service.
	
###Success Schema:
+ Email Notification
	- On Success Refer to _**email-notification-200.json**_
	- On Any Error Refer to _**email-notification-503.json**_
	- On An Invalid HTTP Method Refer to _**email-notification-400.json**_


	
	

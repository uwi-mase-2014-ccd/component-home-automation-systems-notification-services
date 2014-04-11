Project H.A.S Component Documentation - Email Notification Component
---------------------------------------------------------------------
Author Group: **Home Automation Systems**

Prepared for: Dr. Curtis Busby-Earle

Prepared by: Aston Hamilton, Renee Whitelocke, Orane Edwards

March 18, 2014

Version number: 000-0002


##Component Description
The purpose of this component is to provide a client with Email Notification. It accepts a recipient email address, an email subject and body, and it composes the email and send it to the recipient from the _notifyhas@gmail.com_ email address.

##Services
The _Send Email Notification_ web service is exposed by this component, with the aim of allowing integration with other components and other applications to serve the purpose of alerting a client when an email is sent. 
    
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
        This STRING argument specifies the content of the email. Email content has
        'text/html' format in order to facilitate the inclusion of HTML within messages.
        

###Responses:
####Email Successfully Sent
On Successful Authentication a response similar to the following sample response is returned:
```javascript    
{
    "code": 200,
    "data": {
        "From": "notifyhas@gmail.com",
        "To": "youremail@gmail.com",
        "Subject": "testemail",
        "Body": "fff"
    },
    "debug": {}
}
```
    Refer to schema: response-200.json

####Invalid Recipient Address
If the recipient address does not match the typically expected pattern for an email address, a response similar to the following sample response is returned:
```javascript    
{
    "code": 500,
    "data": {},
    "debug": {
        "data": {
            "Caught exception: ": "Address in mailbox given [youremail@gmail#com] does not comply with RFC 2822, 3.6.2."
        },
        "message": "An exception has occured."
    }
}
```
    Refer to schema: response-500.json

####Missing Arguments
If a required argument is not submitted, a response similar to the following sample response is returned:
```javascript
{
    "code": 400,
    "data": {},
    "debug": {
        "data": {},
        "message": "This service requires the following arguments [To, Body, Subject]. The request body must be formatted as URL-Form-Encoded"
    }
}
```
    Refer to schema: response-400.json
    
####Invalid HTTP Method
On An Invalid HTTP Method a response similar to the following sample response is returned:
```javascript
{
    "code": 400,
    "data": {},
    "debug": {
        "data": {},
        "message": "This service only accepts a POST Request."
    }
}
```
    Refer to schema: response-400.json
    
####Unexpected Error
On Any Unexpected Error a response similar to the following sample response is returned:
```javascript
{
    "code": 500,
    "data": {},
    "debug": {
        "data": {},
        "message": "An exception has occured"
    }
}
```
    Refer to schema: response-500.json

####Deployed Server Notes:
This component has been deployed to a server that is provisioned by UWI and does not allow outbound connections.
Because of this restriction, the Email Notification script will not successfully send any emails from this server.
To allow other components to utilize the functionality, a clone of the script is deployed to a publicly accessible 
private server, at the endpoint:

    POST http://uwi-has.appspot.com/email/



    
    

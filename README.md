# SugarCRM 7 | Plivo Integration

A Plivo SMS API client. Integrated into SugarCRM

##### BETA

Please try it out, and let me know if things are working as expected.

## Setup

Download into the root directory of your SugarCRM 7 instance. After download Run Quick Repair and Rebuild.
You will have a Plivo section in Admin->Connectors->Set Connector Properties
Please enter your AUTH ID and AUTH TOKEN along with your outbound SMS Phone Number.
Two REST Endpoints will be added to Sugar /sms/send and /sms/:record

/sms/send allows you to send a message you must include in your POST dst_phone and message
/sms/:record allows you to receive detailed information about a specific call
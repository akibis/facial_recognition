########## CHANGELOG ##########
Version 1.0 - Vanilla API (SELECT, CREATE, UPDATE, DELETE)



############ USAGE ############

SELECT (select.php?id=<number>):
Returns a contact from the database according to its specific id. It uses the HTTP GET request which can be tested from any browser simply by copying and pasting the link.

Parameters:
id

For example: http://www.yourdomain.com/api/select?id=1

CREATE (create.php):
Creates a new contact in the database. It uses the HTTP POST request, meaning that you will have to use a Chrome extension (like Advanced Rest Client) in order to test this one. On Android you can specify exactly what kind of HTTP request you want. 

Parameters:
id
user_id
contact_id
first_name
last_name
phone
address

As you can see, the "match_found" field is not to be specified. This is set automatically to 0, and updated if a match is found. A future update will remove the id field from the list of parameters, instead it will be auto-generated on creation to enforce uniqueness.

DELETE (delete.php):
Deletes a record from the contact table based on its unique id. Uses HTTP DELETE request. Must also use Chrome extension in order to test.

Parameters:
id

UPDATE (update.php):
Updates a record's fields based on its unique id. Uses the HTTP PUT request. Must also be tested with a Chrome extension. NOTE: you cannot change the "id" or "match_found" fields. These are set on creation. Only "match_found" has the ability to change (boolean flag) but this is done on the backend only. Additionally, ALL parameters must be filled in, NULLs will simply erase the data in that particular field.

Parameters:
id
user_id
contact_id
first_name
last_name
phone
address

Since we are connecting to this API via Android, the Volley library should be utilized. More information can be found at the link below:

https://developer.android.com/training/volley/index.html

UPLOAD IMAGE (upload-image.php):
Uploads a base64-encoded bitmap image to the 'face' table as a MEDIUMBLOB (max size 16MB).

Parameters:
id
user_id
contact_id
blob (the binary image encoded as a base64 string)

GET IMAGE (get-image.php):
Retrieves an image from the 'face' table by unique id. This is only a test function to make sure that your image uploaded correctly.

Parameters:
id
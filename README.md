# UK Postcode API
A simple API which you can install on your webserver to serve OS OpenData straight from your MySQL Database.

## Install
To install you will need to download Composer and install the packages using `composer install`

Next you will need to download a copy of the OS OpenData CodePoint dataset from Ordnance Survey - https://www.ordnancesurvey.co.uk/business-and-government/products/code-point-open.html

In the schema folder you will find the table schema for the Postcode Table. Create this table and if you've got your data on your server you should
be able to do:

```
LOAD DATA INFILE 'CSV/bd.csv' INTO TABLE postcode
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n';
```

Once the data is loaded navigate to your directory `http://localhost/YOUR_DIRECTORY` you will see a Page Not Found error (Thats okay, as our API endpoints are documented below!)

##API Endpoints

#### Find Coordinates for Postcode
**URL:** `/v1/postcode/{postcode}`<br/>
**Returns:** This returns a JSON encoded array which contains the Postcode as well as thhe Eastings, Northings, Latitude and Longitude

##TODO
* Change the index file so it doesnt display `Page Not Found` when the user navigates to it.
* Create an autoloader so we can easily load the OS data into the database.
* Support PostGIS & other databases.
* Create new API endpoints - such as find random postcode or find nearest postcode.
* Link in with other data sources to provide more information for the postcode.

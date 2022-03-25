# ID.me Sample PHP Web App
This is a sample seed PHP Web App integrated with ID.me via OAuth 2.0

# Installation and Setup
In order to run the example you need to have `composer` and `php` installed.

You also need to set your client configuration settings in a `.env` file.

````bash
# .env file
CLIENT_ID=YOUR_CLIENT_ID
CLIENT_SECRET=YOUR_CLIENT_SECRET
REDIRECT_URI=http://localhost:3000/callback.php
AUTH_URL=https://api.id.me/oauth/authorize
TOKEN_URL=https://api.id.me/oauth/token
ATTRIBUTES_URL=https://api.id.me/api/public/v3/attributes.json
````

Run the following to install the dependencies and start the server.

````bash
composer install
php -S localhost:3000
````

Now you can view the app at [http://localhost:3000](http://localhost:3000)

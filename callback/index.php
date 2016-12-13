<?php

session_start();

require_once '../vendor/autoload.php';
require_once 'conf.php';

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => CLIENT_ID,
    'clientSecret'            => CLIENT_SECRET,
    'redirectUri'             => REDIRECT_URI,
    'urlAuthorize'            => AUTH_URL,
    'urlAccessToken'          => TOKEN_URL,
    'urlResourceOwnerDetails' => ATTRIBUTES_URL
]);

if (!isset($_GET['code'])) {
    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();
    // Get the state generated for you and store it to the session.
    $_SESSION['oauth2state'] = $provider->getState();
    // Redirect the user to the authorization URL.
    header('Location: ' . filter_var($authorizationUrl, FILTER_SANITIZE_URL));
    exit;
} else {
    try {
        // Try to get an access token using the authorization code grant.
        // Pass in the affiliation in the scope
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
        // // Using the access token, we may look up details about the user
        $resourceOwner = $provider->getResourceOwner($accessToken);
        // // The JSON payload of the response
        $_SESSION['payload'] = json_encode($resourceOwner->toArray());
        header('Location: ' . '/#'.$accessToken.'');
        exit;
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
        // Failed to get the access token or user details.
        exit($e->getMessage());
    }
}

?>

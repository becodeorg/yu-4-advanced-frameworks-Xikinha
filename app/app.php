require 'vendor/autoload.php';

// Fetch the saved access token from somewhere. A database for example.

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

// It's now possible to request data from the Spotify catalog
print_r(
    $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
);
RewriteEngine On
 
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php [QSA,L]


function getConnection() {
    try {
        $db_username = "fr_api";
        $db_password = "test20151!";
        $conn = new PDO('mysql:host=localhost;dbname=facial_recognition', $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}
<?php

include 'includes/user.class.php';
include 'includes/role.class.php';

include 'views/htmlstart.php';

$user = new User();
$user->findByUsername('frank');
 
if ($user->hasPrivilege('view others data')) {
    echo ' OK';
}

?>
pagina voor registratie
<?php

include 'views/htmlend.php';

?>

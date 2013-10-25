<?php

include 'system/views/htmlstart.php';

foreach($errors as $error)
	echo '<strong>' . $error . '</strong><br>';

echo $form->start();
echo $form->render('title');
echo $form->render('description');
echo $form->render('start');
echo $form->render('stop');
echo $form->render('Verzenden');
echo $form->end();

include 'system/views/htmlend.php';

?>

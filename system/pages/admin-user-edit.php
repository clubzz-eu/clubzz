<?php

include 'system/views/admin-start.php';

foreach($errors as $error)
	echo '<strong>' . $error . '</strong><br>';
        
echo $form->start();
echo $form->render('notify_email');
echo $form->render('notify_sms');
echo $form->render('email_verified');
echo $form->render('bedrijfsnaam');
echo $form->render('user_type');
echo $form->render('username');
echo $form->render('password');
echo $form->render('last_visit');
echo $form->render('email');
echo $form->render('bday');
echo $form->render('adres');
echo $form->render('postcode');
echo $form->render('woonplaats');
echo $form->render('provincie');
echo $form->render('land');
echo $form->render('telefoonnummer');
echo $form->render('kvknummer');
echo $form->render('contactpersoon');
echo $form->render('btwnummer');
echo $form->render('website');
echo $form->render('facebook');
echo $form->render('twitter');
echo $form->render('soundcloud');
echo $form->render('linkedin');
echo $form->render('register_date');
echo $form->render('lng');
echo $form->render('lat');
echo $form->render('session_id');
echo $form->render('huisnummer');
echo $form->render('active');
echo $form->render('activate_key');
echo $form->render('activate_before');
echo $form->render('profile_image');
echo $form->render('credits');
echo $form->end();

include 'system/views/admin-end.php';

?>

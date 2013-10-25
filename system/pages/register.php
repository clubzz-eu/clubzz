<?php

include 'system/views/htmlstart.php';

?>
<script>
$(function() {
	$('#bday').datepicker({ dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "<?php echo $daterange; ?>",defaultDate: "-18y" });
	$('#bday').datepicker( "option", "dayNamesMin", [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ] );
	$('#bday').datepicker( "option", "monthNamesShort", [ "jan", "feb", "mrt", "apr", "mei", "jun", "jul", "aug", "sep", "okt", "nov", "dec" ] );
	$('#info-img').mouseover(function(e) {
        $('#info-div').show();
    });

});
</script>
<h1>Registreren</h1>
<?php

foreach($errors as $error)
	echo '<strong>' . $error . '</strong><br>';

echo $form->start();
echo $form->render('email');
echo $form->render('username');
echo $form->render('password');
echo $form->render('pw_repeat');
echo $form->render('bday');
echo $form->render('postcode');
echo $form->render('facebook');
echo $form->render('twitter');
echo $form->render('notify_email');
echo $form->render('verzenden');
echo $form->end();

include 'system/views/htmlend.php';

?>

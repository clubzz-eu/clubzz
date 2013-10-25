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
<h1>Mijn Profiel</h1>

<?php

foreach($errors as $error)
	echo '<strong>' . $error . '</strong><br>';

echo $form->start();
echo $form->render('notes');
echo $form->render('sex');
echo $form->render('events');
echo $form->render('reactions');
echo $form->render('username');
echo $form->render('bday');
echo '<hr>';
echo $form->render('postcode');
echo $form->render('adres');
echo $form->render('woonplaats');
echo $form->render('provincie');
echo $form->render('telefoonnummer');
echo '<hr>';
echo $form->render('facebook');
echo $form->render('twitter');
echo '<hr>';
echo $form->render('email');
echo '<br>';
echo $form->render('password');
echo $form->render('pw_repeat');
echo '<hr>';
echo $form->render('notifyEmail');
echo $form->render('verzenden');
echo $form->end();

include 'system/views/htmlend.php';

?>

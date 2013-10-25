<?php

include 'system/views/htmlstart.php';

?>
contactpagina
<!--
<section>

                <div class="content fleft">
                    <div style="width:500px;">
                        <h1>Wat is Clubzz?</h1>
                        <div class="tekstbox">

                        </div>
                    </div>
                    
                    
                </div>

                <div class="content fright">
                    <div style="width:380px;">
                        <h1>Veel gestelde vragen</h1>
                        <div class="tekstbox">
                            <ul>
                                <li>Zoeken naar leuke feesten bij jou in de buurt</li>
                                <li>Recensies schrijven</li>
                                <li>Bekijken waar jouw favoriete DJ dit weekend draait</li>
                                <li>Op de hoogte blijven van je favoriete club</li>
                                <li>Exclusieve tickets voor clubs</li>
                                <li>Natuurlijk een V.I.P. arrangement winnen door pre-registratie</li>
                                <li>En nog veel meer!</li>
                            </ul>
                        </div>
                    </div>
                    <div style="width:380px;">
                        <h1>Nieuwste recensie</h1>
                        <div class="tekstbox">
                            Dat nieuwe restaurant in Rotterdam (De Stille Zwaan) is echt top! Goed eten en nette service! Aenean porta, elit nec interdum bibendum, eros est
                            sollicitudin elit, in condimentum lectus lorem in sapien.<br/><br/>
                            <strong>Geschreven door:</strong> Peter S.
                        </div>
                    </div>
                </div>
            </section>

            <div class="clear"></div>
            <div class="push"></div>
        </div>
!-->
<?        

$name = '';
$email = '';
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['name']))
		$name = $_POST['name'];
	if(isset($_POST['email']))
		$email = $_POST['email'];
	if(isset($_POST['message']))
		$message = $_POST['message'];
		
	include 'views/contact_sent.php';
	include 'views/htmlend.php';
	exit;
}

include 'system/views/contactform.php';



include 'system/views/htmlend.php';

?>

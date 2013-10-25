<?php
function createToken()
{
	$token = getRandomHash();
	$GLOBALS['session']->setValue('token', $token);
	$GLOBALS['session']->save();
	return $token;
}
?>
<div id="top">
    <div id="logo">
        <a href="<?php echo url('home'); ?>"><img src="<?php echo url('images/logo/logo.png'); ?>" alt="" /></a>
    </div>
    <div id="inloggen">
        <?php if(isset($loginMessage)) echo $loginMessage; ?>
        <form action="login" method="post" class="login_form">
        	<input type="hidden" name="token" value="<?php echo createToken(); ?>" />
            <div class="fleft">
                <label>E-mailadres</label>
                <div class="input"><input name="email" id="email" type="text" size="15" /></div>
            </div>
            <div class="fleft">
                <label>Wachtwoord</label>
                <div class="input"><input name="password" id="password" type="password" size="15" /></div>
            </div>
            <button class="fleft" type="submit">Inloggen</button>
            <div class="clear"></div>
        </form>
    </div>
</div>
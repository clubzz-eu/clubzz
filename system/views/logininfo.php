<div id="top">
    <div id="logo">
        <a href="index.html"><img src="images/logo/logo.png" alt="" /></a>
    </div>
    <div id="inloggen">
        <form action="login" method="post" class="login_form">
            <div class="fleft">
               Ingelogd als: <?php echo $GLOBALS['auth']->getUser()->getUsername(); ?>
            </div>
             <input type="hidden" name="logout" value="Uitloggen" />
            <button class="fleft" type="submit">Uitloggen</button>
            <div class="clear"></div>
        </form>
    </div>
</div>
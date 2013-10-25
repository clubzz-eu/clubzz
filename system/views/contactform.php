	<h1>Contact</h1>
    <form action="contact" method="post">
    	<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Naam" /><br>
    	<input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email" /><br>
    	<textarea name="message" placeholder="Bericht"><?php echo $message; ?></textarea><br>
    	<input type="submit" value="Verzenden" />
    </form>

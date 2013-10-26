<nav>
<?php

function buildmenu()
{
	$menu = new system\classes\Menu('admin');
	echo $menu->render();
}

buildmenu();
?>
</nav>
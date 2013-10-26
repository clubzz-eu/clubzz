<nav>
<?php

function buildmenu()
{
	$menu = new system\classes\Menu('main');
	echo $menu->render();
}

buildmenu();
?>
</nav>
<?php

include 'system/element.class.php';

include 'system/views/admin-start.php';

?>
<script>
$( document ).ready(function() {
	$('#view-table tr').click(function(e) {
		window.location = "<?php echo url(); ?>admin/permission/view/" + $(this).attr('data-id');
	});
});
</script>
<?php

$imgEdit = new Img();
$imgEdit->setClass('icon')->setSrc('edit.png')->setTitle('Bewerk');
$imgDelete = new Img();
$imgDelete->setClass('icon')->setSrc('delete.png')->setTitle('Verwijder');
$edit = new A();
$delete = new A();

echo '<h1>Toegangsrechten</h1>' .
'<table id="view-table">' .
'<tr>' .
'<th>Controller[:Method]</th>' .
'<th>Toegang voor:</th>' .
'<th>aktie</th>' .
'</tr>';
foreach ($perms as $permission) {
	$roles = $permission->getRoles();
    echo '<tr data-id="' . $permission->getId() . '">' .
	'<td>' . $permission->getDescription() . '</td>' .
	'<td>';
	foreach ($roles as $role) {
		echo $role->getName() . '<br>';
	}
	$edit->setHref('admin/permission/edit/' . $permission->getId());
	$delete->setHref('admin/permissions');
	echo '</td>';
	echo '<td>' . $edit->Render($imgEdit->Render()) . $delete->Render($imgDelete->Render()) . '</td>';
	echo '</tr>';
}

echo '</table>';

include 'system/views/admin-end.php';

?>

<?php

include 'system/views/admin-start.php';

?>
<script>
$( document ).ready(function() {
	$('#view-table tr').click(function(e) {
		window.location = "<?php echo url(); ?>admin/user/view/" + $(this).attr('data-id');
	});
});
</script>
<?php

$imgEdit = new \system\classes\Tag('img', Array('class' => 'icon', 'src' => url('images/edit.png'), 'title' => 'Bewerk'));
$imgDelete = new \system\classes\Tag('img', Array('class' => 'icon', 'src' => url('images/delete.png'), 'title' => 'Verwijder'));
$edit = new \system\classes\Tag('a', Array(), $imgEdit->Render());
$delete = new \system\classes\Tag('a', Array(), $imgDelete->Render());

echo '<h1>Gebruikers</h1>' .
'<table id="view-table">' .
'<tr>' .
'<th>Username</th>' .
'<th>Email</th>' .
'<th>Last visit</th>' .
'<th>Rol</th>' .
'<th>aktie</th>' .
'</tr>';
foreach ($users as $user) {
	$roles = $user->getRoles();
    echo '<tr data-id="' . $user->getId() . '">' .
	'<td>' . $user->getUsername() . '</td>' .
	'<td>' . $user->getEmail() . '</td>' .
	'<td>' . $user->getLastVisit()->format('d-m-Y') . '</td>' .
	'<td>';
	foreach ($roles as $role) {
		echo $role->getName() . '<br>';
	}
	$edit->setElement('href', url('admin/user/edit/' . $user->getId()));
	$delete->setElement('href', url('admin/users'));
	echo '</td>';
	echo '<td>' . $edit->Render() . $delete->Render() . '</td>';
	echo '</tr>';
}

echo '</table>';

include 'system/views/admin-end.php';

?>

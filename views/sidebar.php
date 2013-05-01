<table border="0" width="224px id="sidebar">
<th>Quick Links</th>
<tr></tr>
<?php if(($_SESSION['userlevel'] == "administrator")){ ?>
<tr class="black_row"><td><h3>Users</h3></td></tr>
<tr>
<td>
	<li><a href="hvnUsersAdd.php" class="text">Add User</a></li>
	<li><a href="hvnUsers.php" class="text">View Users</a></li>
</td>
</tr>
<tr class="black_row"><td><h3>Groups</h3></td></tr>
<tr>
<td>
	<li><a href="hvnGroupAdd.php" class="text">Add Group</a></li>
	<li><a href="hvnGroup.php" class="text">View Groups</a></li>
</td>
</tr>
<?php } ?>
<tr class="black_row"><td><h3>Events</h3></td></tr>
<tr >
<td>
	<li><a href="hvnEventsAdd.php" class="text">Add Event</a></li>
	<li><a href="hvnEvents.php" class="text">View Events</a></li>
</td>
</tr>
<tr class="black_row"><td><h3>Contacts</h3></td></tr>
<tr>
<td>
	<li><a href="hvnContactAdd.php" class="text">Add Contact</a></li>
	<li><a href="hvnContacts.php" class="text">View Contacts</a></li>
</td>
</tr>
<tr class="black_row"><td><h3>Volunteers</h3></td></tr>
<tr>
<td>
	<li><a href="hvnVolunteersAdd.php" class="text">Add Volunteer</a></li>
	<li><a href="hvnVolunteers.php" class="text">View Volunteer</a></li>
</td>
</tr>
<tr class="black_row"><td><h3>Email Gateway</h3></td></tr>
<tr>
<td>
	<li><a href="hvnEmail.php" class="text">Send Email</a></li>
</td>
</tr>
</table>
	
	<?php if($_SESSION['userlevel'] == 'administrator'){
		echo("<li><a href='hvnUsersAdd.php' class='text'>Add User</a></li>");
	}
	?>
</ul>
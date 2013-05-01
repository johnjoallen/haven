<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
?>
		<div id="main">
			<p class="text">
			<?php if(!empty($_SESSION['error'])){
				echo("<h3>Error: " . $_SESSION['error'] . "</h3>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<form method="POST" class="form2" action="../logic/adHocBasic.php">
			<fieldset>
				<legend>Basic Ad-Hoc Reporting</legend>
					<table>
					<tr>
				<th>Filter - ></th>
				<th>Where - ></th>
				<th>Field - ></th>
				<th>Criteria</th>
				</tr>
						<tr>
						<td><select name="filter" class="select2">
						<option value="vol">Volunteers</option>
						<option value="con">Contacts</option>
				        </select></td>
						<td><select name="operator" class="select2">
						<option>---</option>
						<option value="WHERE">WHERE</option>
						</select></td>
						<td><select name="field" class="select2">
						<option>--</option>
						<option value="fname">First Name</option>
						<option value="sex">Sex</option>
						<option value="trade">Trade</option>
						<option value="occ">Occupation</option>				
						</select></td>
						<td><input type="text" name="criteria" class="input2"/></td>
						<td><input type="submit" name="csv" value="Download CSV"/></td>
						<td><input type="submit" name="pdf" value="Download PDF"/></td>
						</form>
						</tr>
						</table>
						</fieldset>
						</form>
				</p><p>
						<form method="POST" class="form2" action="../logic/adHocAdvanced.php">
						<fieldset>
						<legend>Advanced Ad-Hoc Reporting</legend>
						<table>
						<tr>
						<th>Filter - ></th>
						<th>Where - ></th>
						<th>Condition ->  </th>
						<th>Criteria</th>
						</tr>
						<tr>
						<td><select name="filter" class="select2">
						<option value="vol">Volunteers</option>
						<option value="con">Contacts</option>
				        </select></td>
						<td><select name="where" class="select2">
						<option>---</option>
						<option value="callback">Callback Date</option>
						<option value="lastcontacted">Last Contacted</option>
						<option value="age">Age</option>
						<option value="county">County</option>
						</select></td>
						<td><select name="condition" class="select2">
						<option>--</option>
						<option value="equal"> = </option>		
						<option value="less"> < </option>				
						<option value="greater"> > </option>	
						</select></td>
						<td><input type="text" name="criteria" class="input2"/></td>
						<td><input type="submit" name="csv" value="Download CSV"/></td>
						<td><input type="submit" name="pdf" value="Download PDF"/></td>
						</tr>
						</table>
						</fieldset>
						</form>
				</p>
			</p>
		</div>
<?php
include("footer.php");
?>
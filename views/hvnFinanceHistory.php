<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
$var_arr = $_SESSION['values'];
?>
		<div id="main">
			<p class="text">
			<?php 
			if(isset($_SESSION['error'])){
			}
			if(isset($_SESSSION['success'])){
				echo($_SESSION['success']);
			}
			$_SESSION['error'] = '';
			$_SESSION['success'] = '';
			?>
			<form method="POST" class="form1" action="../logic/updateFinances.php">
			<input type="submit" name="save" value="Save" /> <input type="submit" name="cancelf" value="Cancel" />
				<?php
				$fh = new FinanceHistory();
				//while(list($key,$val) = @each($var_arr)){
				foreach ($var_arr as $value) {				
					$fh->editFinanceInfo($value);
				?>
				<table><tr>
					<td>Euro:<input type='text' name=amount[]>
					</td>
					<td><select name=day[]>
					<option value="<?php echo(date('d')); ?>"><?php echo(date('d')); ?></option>
					<? for($x = 1;$x <= 31; $x++){
						echo("<option value='" . $x ."'>" . $x . "</option>");
					} ?>
				</select>
				<select name=month[]>
					<option value="<?php echo(date('m')); ?>"><?php echo(date('m')); ?></option>
					<? for($x = 1;$x <= 12; $x++){
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}?>
				</select>
				<select name=year[]>
					<option value="<?php echo(date('Y')); ?>"><?php echo(date('Y')); ?></option>
					<? for($x = 2009;$x <= 2020;$x++){
						echo("<option value='" . $x ."'>" . $x . "</option>");
					} ?> 
				</select></td>
				<td><input type="text" name=comment[] /><input type="hidden" name=id[] value="<? echo($value); ?>"</td>
				</tr></table></fieldset><br />
				<?php
				}
				?>
			</form>
			</p>
		</div>
<?php
include('footer.php');
?>

<?php

	$result = 0; // ** Setting default result to Zero.

	/* 
		** $_POST['name'] - is a super global variable that catches the value from 
							a input field. 'name' is the input name.
		** isset() - checks if the variable is setted or not and returns a boolean 				value.
	*/
	if(isset($_POST['submit'])){
		// ** Checks if the Calculate button clicked or not.

		$operator = $_POST['operator'];
		$num1 = (float) $_POST['num1'];	
		$num2 = (float) $_POST['num2'];
		// (float) - to cast the variable into a float type variable.

			switch ($operator) {
				case 'add':
					$result = $num1 + $num2;
					break;
				case 'sub':
					$result = $num1 - $num2;
					break;
				case 'mul':
					$result = $num1 * $num2;
					break;
				case 'div':
					if($num2 == 0){
						$result = "Undefined!";
						break;
					}
					$result = $num1 / $num2;
					break;
				default:
					$result = 'Calculation error!';
					break;
			}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Calculator(Procedural)</title>
	<style type="text/css">
		body{
		    min-height: 100vh;
		    display: flex;
		    align-items: center;
		    justify-content: center;
		    flex-direction: column;
		    background-color: rgb(27, 27, 27);
		    color: rgb(220, 220, 220);
		    font-family: sans-serif;
		    text-align: center;
		}
		h1{
		    font-size: 72px
		}
		form{
		    margin: auto;
		    width: 600px;
		    padding: 50px;
		    box-shadow: 0px 8px 15px rgb(19, 19, 19);
		}
		.allUserInputs{
		    display: flex;
		    justify-content: space-between;
		}
		.number{
		    width: 220px;
		    font-size: 20px;
		    padding: 10px 12px;
		    background-color: rgb(19, 19, 19);
		    border: 1px solid rgb(29, 29, 29);
		    color: rgb(204, 204, 204);
		}
		input[type=submit]{
		    display: block;
		    outline: none;
		    border: none;
		    background-color: crimson;
		    color: whitesmoke;
		    padding: 10px 15px;
		    width: 100%;
		    margin-top: 15px;
		    transition: 300ms;
		    font-size: 20px;
		}
		input[type=submit]:hover{
		    background-color: rgb(170, 17, 47);
		}
		select{
		    margin: auto;
		    padding: 8px 10px;
		    font-size: 20px;
		    color: grey;
		    background-color: rgb(19, 19, 19);
		    border: none;
		    outline: none;
		}
		option{
		    padding: 10px;
		}
		.resultbox{
		    display: inline-block;
		    font-size: 56px;
		    margin: 20px auto;
		    padding: 8px 15px;
		    background-color: rgb(19, 19, 19);
		}
	</style>
</head>
<body>

	<form class ="calculator" action='' method='POST'>
		<h1>Calculator</h1>
		<div class = "allUserInputs">
			<input class = "number" name ="num1" value= "<?php if(isset($_POST['num1'])){ echo $_POST['num1']; } ?>" placeholder = 'First number'>
			<select name="operator" placeholder ="Calculation" >
				<option name='add' value="add"> + </option>
				<option name='sub' value="sub"> - </option>
				<option name='div' value="div"> / </option>
				<option name='mul' value="mul"> x </option>
			</select>
			<input class = "number" name ="num2" value= "<?php if(isset($_POST['num2'])){ echo $_POST['num2']; } ?>" placeholder = 'Second number'>
		</div>
		<input name="submit" type="submit" value ="Calculate">
	
		<?php if(isset($result)){ ?> 
		 <!-- Checks if result was set. -->
			<div class = "resultbox">
				<?php echo $result; ?>
			</div>
		<?php } ?>

	</form>
	
</body>
</html>
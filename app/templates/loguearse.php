<?php ob_start() ?>
<div class="col-6">
	<div class="bg-white pt-5 pb-5 text-center">
		<h2>Login</h2><br>
		<form action="index.php?ctl=loguearse" method="POST">
    		<label for="username">Username:</label>
        	<input class="loginForm" type="text" name="username"><br><br>
        	<label for="password">Password:</label>
        	<input class="loginForm" type="password" name="password"><br><br>
        	<input class="loginForm" type="submit" name="sendLogin" value="Login">
        	<p id="margenb"></p>
     	</form>
     	
<?php if (isset($params["session-error"])) :?>
<div>
<p style="color:red; font-weight: bold;"><?php echo $params["session-error"]?></p>
</div>
<?php endif;?>
     	
     </div>
</div>
<div class="col-6">
	<img src="images/pills.jpg" alt="" class="img-fluid mt-3" width="700px">
</div>
<?php $contenido = ob_get_clean()?>
<?php include 'layout.php';?>
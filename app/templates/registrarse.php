<?php  ob_start()?>
                <div class="col-5 form-group">
                    <div>
                        <h2 class="text-center mt-3">Register</h2>
                        <form class="registerSpace" action="index.php?ctl=registrarse" method="POST">
                            <label for="name">Name </label>
                            <input type="text" class="form-control" name="name" placeholder="Put your name here"><br><br>
                            <label for="surname">Surname&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="surname" placeholder="Put your surname here" value="<?php echo $params['name']?>"><br><br>
                            <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="email" class="form-control" name="email" placeholder="Put your email here" value="<?php echo $params["surname"]?>"><br><br>
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Put you username here" value="<?php echo $params["username"]?>"><br><br>
                            <label for="password">Password&nbsp;</label>
                            <input type="password" class="form-control" name="password" placeholder="Put your password here" value="<?php echo $params["password"]?>"><br><br>
                            <label for="country">Country&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="country" placeholder="Put your province here" value="<?php echo $params["country"]?>"><br><br>
                            <label for="city">City&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="city" placeholder="Put your country here" value="<?php echo $params["city"]?>"><br><br>
                            <label for="date_birth">Date of birth&nbsp;&nbsp;</label>
                            <input type="date" class="form-control" name="date_birth" value="<?php echo $params["date_birth"]?>"><br><br>
                            <label for="profile_picture">Choose your profile picture</label>
                            <input type="file" name="profile_picture"><br><br>
                            <input type="submit" class="btn btn-primary" name="register" value="Register">
                        </form>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <img src="images/pharmacyBG.jpg" alt="" class="img-fluid">
                    <p class="def">Perfume and Pharmaceutical Officine of Santa Maria Novella (Italian: l'Officina Profuma Farmaceutica di Santa Maria Novella), is a luxury apothecary in Florence, Italy, credited with being the oldest pharmacy in the world. The origins of the shop's pharmaceutical products can be traced back to a monastery of the Dominican Order connected to the adjacent Church of Santa Maria Novella, where monks began experimenting with garden plants to create herbal concoctions beginning in 1221. A retail operation was established in Via Reginaldo Giuliani in 1612 by Fra Angiolo Marchissi, becoming famous over the coming centuries for the quality and salubrious benefits of its products, ranging from perfumes, pot pourri and toiletries, to liqueurs, medicinal balms, and foods. It remained in the ownership of the Church of Santa Maria Novella until 1866, when the property was confiscated by the Kingdom of Italy and sold to a private owner. Since the 1990s Santa Maria Novella's retail operations have expanded rapidly to include locations in every major Italian city, and 75 shops throughout the world, in countries including the United States.</p>
                </div>
            <div class="row">
            	<div class="col-12 col-lg-6">
    				<ul>
    					<?php 
    	                   if(isset($params["errores"])){
    	                   $array = $params["errores"];
    	                   echo '<h2 style="color:red;">Errores</h2>';
    	                   foreach ($array as $a){
    	                       echo '<li> '.$a.'</li>';
    	                        }
    	                   }
    	           
    	               if(isset($params["error-usuario"])){
    	                   echo '<ul><li>'.$params["error-usuario"].'</li></ul>';
    	                           }
    	
    	                ?>
    				</ul>
    			</div>
            </div>
<?php $contenido = ob_get_clean()?>
<?php include 'layout.php';?>

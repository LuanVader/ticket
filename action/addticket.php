<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['title'])) {
           $errors[] = "Titulo vacío";
        } else if (empty($_POST['description'])){
			$errors[] = "Description vacío";
		} else if (
			!empty($_POST['title']) &&
			!empty($_POST['description'])
		){


		include "../config/config.php";//Contiene funcion que conecta a la base de datos
		
		$title 		 = "";
		$description = "";
		$category_id = "";
		$project_id  = "";
		$priority_id = "";
		$user_id     = "";
		$status_id   = "";
		$kind_id     = "";
		$created_at  = "";
		if ($_SESSION["nivel"]=='Administrador' || $_SESSION["nivel"]=='Soporte') {
			
			$title 		 = $_POST["title"];
			$description = $_POST["description"];
			$category_id = $_POST["category_id"];
			$project_id  = $_POST["project_id"];
			$priority_id = $_POST["priority_id"];
			$user_id     = $_SESSION["user_id"];
			$status_id   = $_POST["status_id"];
			$kind_id     = $_POST["kind_id"];
			$created_at  = "NOW()";
		}else{
			$title 		 = $_POST["title"];
			$description = $_POST["description"];
			$category_id = $_POST["category_id"];
			$project_id  = $_SESSION["area"];
			$priority_id = 2;
			$user_id     = $_SESSION["user_id"];
			$status_id   = 1;
			$kind_id     = $_POST["kind_id"];
			$created_at  = "NOW()";
		}
		

		echo 'title - '.$title.'</br>';
		echo 'description - '.$description.'</br>';
		echo 'category_id - '.$category_id.'</br>';
		echo 'project_id - '.$project_id.'</br>';
		echo 'priority_id - '.$priority_id.'</br>';
		echo 'user_id - '.$user_id.'</br>';
		echo 'status_id - '.$status_id.'</br>';
		echo 'kind_id - '.$kind_id.'</br>';
		echo 'created_at - '.$created_at.'</br>';

		// $user_id=$_SESSION['user_id'];

		$sql="insert into ticket (title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,created_at) value (\"$title\",\"$description\",\"$category_id\",\"$project_id\",$priority_id,$user_id,$status_id,$kind_id,$created_at)";

		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Tu ticket ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>
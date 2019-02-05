<?php require('require_authentication.php'); ?>
<html>
	<?php require('head.php'); ?>
	<body>
		<?php require('header.php'); ?>
		<div class="col-12 start subMenu">
			<form method="get" action=".#post" class="col-4">
				<input type="hidden" name="post" value="visualize">
				<input type="submit" value="Visualizar Post" class="col-12">
			</form>
			<form method="get" action=".#post" class="col-4">
				<input type="hidden" name="post" value="edit">
				<input type="submit" value="Editar Post" class="col-12">
			</form>
			<form method="get" action=".#post" class="col-4">
				<input type="hidden" name="post" value="insert">
				<input type="submit" value="Inserir Post" class="col-12">
			</form>
		</div>
		<div style="width:100%;" name="block-area">
		<?php
			if(isset($_GET['post'])){
				if($_GET['post']=='visualize'){
					require('connect.php');
					$consulta = "select post.id_post,post.name_post from post;";
					$query = mysqli_query($conexao,$consulta);
					echo '<form method="get" action=".#post"> <select name="query">';
					while($line  =  mysqli_fetch_array($query)){
						echo '<option value="'.$line['id_post'].'">'.$line['name_post'].'</option>';
					   	// echo '<div style="width:100%;">'.$line['post_post'].'</div>';
					}
					echo '</select><input type="hidden" name="post" value="visualize"><input type="submit" value="Visualizar"/></form>';
					if(isset($_GET['query'])){
						$consulta = "select post.name_post,post.imgCapa_post,post.post_post from post where post.id_post='".$_GET['query']."';";
						$query = mysqli_query($conexao,$consulta);
						while($line  =  mysqli_fetch_array($query)){
						   echo '<div class="center h1" style="width:100%;">'.$line['name_post'].'</div>';
						   echo '<div class="center h3" style="width:100%;">'.$line['imgCapa_post'].'</div>';
						   echo '<div style="width:100%;display:block;">'.$line['post_post'].'</div>';
						}
					}
				unset($consulta,$query,$line);
				}elseif($_GET['post']=='edit'){
					require('connect.php');
					$consulta = "select post.id_post,post.name_post from post ORDER BY post.name_post;";
					$query = mysqli_query($conexao,$consulta);
					$query2 = $query;
					echo '<form method="get" action=".#post"> <select name="query">';
					while($line  =  mysqli_fetch_array($query)){
						echo '<option value="'.$line['id_post'].'">'.$line['name_post'].'</option>';
					   	// echo '<div style="width:100%;">'.$line['post_post'].'</div>';
					}
					echo '</select><input type="hidden" name="post" value="edit"><input type="submit" value="Buscar"/></form>';
					if(isset($_GET['query'])){
						$consulta = "select post.name_post,post.imgCapa_post,post.post_post from post where post.id_post='".$_GET['query']."';";
						$query = mysqli_query($conexao,$consulta);
						while($line  =  mysqli_fetch_array($query)){
						   echo '<form method="post" action="post_proc.php" class="postEdit">
			   		                <input name="title" type="text" placeholder="Titulo" class="col-12 postTitle" value="'.$line['name_post'].'"/>
			   		                <input name="imgCapa" type="text" placeholder="Link da imagem de capa" class="col-12 postTitle" value="'.$line['imgCapa_post'].'"/>
			   		                <textarea name="post_area" rows="10" style="color:#000000;font-family:Arial,Calibri;width:100%;background-color: #ffffff;">'.$line['post_post'].'</textarea>
									<input type="hidden" name="post" value="edit">
			   						<div class="col-12 center">
			   		                	<input type="submit" value="Atualizar" class="postTitle"/>
			   						</div>
			   		            </form>
								<iframe src="tryEditor/tryEditor.html" style="resize: both;overflow: auto;width:100%;height:500px;margin:300px 0 0 0" noresize="resize"></iframe>
								<script src="ckeditor4.9.2-full-personalized/ckeditor.js"></script>
								<div style="margin:40px 0 0 0;">
									<textarea name="post_area" id="post_area" rows="10" cols="80" style="color:#000000;font-family:Arial,Calibri;">'.$line['post_post'].'</textarea>
									<script>CKEDITOR.replace( post_area );</script>
								</div>
								';
						}
					}
					$consulta = "select post.id_post,post.name_post from post ORDER BY post.name_post;";
					$query = mysqli_query($conexao,$consulta);
					echo '<form method="post" action="post_proc.php" style="margin:300px 0 0 0;"> <select name="idpost">';
					while($line  =  mysqli_fetch_array($query)){
						echo '<option value="'.$line['id_post'].'">'.$line['name_post'].'</option>';
					}
					echo '</select><input type="hidden" name="post" value="delete"><input type="submit" value="Apagar"/></form>';
				}elseif($_GET['post']=='insert'){
					echo '
					<form method="post" action="post_proc.php" class="postEdit">
		                <input name="title" type="text" placeholder="Titulo" class="col-12 postTitle"/>
		                <input name="imgCapa" type="text" placeholder="Link da imagem de capa" class="col-12 postTitle"/>
		                <textarea name="post_area" rows="10" style="color:#000000;font-family:Arial,Calibri;width:100%;background-color: #ffffff;"></textarea>
						<input type="hidden" name="post" value="insert">
						<div class="col-12 center">
		                	<input type="submit" value="Inserir" class="postTitle"/>
						</div>
		            </form>
					<iframe src="tryEditor/tryEditor.html" style="resize: both;overflow: auto;width:100%;height:500px;margin:300px 0 0 0" noresize="resize"></iframe>
					<script src="ckeditor4.9.2-full-personalized/ckeditor.js"></script>
					<div style="margin:40px 0 50vh 0;">
						<textarea name="post_area" id="post_area" rows="10" cols="80" style="color:#000000;font-family:Arial,Calibri;">
							This is my textarea to be replaced with CKEditor.
						</textarea>
						<script>CKEDITOR.replace( post_area );</script>
					</div>
					';

				}
			}
			unset($conexao);
		?>
		</div>
	</body>
</html>

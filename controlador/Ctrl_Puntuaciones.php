<?php
$connect = new PDO("mysql:host=localhost;dbname=aulaguard", "root", "");

if(isset($_POST["Ctrl_Puntuaciones"]))
{

	$data = array(
		':usuario_id'		=>	$_POST["usuario_id"],
		':puntuacion_calificacion'		=>	$_POST["rating_data"],
		':puntuacion_descripcion'		=>	$_POST["puntuacion_descripcion"],
		':puntuacion_fecha'			=>	time()
	);

	$query = "
	INSERT INTO puntuaciones 
	(usuario_id, puntuacion_calificacion, puntuacion_descripcion, puntuacion_fecha) 
	VALUES (:usuario_id, :puntuacion_calificacion, :puntuacion_descripcion, :puntuacion_fecha)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Tu comentario ha sido enviado";

}
if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM puntuaciones 
	ORDER BY puntuacion_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'usuario_id'		=>	$row["usuario_id"],
			'puntuacion_descripcion'	=>	$row["puntuacion_descripcion"],
			'rating'		=>	$row["puntuacion_calificacion"],
			'puntuacion_fecha'		=>	date('l jS, F Y h:i:s A', $row["puntuacion_fecha"])
		);

		if($row["puntuacion_calificacion"] == '5')
		{
			$five_star_review++;
		}

		if($row["puntuacion_calificacion"] == '4')
		{
			$four_star_review++;
		}

		if($row["puntuacion_calificacion"] == '3')
		{
			$three_star_review++;
		}

		if($row["puntuacion_calificacion"] == '2')
		{
			$two_star_review++;
		}

		if($row["puntuacion_calificacion"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["puntuacion_calificacion"];

	}

	$average_rating = $total_puntuacion_calificacion / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}
?>
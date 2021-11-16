<?php 

  // while (true) {
  //   # code...
  // }

  $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

  if ($contentType === "application/json") {
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));

    $decoded = json_decode($content, true);

    //If json_decode failed, the JSON is invalid.
    if(! is_array($decoded)) {
      echo $content,  "<br />";
    } else {
      // Send error back to user.
    }
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
</head>
<body>
  <section >
		<h4 >Add a Pizza</h4>
		<form action="new-user.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="email">
			<label>Pizza Title</label>
			<input type="text" name="title">
			<label>Ingredients (comma separated)</label>
			<input type="text" name="ingredients">
			<div >
				<input type="submit" name="submit" value="Submit">
			</div>
		</form>
	</section>
</body>
</html>
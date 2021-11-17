<?php 

  include('config/db_connect.php');

  $sql = 'SELECT firstname, lastname, id, email FROM users ORDER BY created_at';

  //make query result
  $result = mysqli_query($conn, $sql);

  // fetch result rows
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  include('config/db_disconnect.php');

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
		<h1>Usuários cadastrados</h1>
    <div class="user-container">
      <div class="user">
        <?php foreach($users as $user): ?>
          <ul>
            <li>
              <h3><?php echo htmlspecialchars($user["firstname"]) ?></h3>
            </li>
            <li>
              <p><?php echo htmlspecialchars($user["lastname"]) ?></p>
            </li>
            <li>
              <p><?php echo htmlspecialchars($user["email"]) ?></p>
            </li>
          </ul>
        <?php endforeach ?>
      </div>
      <div class="forms-link-container">
        <a href="forms.html" class="forms-link">NOVO USUÁRIO</a>
      </div>
    </div>
	</section>
</body>
</html>
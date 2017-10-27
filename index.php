<!DOCTYPE html>
<html>
  <head>
    <title>Herobook</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
  </head>
  <body class="container">
    <div class="page-header"><h1 class="text-center mt-4">Herobook</h1></div>
    <h2 class="text-left mt-3">Hero Profiles</h2>
    <?php
    include('database.php');
    function getHeroes() {
    $request = pg_query(getDb(), "select * from heroes;");
    return pg_fetch_all($request);
    }
    ?>
    <ul class="media-list">
      <?php
      $heroes = getHeroes();
      foreach ($heroes as $hero) {
      ?>
      <li class="media">
        <div class="media-left">
          <a href="/hero.php?id=<?=$hero["id"]?>"">
            <img class="media-object" src="<?=$hero["image_url"]?>">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?=$hero["name"]?></h4>
          <p><?=$hero["about_me"]?></p>
        </div>
        <?php
        }
        ?>
      </li>
    </ul>
  </div>
</div>
<style>
body
{
    font-family: 'Titillium Web', sans-serif;
}
</style>
</body>
</html>
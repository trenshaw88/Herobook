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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
  </head>
  <body class="container">

    <?php
    include('database.php');
    $id = intval(htmlentities($_GET["id"]));

    function getHero($id) {
    $sql = "select * from heroes where id=" . $id;
    $request = pg_query(getDb(), $sql);
    return pg_fetch_assoc($request);
    }

    function getAbilities($id) {
    $sql = "select abilities.* from heroes
    join ability_hero ON heroes.id = ability_hero.hero_id
    join abilities ON ability_hero.ability_id = abilities.id
    where heroes.id=" . $id;
    $request = pg_query(getDb(), $sql);
    return pg_fetch_all($request);
    }
    ?>

    <div class="container-fluid">
      <?php
      $hero = getHero($id);
      ?>
      <div class="page-header"><h1>Herobook</h1></div>
      <div class="row mt-5">
        <div class="fb-profile">
          
          <img align="left" class="fb-image-profile thumbnail" src="<?=$hero["image_url"]?>/people/9/" alt="Profile image example">
          <div class="fb-profile-text">
            <h1><?=$hero["name"]?></h1>
            
          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <?php
      $hero = getHero($id);
      $ability = getAbilities($id);
      ?>
      
      <div class="col-sm-8">
        <div data-spy="scroll" class="tabbable-panel">
          <div class="tabbable-line">
            <ul class="nav nav-tabs ">
              <li class="active">
                <a href="#tab_default_1" data-toggle="tab">
                About</a>
              </li>
              
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_default_1">
                
                <p><?=$hero["about_me"]?></p>
                <h4>Biography</h4>
                <p><?=$hero["biography"]?></p>
                <h4>Abilities</h4>
                <p><?=$ability[0]['ability']?></p>
                
              </div>
              
              
              
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
    <div class="mt-5">
      <a href="index.php">Return to Hero List</a>
    </div>
    <style>
    body
    {
    font-family: 'Titillium Web', sans-serif;
    }
    .fb-image-profile
    {
    margin:5;
    z-index: 9;
    width: 20%;
    }
    .tabbable-panel {
    border:1px solid #eee;
    padding: 10px;
    }
    .tabbable-line > .nav-tabs {
    border: none;
    margin: 0px;
    }
    .tabbable-line > .nav-tabs > li {
    margin-right: 2px;
    }
    .tabbable-line > .nav-tabs > li > a {
    border: 0;
    margin-right: 0;
    color: #737373;
    }
    .tabbable-line > .nav-tabs > li > a > i {
    color: #a6a6a6;
    }
    .tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
    border-bottom: 4px solid #fbcdcf;
    }
    .tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
    border: 0;
    background: none !important;
    color: #333333;
    }
    .tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
    color: #a6a6a6;
    }
    .tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
    margin-top: 0px;
    }
    .tabbable-line > .nav-tabs > li.active {
    border-bottom: 4px solid #f3565d;
    position: relative;
    }
    .tabbable-line > .nav-tabs > li.active > a {
    border: 0 !important;
    color: #333333;
    }
    .tabbable-line > .nav-tabs > li.active > a > i {
    color: #404040;
    }
    .tabbable-line > .tab-content {
    margin-top: -3px;
    background-color: #fff;
    border: 0;
    border-top: 1px solid #eee;
    padding: 15px 0;
    }
    .portlet .tabbable-line > .tab-content {
    padding-bottom: 0;
    }
    /* Below tabs mode */
    .tabbable-line.tabs-below > .nav-tabs > li {
    border-top: 4px solid transparent;
    }
    .tabbable-line.tabs-below > .nav-tabs > li > a {
    margin-top: 0;
    }
    .tabbable-line.tabs-below > .nav-tabs > li:hover {
    border-bottom: 0;
    border-top: 4px solid #fbcdcf;
    }
    .tabbable-line.tabs-below > .nav-tabs > li.active {
    margin-bottom: -2px;
    border-bottom: 0;
    border-top: 4px solid #f3565d;
    }
    .tabbable-line.tabs-below > .tab-content {
    margin-top: -10px;
    border-top: 0;
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
    }
    .menu_title {
    padding: 15px 10px;
    border-bottom: 1px solid #eee;
    margin: 0 5px;
    }
    @media (max-width:768px){
    
    .fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
    padding: 2;
    margin-left: 2;
    }
    .fb-image-profile
    {
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 20%;
    }
    </style>
  </body>
</html>
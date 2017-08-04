<!-- Login page -->
<?php if($errors->any()): ?>
<h4><?php echo e($errors->first()); ?></h4>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://use.fontawesome.com/1686112fa4.js"></script>
    <link href="https://use.fontawesome.com/1686112fa4.css" media="all" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
      body {
            font-family: 'Roboto', sans-serif;
            background: #ADD100;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #7B920A, #ADD100);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #7B920A, #ADD100); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
      .form-align
      {
         margin:0 auto;
         width:300px;
         height:400px;
         margin-top:5%;
      }
      .form-signin
      {
         margin-top:5%;
      }

    </style>
</head>

<body>
   <div class="form-align">
      <span style="font-size:44px;color:#fff;">FRONT /></span><br>
      <span style="font-size:10px;color:#fff;">Vakance</span><br>


      <form method ="POST" action="login" class="form-signin">
         <?php echo csrf_field(); ?>

         <div class="form-group">
            <input type="email" name="email" placeholder="Epasts" value="tests@delfi.lv" class="form-control"  aria-describedby="emailHelp" >
         </div>
         <div class="form-group">
            <input type="password" name="password"  value="12345678" class="form-control"  placeholder="Parole">
         </div>

         <div class="form-group row">
         <div class="offset-sm-2 col-sm-10">
            <button type="submit" name="submit"  class="btn btn-default">Ienākt</button>
         </div>

      </form>     
   </div>

   </div>
</body>
</html>
<!-- Login page -->
<?php if($errors->any()): ?>
<h4><?php echo e($errors->first()); ?></h4>
<?php endif; ?>
<html>
   <head>
      <title>Pieejas lapa</title>
   </head>

   <body>
   <form method ="POST" action="login">
   <?php echo csrf_field(); ?>

   <input type="email" name="email" placeholder="meils" value="tests@delfi.lv"><br>
   <input type="password" name="password" placeholder="parole" value="12345678"><br>
   <input type="submit" name="submit">
   </form>
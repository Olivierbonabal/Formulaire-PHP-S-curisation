<!DOCTYPE html>
<html>
<body>

<?php session_start(); ?>

<?php
if($_POST){
  $errors = array();
  if(empty($_POST['user_firstname'])){
    $errors['user_firstname'] = "Your firstname is required";
  }
  if(empty($_POST['user_name'])){
    $errors['user_name'] = "Your name is required";
  }
  if(empty($_POST['user_email'])){
    $errors['user_email'] = "Your email is required";
  }
  if(empty($_POST['number'])){
    $errors['number'] = "Your number is required";
  }
  if(empty($_POST['themes'])){
    $errors['themes'] = "Your theme is required";
  }
  if(empty($_POST['user_message'])){
    $errors['user_message'] = "Your message is required";
  }
  if(!empty($_POST['user_firstname']) && !empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['number']) && !empty($_POST['themes']) && !empty($_POST['user_message'])){
    if(filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)){
      $errors['user_email'] = "That is valid email"; 
      $_SESSION['user_firstname'] = $_POST['user_firstname'];
      $_SESSION['user_name'] = $_POST['user_name'];
      $_SESSION['user_email'] = $_POST['user_email'];
      $_SESSION['number'] = $_POST['number'];
      $_SESSION['themes'] = $_POST['themes'];
      $_SESSION['user_message'] = $_POST['user_message'];
      header("Location: http://localhost:8000/thanks.php");
    } else{
        $errors['user_email'] =  "Not a valid email";
      }
  }
}
?>

<form  action=""  method="post">
    <div>
      <label  for="firstname">Prénom :</label>
      <input  type="text"  id="firstname"  name="user_firstname">
      <?php if(isset($errors['user_firstname'])) echo $errors['user_firstname']; ?>
    </div>

    <div>
      <label  for="nom">Nom :</label>
      <input  type="text"  id="nom"  name="user_name">
      <?php if(isset($errors['user_name'])) echo $errors['user_name']; ?>
    </div>

    <div>
      <label  for="courriel">Courriel :</label>
      <input  type="text"  id="courriel"  name="user_email">
      <?php if(isset($errors['user_email'])) echo $errors['user_email']; ?>
    </div>

    <div>
      <label for="number">numéro de téléphone:</label>
      <input type="tel" pattern="[0-9]{10}" id="number" name="number">
      <?php if(isset($errors['number'])) echo $errors['number']; ?>
    </div>

    <div>
        <label for="subject">Sujet</label><br>
        <select id="subject"  name="subject" value="">
            <option value="">Choisir un onglet</option>
            <option value="achats">Achats</option>
            <option value="maintenance">Maintenance</option>
            <option value="orders">Commandes</option>
            <option value="other">Autre</option>
        </select>
    <?php if(isset($errors['themes'])) echo $errors['themes']; ?>
    </div>

    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="user_message"></textarea>
      <?php if(isset($errors['user_message'])) echo $errors['user_message']; ?>
    </div>

    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>
  </form>
  
 </body> 
</html>
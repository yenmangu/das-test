<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <style>
      .error {
        color: red;
      }
    </style>
  </head>
  <body>
  <div class="form-wrapper">
    <form method = "post" action = "test-api-key.php">     
      <div class= "applicants applicantName">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName">

        <br><br>
      </div>
      <div class="applicants applicantLastName">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName">
        <br><br>
      </div>
      <div class="applicants applicantEmail">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br><br>
      </div>
      <div class="applicants applicantNumber">
        <label for="telephone">Contact Number</label>
        <input type="text" name="telephone" id="telephone">
        <br><br>
      </div>
      <div class="applicants button-wrapper">
        <input type="submit" name="submit" id="submit" class="button submit">
        <input type="reset" name="reset" id="reset" class="button reset">
      </div>
    </form>
    
  </div>
  </body>
</html>
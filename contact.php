<!DOCTYPE html>
<html lang="en">
<head>
    <title>contact</title>  
    <link rel="stylesheet" href="contact.css"/>
  

</head>
<body>
<div class="container">
  <form action="action_page.php">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="india">INDIA</option>
      <option value="canada">CANADA</option>
      <option value="usa">USA</option>
    </select>

    <label for="cnumber">Contact number</label>
    <input type="text" id="cnumber" name="contactnumber" placeholder="Your contact number..">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
    
</body>
</html>
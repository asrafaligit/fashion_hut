<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us!</title>

    <!-- CSS Code -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');
*{
    margin: 0;
    outline: 0;
    padding: 0;
}
body{
    background: pink;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-size: 100% 100% ; 
}
.container{
    width: 60%;
    height: 600px;
    position: absolute;
    left: 65%;
    top: 50%;
    transform: translate(-50%,-50%);
    display: flex;
    border-radius: 15px;
    overflow: hidden;
    border-radius: 2px;
   
}
.form{
    background-color: palevioletred;
    width: 50%;
    padding:10px;
}
.form h1{
    text-transform: uppercase;
    text-align: center;
    font-family: 'Roboto',sans-serif;
    margin-bottom: 50px;
}
.form label{
    font-family: 'Montserat',sans-serif;
    margin-bottom: 20px;
}
.form input{
    width: calc(100% - 20px );
    padding: -9px 10px;
    font-size: 1.2em;
    background-color: palevioletred;
    border: none;
    border-bottom: 2px solid black;
    margin-bottom: 22px;
     font-family: 'Montserat',sans-serif;
}
.form textarea{
    width: calc(100% - 20px);
    background-color: palevioletred;
    padding: -3px;
    height: 130px;
    resize: none;
    border: none;
    border-bottom: 2px solid black;
    margin-bottom: 20px;
    font-size: 1.2em;
     font-family: 'Montserat',sans-serif;
}
::placeholder{
    color: rgba(83,19,166,.4);
}
.form button{
    cursor: pointer;
     width: 50% ;
     margin-top: 30px;
    padding: 20px 10px;
    color: black;
    text-transform: uppercase;
    border: none;
    border-radius: 1px;
    font-weight: bold;
    background: lightblue;
    margin-left: 110px;
    
}

        </style>

        <!-- HTML Code -->
  </head>
  <body>
            <div class="container">
                <div class="form">
                    <h1>Contact-us</h1>
        <form action="contact action.php" method="POST" autocomplete="off">
            <div class="user my-4">
              <label for="username">Username: </label>
              <input type="text" name="username" id="username" class="form-control" required><br>
            </div>
            <div class="email my-4">
              <label for="email">E-mail: </label>
              <input type="email" name="email" id="email" class="form-control" required><br>
            </div>
            <div class="contact my-4">
              <label for="contact">Contact: </label>
              <input type="number" name="contact" id="contact" class="form-control" required><br>
            </div>
            <div class="message my-4">
              <label for="message">Message: </label>
              <textarea name="message" id="message" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button class="button">Send Message</button>
        </form>
        </div>
            </div>
  </body>
</html>
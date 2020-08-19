<?php require_once 'php/Init.php'; $db = new DB(); $rows = $db->select('contact');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Contacts</title>
  </head>
  <body class="body-custom">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
       <div class="d-flex flex-column">
        <div class="row justify-content-center mb-5">
            <div class="d-flex align-items-center">
                <form method="post" action="php/put.php" class="form-contact">
                    <div class="title-form">
                        <h5>Добавить контакт</h5>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Телефон">
                    </div>
                      <button type="submit" class="btn-lg btn-primary float-right">Добавить</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="d-flex align-items-center">
                <form action="" class="form-contact">
                    <div class="title-form">
                        <h5>Список контактов</h5>
                    </div>
                   <div class="con-items d-flex flex-column" id="contacts">
                       <?php foreach($rows as $val){
                           print <<<_HTML_
                           <div class="con-item">
                           <div>$val[naming] <li class="fa fa-times" item-id="$val[id]" id="close"></li></div>
                           <div>$val[phone]</div>
                           </div>
                           _HTML_;
                       } ?>
                   </div>
                </form>
            </div>
        </div>
       </div>
    </div>


        <script>
            
            
              $(document).ready(function(){
                $(".fa.fa-times").on('click', function(){
                    $.ajax({
                        url: 'php/delete.php',
                        type: 'POST',
                        data: {'id' : $(this).attr('item-id')},
                        success: function(data){
                            $("#contacts").load(location.href + " #contacts");
                        }
                    });
                })

                
              })

        </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
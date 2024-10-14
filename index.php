<!DOCTYPE html>
<html lang="pt-BR">
<head>
      <meta charset="UTF-8"> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <title>Calendar</title>
</head>
<style>
      .box
      {
            width: 100%;
            max-width: 600px;
            background: #F9F9F9;
            border: 1px solid #CCC;
            border-radius: 5px;
            padding: 16px;
            margin: 0 auto;
      }
      input.parsley-success,
      select.parsley-success,
      textarea.parsley-success {
            color: #468847;
            background-color: #DFF0B8;
            border: 1px solid #D6E9C6;
      }
      
      input.parsley-error,
      select.parsley-error,
      textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
      }

      .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: .9em;
            line-height: .9em;
            opacity: 0;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
      }

      .parsley-errors-list.filled {
            opacity: 1;
      }

      .parsley-type, .parsley-required, .parsley-equalto {
            color: #FF0000;
      }
      .error
      {
            color: red;
            font-weight: 700;
      }
</style>
<?php
      include('connection.php');

      if(isset($_REQUEST['save-event'])){
            $title = $_REQUEST['title'];
            $start_date = $_REQUEST['start_date'];
            $end_date = $_REQUEST['end_date'];

            $insert_query = mysqli_query($connection,
            " INSERT INTO tbl_event (title, start_date, end_date) VALUES ('$title', '$start_date', '$end_date') ");

            if($insert_query)
            {
                  header('location:view-calendar.php');
            }
            else
            {
                  $msg = "Event could'nt be created ('-')";
            }
      }
?>
<body>
      <div class="container">
            <div class="table-responsive">
                  <h3 align="center">Create Event</h3> <br>
                  <div class="box">
                        <form method="post">
                              <div class="form-group">
                                    <label for="title">Título do Evento</label>
                                    <input type="text" name="title" id="title" placeholder="Título do Evento" required
                                    data-parsley-type="title" data-parsley-trigg
                                    er="keyup" class="form-control" />
                              </div>
                              <div class="form-group">
                                    <label for="date">Em que dia começa ?</label>
                                    <input type="datetime-local" name="start_date" id="start_date" required
                                    data-parsley-type="date" data-parsley-trigg
                                    er="keyup" class="form-control"/>
                              </div>
                              <div class="form-group">
                                    <label for="date">Em que dia termina ?</label>
                                    <input type="datetime-local" name="end_date" id="end_date" required
                                    data-parsley-type="date" data-parsley-trigg
                                    er="keyup" class="form-control"/>
                              </div>
                              <div class="form-group">
                                    <input type="submit" id="save-event" name="save-event" value="Save Event" class="btn
                                    btn-success"/>
                              </div>
                              <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
                        </form>
                  </div>
            </div>
      </div>
</body>
</html>
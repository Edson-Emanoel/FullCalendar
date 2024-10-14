<!DOCTYPE html>
<html lang="pt-BR">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css">
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <title>Calendar</title>
</head>
<body>
      <h2><center>JS FullCalendar</center></h2>
      <div class="container">
            <div id="calendar"></div>
      </div>
      <br>
</body>
</html>
      <?php
            include('connection.php');
            $fetch_event = mysqli_query($connection, "SELECT * FROM tbl_event")
      ?>
<script>
      $(document).ready(function(){
            $('#calendar').fullCalendar({
                  selectable: true,
                  selectHelper: true,
                  select: function ()
                  {
                        $('#myModal').modal('toggle');
                  },
                  header: {
                        left: 'month, agendaWeek, agendaDay, list',
                        center: 'title',
                        right: 'prev, today, next'
                  },
                  buttonText: {
                        today: 'Hoje',
                        month: 'Mês',
                        week: 'Semana',
                        day: 'Dia',
                        list: 'Lista de Serviços'
                  },
                  events: [
                        <?php
                              while($result = mysqli_fetch_array($fetch_event))
                              {
                        ?>
                        {
                              id: '<?php echo $result['id'] ?>',
                              title: '<?php echo $result['title'] ?>',
                              start: '<?php echo $result['start_date'] ?>',
                              end: '<?php echo $result['end_date'] ?>',
                              color: 'orange',
                              textColor: 'black'
                        }
                        <?php } ?>
                  ],
                  editable: true,
                  eventDrop: function(event)
                  {
                        var start = $.fullCalendar.formatDate(event.start, "DD-MM-YYYY HH:mm");
                        var end = $.fullCalendar.formatDate(event.end, "DD-MM-YYYY HH:mm");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                              url: "update.php",
                              type: "POST",
                              data: {title: title, start: start, end: end, id: id},
                              success: function()
                              {
                                    alert("Evento remarcado com sucesso!");
                              }
                        });
                  }
            });

      })
</script>

                  <!--  dayRender: function(date, cell)
                   {
                         var newDate = $.fullCalendar.formatDate(date, 'DD-MM-YYYY');
                         if(newDate == '24-10-2024')
                         {
                               cell.css("background", "#61bd50") // Disponível
                         }
                         else if(newDate == '28-10-2024')
                         {
                               cell.css('background', '#d83a31') // Indisponível
                         }
                   } -->
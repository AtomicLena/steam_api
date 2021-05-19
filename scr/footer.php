<!-- Footer -->
<footer class="footer-dark text-white text-center fixed-bottom text-lg-start" style="background-color: #9a3f7b;">

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0);">
    © 2021 Copyright: Héctor Lopez Lara
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<!-- JS de DataTable -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    gamestable()
    userstable()
    $('#gamus').DataTable({
      "scrollY": "550px",
      "scrollCollapse": true,
      "ordering": true,
      "paging": true,
      "searching": true
    });
    /* games table */
    $('#gamesearch').DataTable({
      "scrollY": "250px",
      "scrollCollapse": true,
      "paging": true,
      "searching": true,
      "order": [],
      aoColumns: [{
          mData: 'GAME_ID'
        },
        {
          mData: 'GAME_NAME'
        },
        {
          mData: 'GAME_DESCRIP'
        },
        {
          mData: 'GAME_PRICE'
        },
        {
          mData: 'RELEASEDATE'
        },
        {
          mData: 'BUTTONS'
        },
      ],
    });
    /* users table */
    $('#usersearch').DataTable({
      "scrollY": "250px",
      "scrollCollapse": true,
      "paging": true,
      "searching": true,
      "order": [],
      aoColumns: [{
          mData: 'USR_ID'
        },
        {
          mData: 'USR_NICKNAME'
        },
        {
          mData: 'USR_EMAIL'
        },
        {
          mData: 'USR_LVL'
        },
        {
          mData: 'USR_CREATION'
        },
        /* { mData: 'GAMES_OWNED' }, */
        {
          mData: 'BUTTONS'
        },
      ],
    });

    welcome();
    /* Cargar imagenes y datos menu principal*/
    function welcome() {
      $.ajax({
        type: "GET",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/showgames.php',
        data: {},
        success: function(response) {
          let card = "";
          response.result.forEach(function(game) {
            card += "<div class='col-2 mb-3'>" +
              "<div class='card'>" +
              "<a onclick='showcasemodal(" + game.GAME_ID + ")'>" +
              "<img src='" + game.GAME_COVER + "'class='card-img-top img-game'/>" +
              "</a>" +
              "<div class='card-body'>" +
              "<p class='card-text'>" + game.GAME_NAME + "</p>" +
              "</div>" +
              "</div>" +
              "</div>";
          });
          $("#gamecards").html(card);
        }
      });
    }

    /*     funciones para borrar insertar, etc los juegos ____________________________________________*/
    $("#geForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/gameupdate.php',
        data: $(this).serialize(),
        success: function(response) {
          //console.log(response);
          gamestable();
        }
      });
    });

    $("#giForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/gameinsert.php',
        data: $(this).serialize(),
        success: function(response) {
          gamestable();
        }
      });
    });

    $("#gdForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/gamedelete.php',
        data: $(this).serialize(),
        success: function(response) {
          gamestable();
        }
      });
    });




    /*     funciones para borrar insertar, etc los usuarios ____________________________________________*/
    $("#ueForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/userupdate.php',
        data: $(this).serialize(),
        success: function(response) {
          //console.log(response);
          userstable();
        }
      });
    });

    $("#uiForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/userinsert.php',
        data: $(this).serialize(),
        success: function(response) {
          userstable();
        }
      });
    });

    $("#udForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'https://itp-sd.site/hll/Steam%20API/api%20files/userdelete.php',
        data: $(this).serialize(),
        success: function(response) {
          userstable();
        }
      });
    });



  });
  /* Cargar imagenes y datos para los modals del main page*/
  function showcasemodal(id) {
    console.log(`accedí al id: ${id}`);
    $("#exampleModal").modal("show");
    $.ajax({
      type: "GET",
      url: 'https://itp-sd.site/hll/Steam%20API/api%20files/gamedetail.php?id=' + id,

      success: function(response) {
        $("#gametitlem").text(response.result[0].GAME_NAME);
        $("#bodymodalshow").html(`
            <img class="center" style=" object-fit: cover; object-position: center; width: 100%; height: calc( 40vh - ( (1.275rem + .3vw) * 5)); border-radius: 5px;" src="${response.result[0].GAME_COVER}">
            <h1 style="margin-top: 15px">${response.result[0].GAME_NAME}</h1>
            <h4 class="description">Price: ${response.result[0].GAME_PRICE}</h4>
            <h4 class="description">Added to the store on: ${response.result[0].RELEASEDATE}</h4><br>
            <p style="text-align: justify!important; text-justify: inter-word!important; font-size:125%">${response.result[0].GAME_DESCRIP}</p>
            `);
      }
    });
  }

  /* relleno de tablaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaas */

  /* cosas de los juegos_______________________________________________________*/
  function gamestable() {
    $.ajax({
      type: "GET",
      url: 'https://itp-sd.site/hll/Steam%20API/api%20files/showgames.php',
      data: {},
      success: function(response) {
        console.log(response.result)
        /* var jsonData = JSON.parse(response); */
        if (response.success) {
          response.result.forEach(row => {
            row.BUTTONS = "<button class='btn' data-mdb-toggle='modal' data-mdb-target='#modaledit' onclick='gamestablefilledit(" + row.GAME_ID + ")'>Editar</button>&nbsp;" +
              "<button class='btn' data-mdb-toggle='modal' data-mdb-target='#modaldel' onclick='gamestabledeletemodal(" + row.GAME_ID + ")'>Eliminar</button>";
            row.GAME_DESCRIP = `<span class='d-inline-block text-truncate' style='max-width: 150px;'>${row.GAME_DESCRIP}</span>`;
          });
          /* VER QUE VERGA */
          $("#gamesearch").DataTable().clear();
          $("#gamesearch").DataTable().rows.add(response.result).draw();
        }
      }
    });
  }

  function gamestablefilledit(gameid) {
    $.ajax({
      type: "GET",
      url: 'https://itp-sd.site/hll/Steam%20API/api%20files/gamedetail.php?id=' + gameid,
      data: {},
      success: function(response) {
        console.log(response.result)
        /* var jsonData = JSON.parse(response); */
        if (response.success) {
          $("#geId").val(gameid);
          $("#geName").val(response.result[0].GAME_NAME);
          $("#gePrice").val(response.result[0].GAME_PRICE);
          $("#geDesc").val(response.result[0].GAME_DESCRIP);
          $("#geCover").val(response.result[0].GAME_COVER);
        }
      }
    });
  }

  function gamestabledeletemodal(gameid) {
    $("#gdId").val(gameid);
  }

  /* cosas de los usuarios_______________________________________________________*/
  function userstable() {
    $.ajax({
      type: "GET",
      url: 'https://itp-sd.site/hll/Steam%20API/api%20files/showusers.php',
      data: {},
      success: function(response) {
        console.log(response.result)
        /* var jsonData = JSON.parse(response); */
        if (response.success) {
          response.result.forEach(row => {
            row.BUTTONS = "<button class='btn' data-mdb-toggle='modal' data-mdb-target='#modaledit' onclick='gamestablefilledit(" + row.USR_ID + ")'>Editar</button>&nbsp;" +
              "<button class='btn' data-mdb-toggle='modal' data-mdb-target='#modaldel' onclick='gamestabledeletemodal(" + row.USR_ID + ")'>Eliminar</button>";
            /* row.GAME_DESCRIP = `<span class='d-inline-block text-truncate' style='max-width: 150px;'>${row.GAME_DESCRIP}</span>`; */
          });
          $("#usersearch").DataTable().clear();
          $("#usersearch").DataTable().rows.add(response.result).draw();
        }
      }
    });
  }

  function gamestablefilledit(usrid) {
    $.ajax({
      type: "GET",
      url: 'https://itp-sd.site/hll/Steam%20API/api%20files/userdetail.php?id=' + usrid,
      data: {},
      success: function(response) {
        console.log(response.result)
        /* var jsonData = JSON.parse(response); */
        if (response.success) {
          $("#ueId").val(usrid);
          $("#ueName").val(response.result[0].USR_NICKNAME);
          $("#ueEmail").val(response.result[0].USR_EMAIL);
          $("#ueLVL").val(response.result[0].USR_LVL);
          $("#uePFP").val(response.result[0].USR_PFP);
        }
      }
    });
  }

  function usertabledeletemodal(usrid) {
    $("#udId").val(usrid);
  }
</script>
</body>

</html>
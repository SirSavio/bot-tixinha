<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot Tixinha</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark text-white text-center">
                <h2>Bot Tixinha</h2>
            </div>
            <div class="card-body">
                <h4 align="center">O tixinha está: <span id="status"></span></h4>
                <div align="center" id="btnReset">
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="url.js"></script>


<script>
    let OAuth = location.hash;
    let params = getParams(OAuth)
    console.log(params)

    let abriuGuia = false

    setInterval(() => {
        $.get({
            url: "https://api.twitch.tv/helix/streams?user_login=Tixinhadois",
            headers: {
                'Authorization': 'Bearer ' + params['#access_token'],
                'Client-Id': 'n1fua2542bclglgct0949348asi2s2'
            },
            success: (data) => {
                console.log(data)
                if (data.data.length) {
                    if (!abriuGuia) {
                        window.open(
                            'https://twitch.tv/tixinhadois',
                            '_blank'
                        );
                        abriuGuia = true
                    }
                    $('#status').html('ONLINE')
                    $('#status').attr('class','text-success')
                } else {
                    $('#status').html('OFFLINE')
                    $('#status').attr('class','text-danger')
                }
            }
        })

        if(abriuGuia){
            $('#btnReset').html('')
            $('#btnReset').append("<button onclick='abriuGuia = false' class='btn btn-danger'>Resetar Abertura de Guia</button>")
        }

    }, 1000);



</script>

</html>
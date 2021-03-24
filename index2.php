<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seastar Hotelaria</title>
    <link rel="stylesheet" href="design.css">

    
</head>
<body>

    <header>
        <img src="" alt="" width="250px">
        </header>

            

    <div id="announce" name="ad">
    </div>

    <div class="container" name="find">
        <div id="title">
            CIA. SEASTAR HOTELARIA
        </div>
       
            <div id="innerBusca">
             <p><h3>BEM VINDO!</h3></p>
             <p>ENCONTRE E RESERVE A MELHOR HOSPEDAGEM!</p>
            
             <div id="pesquisa">
            <form action="buscar_hoteis.php" method="POST">
            <p><label for="h_cidade">DESTINO</label>
             <br><input class="destino" type="text" name="h_cidade" id="cidade" required></p>
            
            <p><label for="ida">CHECK-IN</label>
            <label for="volta" width="500px">CHECK-OUT</label>
            <input class ="checkin" type="date" name="checkin" id="ida" min="2020-07-15" max="2025-05-01" required>
            <input class="checkout" type="date" name="checkout" id="volta" min="2020-07-15" max="2025-05-01"></p>
        
            <input class="buscar" type="submit" name="buscar" value="BUSCAR"></p>
            </form>

        </div>
       
            </div>
            <div>
    </div>
    </div>
    <div>
    <p> Possui uma conta ou deseja cadastrar-se? <a href="pagina_login.php"> Clique Aqui.</a></p>
    </div>
</body>
</html>
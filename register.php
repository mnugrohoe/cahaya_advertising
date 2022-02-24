<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .container div {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        image {
            width: 50%;
        }
        
        span {
            font-size: 1.5rem;
            margin: 2rem;
        }
        
        button {
            font-size: 2rem;
        }
        
        button:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <div><img src="img/cahaya/under_construct.png" alt="under_construct"></div>
            <div><span>gunakan user <b>'admin'</b> pass <b>'admin'</b> atau user <b>'user'</b> pass <b>'user'</b> untuk
          login sementara</span>
            </div>
            <div>
                <button onclick="location.href='index.php'">Kembali ke Home</button></div>
        </div>
    </div>
</body>

</html>
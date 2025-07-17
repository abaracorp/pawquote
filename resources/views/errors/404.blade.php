<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Page Not Found</title>
     <link rel="shortcut icon" href="{{ asset('images/pawquote-favicon.png') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 500px;
            padding: 2rem;
        }

        h1 {
            font-size: 96px;
            margin: 0;
            color: #dc3545;
        }

        h2 {
            font-size: 24px;
            margin: 10px 0 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 72px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>The page you are looking for might have been removed or is temporarily unavailable.</p>
        <a href="{{url('/')}}">Go Back Home</a>
    </div>
</body>
</html>

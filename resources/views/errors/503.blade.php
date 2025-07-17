<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 | Service Unavailable</title>
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
            color: #ffc107;
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
        <h1>503</h1>
        <h2>Service Unavailable</h2>
        <p>Sorry, we're currently performing maintenance or the server is temporarily overloaded. Please try again later.</p>
        <a href="{{url('/')}}">Return to Home</a>
    </div>
</body>
</html>

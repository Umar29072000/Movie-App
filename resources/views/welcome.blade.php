<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMDb Movie App</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and General Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 20px;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 20px;
        }

        /* Button Styling */
        .hero a {
            display: inline-block;
            padding: 12px 30px;
            margin: 10px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .hero a:hover {
            background-color: #555;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #777;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="hero">
        <h1>Welcome to OMDb Movie App</h1>
        <p>Explore and discover movies from the OMDb database. Login to start searching and managing your favorite movies.</p>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('movies.list') }}">Explore Movies</a>
    </div>

    <footer>
        <p>Developed with Laravel | <a href="https://github.com/Umar29072000" target="_blank">GitHub Repo</a></p>
    </footer>

</body>
</html>

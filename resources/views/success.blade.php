<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumission réussie</title>
    <style>
        :root {
            --primary-color: #3f51b5;
            --primary-dark: #303f9f;
            --primary-light: #c5cae9;
            --text-color: #333;
            --light-gray: #f5f5f5;
            --border-radius: 8px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            margin: 40px auto;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 30px;
            text-align: center;
        }
        
        h1 {
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .success-icon {
            font-size: 72px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        
        p {
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: var(--border-radius);
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✅</div>
        <h1>Candidature enregistrée !</h1>
        <p>Votre formulaire a été soumis avec succès. Nous vous contacterons prochainement.</p>
        {{-- <a href="{{ url('/') }}" class="btn">Retour à l'accueil</a> --}}
    </div>
</body>
</html>
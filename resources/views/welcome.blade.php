<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès au Formulaire de réseautage Jeunesse St Camille</title>
    <style>
        :root {
            --primary-color: #3f51b5;
            --primary-dark: #303f9f;
            --primary-light: #c5cae9;
            --accent-color: #ff4081;
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
        }
        
        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: border 0.3s, box-shadow 0.3s;
        }
        
        input:focus, select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px var(--primary-light);
            outline: none;
        }
        
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 2px dashed #ddd;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: all 0.3s;
            background-color: var(--light-gray);
            min-height: 100px;
        }
        
        .file-upload-label:hover {
            border-color: var(--primary-color);
            background-color: rgba(197, 202, 233, 0.2);
        }
        
        .file-upload-label span {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .file-upload-label i {
            font-size: 32px;
            margin-bottom: 8px;
            color: var(--primary-color);
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            z-index: -1;
        }
        
        .file-name {
            margin-top: 10px;
            font-size: 14px;
            display: none;
        }
        
        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 500;
            border-radius: var(--border-radius);
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: var(--primary-dark);
        }
        
        .submission-form {
            display: none;
        }
        
        .password-form {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }
        
        .input-with-icon input {
            padding-left: 40px;
        }
        
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            background: none;
            border: none;
            padding: 0;
            width: auto;
        }
        
        .error-message {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        
        .validation-error {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo i {
            font-size: 48px;
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 20px;
            }
            
            input, select, button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Formulaire de mot de passe -->
        <div id="password-section">
            <div class="logo">
                <i>🔒</i>
            </div>
            <h1>Réseautage Jeunesse St Camille</h1>
            <form id="password-form" class="password-form">
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-with-icon">
                        <i>🔑</i>
                        <input type="password" id="password" name="password" required>
                        <button type="button" class="toggle-password" id="toggle-password">👁️</button>
                    </div>
                    <div class="error-message" id="password-error">Mot de passe incorrect.</div>
                </div>
                
                <button type="submit">Accéder au formulaire</button>
            </form>
        </div>
        
        <!-- Formulaire de soumission (initialement caché) -->
        <div id="submission-section" class="submission-form">
            <h1>Réseautage Jeunesse St Camille</h1>
            
            <form id="submission-form" method="POST" action="{{ route('form.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
                    @error('nom')
                        <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    @error('prenom')
                        <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="profession">Profession</label>
                    <input type="text" id="profession" name="profession" placeholder="Entrez votre profession" value="{{ old('profession') }}" required>
                    @error('profession')
                        <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="besoin">Besoin</label>
                    <select id="besoin" name="besoin" required>
                        <option value="" disabled {{ old('besoin') ? '' : 'selected' }}>Sélectionnez votre besoin</option>
                        <option value="emploi" {{ old('besoin') == 'emploi' ? 'selected' : '' }}>Emploi</option>
                        <option value="stage-soutenance" {{ old('besoin') == 'stage-soutenance' ? 'selected' : '' }}>Stage de Soutenance</option>
                        <option value="stage-insertion" {{ old('besoin') == 'stage-insertion' ? 'selected' : '' }}>Stage Insertion Professionnelle</option>
                    </select>
                    @error('besoin')
                        <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="cv">CV</label>
                    <div class="file-upload">
                        <label for="cv" class="file-upload-label">
                            <span>
                                <i>📄</i>
                                <span>Cliquez ou glissez votre CV en pdf ici</span>
                            </span>
                        </label>
                        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                        <div class="file-name" id="file-name"></div>
                        @error('cv')
                            <div class="validation-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit">Soumettre</button>
                </div>
                
                <div class="form-group">
                    <button type="button" id="logout-btn" style="background: rgb(198, 5, 5)">Retour</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Mot de passe requis
        const correctPassword = "paroisse";
        
        // Gestion de la vérification du mot de passe
        document.getElementById('password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            
            if (password === correctPassword) {
                // Mot de passe correct
                document.getElementById('password-section').style.display = 'none';
                document.getElementById('submission-section').style.display = 'block';
                
                // Stocker l'état de connexion dans localStorage (pour la persistance)
                localStorage.setItem('isAuthenticated', 'true');
            } else {
                // Afficher un message d'erreur
                document.getElementById('password-error').style.display = 'block';
                
                // Réinitialiser le champ de mot de passe
                document.getElementById('password').value = '';
            }
        });
        
        // Vérifier si l'utilisateur est déjà authentifié
        window.addEventListener('load', function() {
            // Si Laravel renvoie des erreurs de validation, on affiche le formulaire
            @if($errors->any())
                document.getElementById('password-section').style.display = 'none';
                document.getElementById('submission-section').style.display = 'block';
            @else
                if (localStorage.getItem('isAuthenticated') === 'true') {
                    document.getElementById('password-section').style.display = 'none';
                    document.getElementById('submission-section').style.display = 'block';
                }
            @endif
        });
        
        // Gestion du retour
        document.getElementById('logout-btn').addEventListener('click', function() {
            localStorage.removeItem('isAuthenticated');
            document.getElementById('password-section').style.display = 'block';
            document.getElementById('submission-section').style.display = 'none';
            
            // Réinitialiser le champ de mot de passe
            document.getElementById('password').value = '';
            document.getElementById('password-error').style.display = 'none';
        });
        
        // Afficher/Masquer le mot de passe
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
        
        // Afficher le nom du fichier sélectionné
        document.getElementById('cv').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const fileNameDisplay = document.getElementById('file-name');
            
            if (fileName) {
                fileNameDisplay.textContent = 'Fichier sélectionné: ' + fileName;
                fileNameDisplay.style.display = 'block';
                document.querySelector('.file-upload-label span span').textContent = 'Changer de fichier';
            } else {
                fileNameDisplay.style.display = 'none';
                document.querySelector('.file-upload-label span span').textContent = 'Cliquez ou glissez votre CV ici';
            }
        });
        
        // Gestion de glisser-déposer pour le CV
        const dropZone = document.querySelector('.file-upload-label');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            dropZone.style.borderColor = 'var(--primary-color)';
            dropZone.style.backgroundColor = 'rgba(197, 202, 233, 0.3)';
        }
        
        function unhighlight() {
            dropZone.style.borderColor = '#ddd';
            dropZone.style.backgroundColor = 'var(--light-gray)';
        }
        
        dropZone.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            document.getElementById('cv').files = files;
            
            // Déclencher l'événement change pour afficher le nom du fichier
            const event = new Event('change');
            document.getElementById('cv').dispatchEvent(event);
        }
        
        // Ne pas empêcher la soumission du formulaire pour permettre à Laravel de traiter les données
        // document.getElementById('submission-form').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     alert('Formulaire soumis avec succès!');
        // });
    </script>
</body>
</html>
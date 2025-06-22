<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de QR Code</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 20px;
            gap: 20px;
        }

        .form-container {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .qr-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
        }

        .input-group {
            display: flex;
            gap: 15px;
        }

        .input-group>div {
            flex: 1;
        }

        .gender-group {
            display: flex;
            justify-content: space-around;
            margin-bottom: 15px;
        }

        .gender-group label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .gender-group input {
            margin-right: 8px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #27ae60;
        }

        .qr-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
            font-size: 20px;
        }

        .qr-code {
            margin-top: 10px;
        }

        .export-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .export-btn:hover {
            background-color: #c0392b;
        }

        .export-btn i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .input-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form-title">Inscription</div>
            <form id="inscriptionForm">
                <div class="input-group">
                    <div>
                        <label for="Prenom">Prénom</label>
                        <input type="text" id="Prenom" name="Prenom" oninput="updateQRCode()" required>
                    </div>
                    <div>
                        <label for="Nom">Nom</label>
                        <input type="text" id="Nom" name="Nom" oninput="updateQRCode()" required>
                    </div>
                </div>

                <div>
                    <label for="ID">ID</label>
                    <input type="text" id="ID" name="ID" oninput="updateQRCode()" required>
                </div>

                <div>
                    <label for="Telephone">Téléphone</label>
                    <input type="tel" id="Telephone" name="Telephone" oninput="updateQRCode()" required>
                </div>

                <div>
                    <label for="Email">Email</label>
                    <input type="email" id="Email" name="Email" oninput="updateQRCode()" required>
                </div>

                <div>
                    <label for="Departement">Département</label>
                    <select id="Departement" name="Departement" oninput="updateQRCode()" required>
                        <option value="">Sélectionnez un département</option>
                        <option value="Informatique">Informatique</option>
                        <option value="Ressources Humaines">Ressources Humaines</option>
                        <option value="Comptabilité">Comptabilité</option>
                    </select>
                </div>

                <div>
                    <label for="Role">Rôle</label>
                    <select id="Role" name="Role" oninput="updateQRCode()" required>
                        <option value="">Sélectionnez un rôle</option>
                        <option value="Employé">Employé</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="gender-group">
                    <label for="Masculin">
                        <input type="radio" id="Masculin" name="Genre" value="Masculin" oninput="updateQRCode()"
                            required> Masculin
                    </label>
                    <label for="Feminin">
                        <input type="radio" id="Feminin" name="Genre" value="Feminin" oninput="updateQRCode()" required>
                        Féminin
                    </label>
                </div>

                <button type="button" class="submit-btn" onclick="updateQRCode()">Générer QR Code</button>
            </form>
        </div>

        <div class="qr-container">
            <div class="qr-title">QR Code</div>
            <canvas class="qr-code" id="qr"></canvas>
            <button class="export-btn" onclick="exportToPDF()"><i class="fas fa-file-pdf"></i> Exporter en
                PDF</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script>
        var qr;
        window.onload = function () {
            qr = new QRious({
                element: document.getElementById('qr'),
                size: 200,
                value: 'Aucune valeur'
            });
        };

        function updateQRCode() {
            var form = document.getElementById('inscriptionForm');
            var formData = new FormData(form);
            var data = [];

            for (var pair of formData.entries()) {
                if (pair[1]) {
                    data.push(pair[0] + ': ' + pair[1]);
                }
            }

            qr.set({
                value: data.join('\n')
            });
        }

        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const qrCodeImage = document.querySelector('.qr-code').toDataURL("image/png");

            doc.addImage(qrCodeImage, 'PNG', 10, 10, 50, 50);
            doc.save('qrcode.pdf');
        }
    </script>
</body>

</html>

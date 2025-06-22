<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planification des Heures par Département</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-size: .875rem;
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #343a40;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #adb5bd;
            padding: .75rem 1rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
        }

        .sidebar .nav-link.active {
            border-left: 3px solid #007bff;
        }

        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 20px;
            border: none;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .department-section {
            margin-bottom: 20px;
        }

        .time-inputs {
            display: flex;
            align-items: center;
        }

        .time-inputs input {
            margin-right: 10px;
        }

        .day-schedule {
            margin-bottom: 15px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            align-items: center;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#overview" data-toggle="tab">
                                Vue d'ensemble
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#planning" data-toggle="tab">
                                Planification des heures
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="tab-content">
                    <!-- Planification des heures -->
                    <div class="tab-pane fade show active" id="planning">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Planification des heures par département</h1>
                            <button class="btn btn-success" onclick="openDepartmentModal()">
                                <i class="fas fa-plus"></i> Créer/Modifier un département
                            </button>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Sélectionner un département
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" id="departmentSelect">
                                        <option value="">-- Sélectionner un département --</option>
                                        <option value="informatique">Informatique</option>
                                        <option value="rh">Ressources Humaines</option>
                                        <option value="comptabilite">Comptabilité</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Planification pour le département sélectionné
                            </div>
                            <div class="card-body">
                                <div id="departmentSchedule">
                                    <!-- La planification sera affichée ici -->
                                    <div class="department-section" id="informatique" style="display: none;">
                                        <h5>Informatique</h5>
                                        <div class="day-schedule">
                                            <h6>Lundi</h6>
                                            <div class="time-inputs">
                                                <input type="time" value="09:00"> à <input type="time" value="17:00">
                                            </div>
                                        </div>
                                        <!-- Ajoutez d'autres jours ici -->
                                    </div>
                                    <!-- Ajoutez d'autres sections de département ici -->
                                </div>
                                <button class="btn btn-custom" onclick="saveSchedule()">Enregistrer la
                                    planification</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal pour créer/modifier un département -->
    <div id="departmentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDepartmentModal()">&times;</span>
            <h2>Créer/Modifier un département</h2>
            <form id="departmentForm">
                <div class="form-group">
                    <label for="departmentName">Nom du département</label>
                    <input type="text" class="form-control" id="departmentName" required>
                </div>
                <button type="button" class="btn btn-custom" onclick="saveDepartment()">Enregistrer</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#departmentSelect').change(function () {
                const selectedDepartment = $(this).val();
                $('.department-section').hide();
                $('#' + selectedDepartment).show();
            });
        });

        function openDepartmentModal() {
            $('#departmentModal').show();
        }

        function closeDepartmentModal() {
            $('#departmentModal').hide();
        }

        function saveDepartment() {
            const departmentName = $('#departmentName').val();
            if (departmentName) {
                alert('Département "' + departmentName + '" enregistré/modifié!');
                closeDepartmentModal();
                // Ajoutez ici la logique pour enregistrer ou modifier le département
            } else {
                alert('Veuillez entrer un nom de département.');
            }
        }

        function saveSchedule() {
            alert('Planification enregistrée!');
            // Ajoutez ici la logique pour enregistrer la planification
        }
    </script>
</body>

</html>

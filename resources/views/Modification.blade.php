<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Pointage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
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

        [role="main"] {
            padding-top: 48px;
        }

        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 20px;
            border: none;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
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
                            <a class="nav-link" href="#planning" data-toggle="tab">
                                Planification des heures
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#edit-pointage" data-toggle="tab">
                                Modifier pointage
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#absences" data-toggle="tab">
                                Gestion des absences
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pointages" data-toggle="tab">
                                Liste des pointages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#employees" data-toggle="tab">
                                Gestion employés
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="tab-content">
                    <!-- Modifier pointage -->
                    <div class="tab-pane fade show active" id="edit-pointage">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Modifier un pointage</h1>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form id="modifyAttendanceForm">
                                    <div class="form-group">
                                        <label for="employeeSelect">Sélectionner un employé</label>
                                        <select class="form-control" id="employeeSelect">
                                            <option value="">-- Sélectionner un employé --</option>
                                            <option value="1">Jean Dupont</option>
                                            <option value="2">Marie Martin</option>
                                            <option value="3">Pierre Durand</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateInput">Date</label>
                                        <input type="date" class="form-control" id="dateInput">
                                    </div>
                                    <div class="form-group">
                                        <label for="entryTime">Heure d'entrée</label>
                                        <input type="time" class="form-control" id="entryTime">
                                    </div>
                                    <div class="form-group">
                                        <label for="exitTime">Heure de sortie</label>
                                        <input type="time" class="form-control" id="exitTime">
                                    </div>
                                    <div class="form-group">
                                        <label for="statusSelect">Statut</label>
                                        <select class="form-control" id="statusSelect">
                                            <option value="present">Présent</option>
                                            <option value="absent">Absent</option>
                                            <option value="late">En retard</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-custom">Enregistrer les
                                        modifications</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#modifyAttendanceForm').on('submit', function (event) {
                event.preventDefault();

                // Récupérer les valeurs des champs
                const employee = $('#employeeSelect').val();
                const date = $('#dateInput').val();
                const entryTime = $('#entryTime').val();
                const exitTime = $('#exitTime').val();
                const status = $('#statusSelect').val();

                // Afficher les valeurs dans la console
                console.log('Employé:', employee);
                console.log('Date:', date);
                console.log('Heure d\'entrée:', entryTime);
                console.log('Heure de sortie:', exitTime);
                console.log('Statut:', status);

                // Afficher un message de succès
                alert('Les modifications ont été enregistrées avec succès!');
            });
        });
    </script>
</body>

</html>

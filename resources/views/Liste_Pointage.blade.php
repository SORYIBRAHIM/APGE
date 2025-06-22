<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pointages</title>
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

        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-section .form-group {
            margin-bottom: 0;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }
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
                            <a class="nav-link active" href="#pointages" data-toggle="tab">
                                Liste des pointages
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="tab-content">
                    <!-- Liste des pointages -->
                    <div class="tab-pane fade show active" id="pointages">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Liste des pointages</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                                    <i class="fas fa-print"></i> Imprimer en PDF
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Filtrer les pointages
                            </div>
                            <div class="card-body">
                                <div class="filter-section">
                                    <div class="form-group">
                                        <select class="form-control" id="filterPeriod">
                                            <option value="week">Cette semaine</option>
                                            <option value="month">Ce mois</option>
                                            <option value="year">Cette année</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-custom" onclick="filterAttendance()">Filtrer</button>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Pointages
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Employé</th>
                                                <th>Date</th>
                                                <th>Heure d'entrée</th>
                                                <th>Heure de sortie</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody id="attendanceTableBody">
                                            <!-- Les données seront insérées ici -->
                                            <tr>
                                                <td>Jean Dupont</td>
                                                <td>2023-10-01</td>
                                                <td>08:00</td>
                                                <td>17:00</td>
                                                <td>Présent</td>
                                            </tr>
                                            <tr>
                                                <td>Marie Martin</td>
                                                <td>2023-10-02</td>
                                                <td>08:30</td>
                                                <td>17:30</td>
                                                <td>Présent</td>
                                            </tr>
                                            <!-- Ajoutez plus de lignes ici -->
                                        </tbody>
                                    </table>
                                </div>
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
        function filterAttendance() {
            const filterPeriod = document.getElementById('filterPeriod').value;
            alert('Filtrer par: ' + filterPeriod);
            // Ajoutez ici la logique pour filtrer les pointages en fonction de la période sélectionnée
        }
    </script>
</body>

</html>

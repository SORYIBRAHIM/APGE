<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Gestion RH</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-header h2 {
            font-size: 1.4em;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.9em;
            opacity: 0.8;
        }

        .nav-menu {
            list-style: none;
            padding: 20px 0;
        }

        .nav-item {
            margin: 5px 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #fff;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: #fff;
        }

        .nav-icon {
            font-size: 1.2em;
            margin-right: 12px;
            width: 20px;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 0;
            background: #f8f9fa;
        }

        .header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            color: #333;
            font-size: 1.8em;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 25px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        .content {
            padding: 30px;
        }

        .section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 25px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f8f9fa;
        }

        .card-title {
            font-size: 1.3em;
            font-weight: 600;
            color: #333;
        }

        .controls {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            min-width: 150px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            font-size: 0.9em;
        }

        input,
        select,
        textarea {
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.9em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.8em;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85em;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #f8f9fa;
            transition: background-color 0.3s ease;
        }

        tr:hover td {
            background-color: #f8f9ff;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status.present {
            background: #d4edda;
            color: #155724;
        }

        .status.absent {
            background: #f8d7da;
            color: #721c24;
        }

        .status.retard {
            background: #fff3cd;
            color: #856404;
        }

        .status.entree {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status.sortie {
            background: #f8d7da;
            color: #721c24;
        }

        .status.valide {
            background: #d4edda;
            color: #155724;
        }

        .status.invalide {
            background: #f8d7da;
            color: #721c24;
        }

        .pointage-row {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .pointage-entry,
        .pointage-exit {
            flex: 1;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85em;
            text-align: center;
        }

        .pointage-entry {
            background: #e3f2fd;
            color: #1976d2;
        }

        .pointage-exit {
            background: #fce4ec;
            color: #c2185b;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            margin: 3% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            animation: modalSlideIn 0.3s ease;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            border-left: 4px solid #667eea;
        }

        .stat-value {
            font-size: 2em;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9em;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .schedule-day {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .schedule-day h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .time-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left-color: #28a745;
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border-left-color: #ffc107;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left-color: #dc3545;
        }

        .employee-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .employee-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #667eea;
        }

        .employee-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .employee-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2em;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .controls {
                flex-direction: column;
                align-items: stretch;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .schedule-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>🏢 Admin RH</h2>
                <p>Gestion des employés</p>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active" onclick="showSection('overview')">
                        <span class="nav-icon">📊</span>
                        Vue d'ensemble
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/DASHBORD/Planification_heur.html" class="nav-link" onclick="showSection('planning')">
                        <span class="nav-icon">⏰</span>
                        Planification des heures
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/DASHBORD/Modification.html" class="nav-link" onclick="showSection('edit-pointage')">
                        <span class="nav-icon">✏️</span>
                        Modifier pointage
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/DASHBORD/Gestion_Absense.html" class="nav-link" onclick="showSection('absences')">
                        <span class="nav-icon">❌</span>
                        Gestion des absences
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/DASHBORD/Liste_Pointage.html" class="nav-link" onclick="showSection('pointages')">
                        <span class="nav-icon">📋</span>
                        Liste des pointages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/DASHBORD/Gestion_Employées.html" class="nav-link" onclick="showSection('employees')">
                        <span class="nav-icon">👥</span>
                        Gestion employés
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1 id="pageTitle">Vue d'ensemble</h1>
                <div class="admin-info">
                    <div class="admin-avatar">MA</div>
                    <div>
                        <div style="font-weight: 600;">Mohamed Admin</div>
                        <div style="font-size: 0.9em; color: #666;">Administrateur RH</div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Vue d'ensemble -->
                <div id="overview" class="section active">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-value" id="totalEmployees">8</div>
                            <div class="stat-label">Total Employés</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" id="todayPresent">6</div>
                            <div class="stat-label">Présents Aujourd'hui</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" id="todayAbsent">2</div>
                            <div class="stat-label">Absents Aujourd'hui</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" id="todayLate">1</div>
                            <div class="stat-label">Retards Aujourd'hui</div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pointages du jour</h3>
                            <button class="btn btn-primary" onclick="refreshData()">
                                🔄 Actualiser
                            </button>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Département</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Entrée</th>
                                        <th>Sortie</th>
                                    </tr>
                                </thead>
                                <tbody id="overviewTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Planification des heures -->
                <div id="planning" class="section">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Planification des heures de pointage</h3>
                        </div>
                        <div class="controls">
                            <div class="form-group">
                                <label>Employé</label>
                                <select id="planningEmployee">
                                    <option value="">Sélectionner un employé</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semaine</label>
                                <input type="week" id="planningWeek">
                            </div>
                            <button class="btn btn-primary" onclick="loadPlanning()">
                                📅 Charger Planning
                            </button>
                        </div>
                        <div class="schedule-grid" id="scheduleGrid">
                            <div class="schedule-day">
                                <h4>Lundi</h4>
                                <div class="time-inputs">
                                    <input type="time" value="08:00" id="lundi-debut">
                                    <span>à</span>
                                    <input type="time" value="17:00" id="lundi-fin">
                                </div>
                            </div>
                            <div class="schedule-day">
                                <h4>Mardi</h4>
                                <div class="time-inputs">
                                    <input type="time" value="08:00" id="mardi-debut">
                                    <span>à</span>
                                    <input type="time" value="17:00" id="mardi-fin">
                                </div>
                            </div>
                            <div class="schedule-day">
                                <h4>Mercredi</h4>
                                <div class="time-inputs">
                                    <input type="time" value="08:00" id="mercredi-debut">
                                    <span>à</span>
                                    <input type="time" value="17:00" id="mercredi-fin">
                                </div>
                            </div>
                            <div class="schedule-day">
                                <h4>Jeudi</h4>
                                <div class="time-inputs">
                                    <input type="time" value="08:00" id="jeudi-debut">
                                    <span>à</span>
                                    <input type="time" value="17:00" id="jeudi-fin">
                                </div>
                            </div>
                            <div class="schedule-day">
                                <h4>Vendredi</h4>
                                <div class="time-inputs">
                                    <input type="time" value="08:00" id="vendredi-debut">
                                    <span>à</span>
                                    <input type="time" value="17:00" id="vendredi-fin">
                                </div>
                            </div>
                            <div class="schedule-day">
                                <h4>Samedi</h4>
                                <div class="time-inputs">
                                    <input type="time" value="08:00" id="samedi-debut">
                                    <span>à</span>
                                    <input type="time" value="12:00" id="samedi-fin">
                                </div>
                            </div>
                            <div class="schedule-day">
                                <h4>Dimanche</h4>
                                <div style="text-align: center; color: #666; font-style: italic;">
                                    Jour de repos
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 20px; text-align: center;">
                            <button class="btn btn-success" onclick="savePlanning()">
                                💾 Sauvegarder Planning
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modifier pointage -->
                <div id="edit-pointage" class="section">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier un pointage</h3>
                        </div>
                        <div class="controls">
                            <div class="form-group">
                                <label>Employé</label>
                                <select id="editPointageEmployee">
                                    <option value="">Sélectionner un employé</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" id="editPointageDate">
                            </div>
                            <button class="btn btn-primary" onclick="loadPointagesToEdit()">
                                🔍 Rechercher
                            </button>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Employé</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Type</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="editPointageTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Gestion des absences -->
                <div id="absences" class="section">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gestion des absences</h3>
                            <button class="btn btn-success" onclick="showAddAbsenceModal()">
                                ➕ Ajouter Absence
                            </button>
                        </div>
                        <div class="controls">
                            <div class="form-group">
                                <label>Employé</label>
                                <select id="absenceEmployeeFilter">
                                    <option value="">Tous les employés</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select id="absenceTypeFilter">
                                    <option value="">Tous les types</option>
                                    <option value="Maladie">Maladie</option>
                                    <option value="Congé">Congé</option>
                                    <option value="Personnel">Personnel</option>
                                    <option value="Non justifié">Non justifié</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" onclick="filterAbsences()">
                                🔍 Filtrer
                            </button>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Employé</th>
                                        <th>Date Début</th>
                                        <th>Date Fin</th>
                                        <th>Type</th>
                                        <th>Motif</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="absencesTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Liste des pointages -->
                <div id="pointages" class="section">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des pointages</h3>
                            <button class="btn btn-success" onclick="exportPointages()">
                                📊 Exporter
                            </button>
                        </div>
                        <div class="controls">
                            <div class="form-group">
                                <label>Employé</label>
                                <select id="pointageEmployeeFilter">
                                    <option value="">Tous les employés</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trier par</label>
                                <select id="pointagePeriodFilter">
                                    <option value="all">Toutes les périodes</option>
                                    <option value="today">Aujourd'hui</option>
                                    <option value="week">Cette semaine</option>
                                    <option value="month">Ce mois</option>
                                    <option value="year">Cette année</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Du</label>
                                <input type="date" id="pointageDateFrom">
                            </div>
                            <div class="form-group">
                                <label>Au</label>
                                <input type="date" id="pointageDateTo">
                            </div>
                            <button class="btn btn-primary" onclick="filterPointages()">
                                🔍 Filtrer
                            </button>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Employé</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Type</th>
                                        <th>QR Code</th>
                                        <th>Statut</th>
                                        <th>Modifié par</th>
                                    </tr>
                                </thead>
                                <tbody id="pointagesTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Gestion employés -->
                <div id="employees" class="section">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gestion des employés</h3>
                            <button class="btn btn-success" onclick="showAddEmployeeModal()">
                                ➕ Ajouter Employé
                            </button>
                        </div>
                        <div class="employee-grid" id="employeeGrid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modifier Pointage -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h2>Modifier Pointage</h2>
            <form id="editForm">
                <div class="form-group">
                    <label>Employé</label>
                    <input type="text" id="editEmployee" readonly>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" id="editDate">
                </div>
                <div class="form-group">
                    <label>Heure</label>
                    <input type="time" id="editTime">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select id="editType">
                        <option value="Entrée">Entrée</option>
                        <option value="Sortie">Sortie

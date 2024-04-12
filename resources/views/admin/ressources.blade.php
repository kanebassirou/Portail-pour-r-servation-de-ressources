<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Espace Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<x-app-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex">
                    <div id="nav-bar">
                        <input id="nav-toggle" type="checkbox" />
                        <div id="nav-header">
                            {{-- <a id="nav-title" href="#" target="_blank" class="nav-button"><i class="fas fa-user-shield"></i> Admin</a> --}}
                            <a id="nav-title" href="#" target="_blank" class="nav-button"><i class="fas fa-user-cog"></i> Admin</a>

                            <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
                            <hr />
                        </div>
                        <div id="nav-content">
                            <a href="#" class="nav-button"><i class="fas fa-sliders-h"></i> <span>Dashboard</span></a>
                            <a href="#" class="nav-button"><i class="fas fa-user-tie"></i><span>User Profile</span></a>
                            <a href="#" class="nav-button"><i class="fas fa-user-cog"></i> Manage User</a>
                            <hr />
                            <a href="#" class="nav-button"><i class="fas fa-clipboard-list"></i>Gestion des ressources</a>
                            {{-- <div class="nav-button"><i class="fas fa-chart-line"></i><span>Trending</span></div>
                            <div class="nav-button"><i class="fas fa-fire"></i><span>Challenges</span></div>
                            <div class="nav-button"><i class="fas fa-magic"></i><span>Spark</span></div>
                            <hr />
                            <div class="nav-button"><i class="fas fa-gem"></i><span>Codepen Pro</span></div>
                            <div id="nav-content-highlight"></div> --}}
                        </div>
                        <input id="nav-footer-toggle" type="checkbox" />
                        <div id="nav-footer">
                            <div id="nav-footer-heading">
                                <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" /></div>
                                <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">uahnbu</a><span id="nav-footer-subtitle">Admin</span></div>
                                <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
                            </div>
                            <div id="nav-footer-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="col-md-9">
                <h2>Gestion des Ressources</h2>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addResourceModal">
                    Ajouter une ressource
                </a>
                <!-- Tableau des ressources -->
                <table id="resourcesTable" class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Disponibilité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Les lignes du tableau seront générées dynamiquement ici -->
                    </tbody>
                </table>
                <!-- Modale d'ajout de ressource -->
                <div class="modal fade" id="addResourceModal" tabindex="-1" aria-labelledby="addResourceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addResourceModalLabel">Ajouter une Ressource</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulaire d'ajout de ressource -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</x-app-layout>

</html>

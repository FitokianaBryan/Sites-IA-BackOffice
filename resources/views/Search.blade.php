<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recherche</title>
	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo asset('assets/vendors/core/core.css');?>">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css');?>">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo asset('assets/fonts/feather-font/css/iconfont.css');?>">
	<link rel="stylesheet" href="<?php echo asset('assets/vendors/flag-icon-css/css/flag-icon.min.css');?>">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo asset('assets/css/demo_1/style.css');?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo asset('assets/images/favicon.png');?>" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="{{ url('/Home') }}" class="sidebar-brand">
          Mada<span>News</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Principal</li>
          <li class="nav-item">
            <a href="{{ url('/Home') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Accueil</span>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{ url('/ToSearch') }}" class="nav-link">
              <i class="link-icon" data-feather="search"></i>
              <span class="link-title">Rechercher</span>
            </a>
          </li>
          <li class="nav-item nav-category">Article</li>
		  <li class="nav-item">
            <a href="{{ url('/ToAddArticle') }}" class="nav-link">
				<i class="link-icon" data-feather="plus-circle"></i>
              <span class="link-title">Ajouter un article</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
              Dark
            </label>
          </div>
        </div>
      </div>
    </nav>
		<!-- partial -->
	
		<div class="page-wrapper">
				
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Profile
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="{{ url('/Logout') }}" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Déconnexion</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Accueil</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title text-muted">Rechercher un article</h4>
								<form action="{{ url('/Search') }}" method="POST" class="forms-sample">
                                    {{ csrf_field() }}
									<div class="form-group">
										<label for="exampleInputUsername1">Catégorie</label>
										<input type="text" name="categorie" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Catégorie">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Un texte</label>
										<textarea class="form-control" name="texte" rows="6"></textarea>
									</div>
                                    <h5 class="card-text text-muted">Chercher à partir de dates</h5><br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Instant 1</label>
                                                <input type="datetime-local" name="publish_at_1" class="form-control">
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Instant 2</label>
                                                <input type="datetime-local" name="publish_at_2" class="form-control">
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
									<button type="submit" class="btn btn-primary mr-2">Rechercher</button>
								</form>
							</div>
						</div>
					</div>
				</div>
                @if(!empty($liste_article))
                <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
                            <h4 class="card-title text-muted">Résultat(s)</h4>
                            <div class="table-responsive">
                                <table  class="table">
                                    <thead>
                                    <tr>
                                        <th>Catégorie</th>
                                        <th>Titre</th>
                                        <th>Etat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($liste_article as $article)
                                    <tr> 
                                        <td>{{ $article->categorie }}</td>
                                        <td><a href="{{ url('/Details') }}/{{ $article->id }}">{{ $article->titre }}</a></td>
                                        @if($article->getEtat() == "publié")
                                                    <td><p class="btn btn-outline-success disabled">{{ $article->getEtat() }}</p></td>
                                        @else 
                                        <td><p class="btn btn-outline-danger disabled">{{ $article->getEtat() }}</p></td>
                                        @endif
                                        <td>	
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
						</div>
					</div>
				</div>
                @endif
			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://www.nobleui.com" target="_blank">MadaNews</a>. All rights reserved</p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->
	
		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo asset('assets/vendors/core/core.js');?>"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="<?php echo asset('assets/vendors/datatables.net/jquery.dataTables.js');?>"></script>
  <script src="<?php echo asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js');?>"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="<?php echo asset('assets/vendors/feather-icons/feather.min.js');?>"></script>
	<script src="<?php echo asset('assets/js/template.js');?>"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="<?php echo asset('assets/js/data-table.js');?>"></script>
	<!-- end custom js for this page -->
</body>
</html>
<!DOCTYPE html>
<html ng-app="app">
<head>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
	<script src="https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="./style.css" rel="stylesheet">
	<script src="./app.js" type="text/javascript"></script>
</head>
<body ng-controller="PaginationDemoCtrl" >
	<div id='container'>
		<header>
			<div id='header-left'>
				<img src='./images/logo.png'/>
			</div>
			<div id='header-content'>
				<Span id='header-title'>Win555B</Span><br/>
				<Span id='header-sub-title'>Administrator</Span>
			</div>
		</header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Win555B</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href ng-click="exportDataToCSV()"><span class="glyphicon glyphicon-download-alt"></span> Export</a></li>
				</ul>
			</div>
		</nav>
		<div id='content'>
			<!-- Testing -->
			<div class="row">
				<div class="col-md-3">
					<div class="input-group input-group-lg add-on">
						<input type="text" class="form-control search-query" ng-model="query" ng-change="search()" placeholder="Search">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h4 class="text-center">Win555b Users Table</h4>
				</div>
				<div class="col-md-3">
					<select class="form-control input-lg pull-right" ng-model="itemsPerPage" ng-change="perPage()" ng-options="('show '+size+' per page') for size in pageSizes"></select>
				</div>
			</div>
			<!-- Testing -->
			
			<div class='pagenation'>
				<pagination rotate="false" max-size="20" boundary-links="true" total-items="count" ng-model="currentPage" ng-change="pageChanged()" items-per-page="itemsPerPage" class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>
			</div>
			
			<table datatable="ng" class="table">
				<thead>
				<tr>
					<th>ID</th>
					<th>FirstName</th>
					<th>LastName</th>
					<th>Country</th>
					<th>email</th>
				</tr>
				</thead>
				<tbody>
				<tr ng-repeat="person in users">
					<td>{{$index+1 + id}}</td>
					<td>{{person.firstname}}</td>
					<td>{{person.lastname}}</td>
					<td>{{person.country}}</td>
					<td>{{person.email}}</td>
				</tr>
				</tbody>
			</table>
			
			<div class='pagenation'>
				<pagination rotate="false" max-size="20" boundary-links="true" total-items="count" ng-model="currentPage" ng-change="pageChanged()" items-per-page="itemsPerPage" class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>
			</div>
			
		</div>
		<footer>Copyright &copy; win555b.com</footer>
	</div>
</body>
</html>
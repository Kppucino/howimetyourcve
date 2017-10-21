<html>
<head>
	<?php
        include ("menu.php");
    ?>
</head>
<body>
	<div class="container-fluid">
			<div class="col-md-2 statPanel">
				<h2>Statistique :</h2>
				<hr>
				<h2>Tags :</h2>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="filtre">
							<div class="col-md-1">
								<div class="dropdown-holder">
									<div class="dropdown">
								  	<button class="btn btn-default btn-city dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								   		Trier par
								    	<span class="caret caret-search"></span>
								  	</button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    <li><a href="#">Alphabétique</a></li>
									    <li><a href="#">Date</a></li>
									  </ul>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
							    <label class="col-md-3 control-label" for="rolename">Editeur</label>
							    <div class="col-md-5">
							        <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
							            <option value="cheese">Cheese</option>
							        </select>
							    </div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
							    <label class="col-md-3 control-label" for="rolename">Faille</label>
							    <div class="col-md-5">
							        <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
							            <option value="cheese">Cheese</option>
							        </select>
							    </div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="btn-group">
									<button type="button" class="btn btn-success btn-filter" data-target="open">Ouvert</button>
									<button type="button" class="btn btn-danger btn-filter" data-target="close">Fermé</button>
									<button type="button" class="btn btn-default btn-filter" data-target="all">Tous</button>
								</div>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr data-status="open">
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">Ouvert</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
											<td>
												<a href="javascript:;" class="star">
													<i class="glyphicon glyphicon-star"></i>
												</a>
											</td>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
<script type="text/javascript">
	$(function() {
	    $('.multiselect-ui').multiselect({
	        includeSelectAllOption: true
	    });
	});

	$(document).ready(function ()
	{
		$('.star').on('click', function () {
	      $(this).toggleClass('star-checked');
	    });

	    $('.ckbox label').on('click', function () {
	      $(this).parents('tr').toggleClass('selected');
	    });

	    $('.btn-filter').on('click', function () {
	      var $target = $(this).data('target');
	      if ($target != 'all') {
	        $('.table tr').css('display', 'none');
	        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
	      } else {
	        $('.table tr').css('display', 'none').fadeIn('slow');
	      }
	    });
	 });
</script>
</html>

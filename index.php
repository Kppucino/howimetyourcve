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
													<?php
															$listEditor = queryFetchWithoutValue($queryGetEditeur);

															for ($i=0; $i < sizeof($listEditor); $i++)
        											{
																	echo '<option value='.$listEditor[$i]["idEditeur"].'>'.$listEditor[$i]["nomEditeur"].'</option>';
															}
													 ?>
							        </select>
							    </div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
							    <label class="col-md-3 control-label" for="rolename">Faille</label>
							    <div class="col-md-5">
							        <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
												<?php
														$listFaille = queryFetchWithoutValue($queryGetFaille);

														for ($i=0; $i < sizeof($listFaille); $i++)
														{
																echo '<option value='.$listFaille[$i]["idFaille"].'>'.$listFaille[$i]["nomFaille"].'</option>';
														}
												 ?>
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
							<div class="col-md-1">
								<div class="btn-group">
									<button class="btn btn-default"><i class="glyphicon glyphicon-filter"></i></button>
								</div>
							</div>
						</div>

						<div class="table-container">
							<table class="table table-filter">
								<tbody>

									<?php
											$listCVE = queryFetchWithoutValue($queryGetAllCVEWithEditor);

											for ($i=0; $i < sizeof($listCVE); $i++)
											{
													if ($listCVE[$i]["statusCve"] == 1)
													{
															echo '<tr data-status="open">';
													}
													else
													{
															echo '<tr data-status="close">';
													}

													echo '<td>';
													echo '<div class="media">';

													if (isset($listCVE[$i]["logoEditeur"]))
													{
															echo '<a href="" class="pull-left">';
															echo '<img src="images/logoEditeur/'.$listCVE[$i]["logoEditeur"].'" class="media-photo">';
															echo '</a>';
													}

													echo '<div class="media-body">';
													echo '<span class="media-meta pull-right">'.$listCVE[$i]["dateCve"].'</span>';
													echo '<h4 class="title">';
													echo $listCVE[$i]["nomCve"];

													if ($listCVE[$i]["statusCve"] == 1)
													{
															echo '<span class="pull-right pagado">Ouvert</span>';
													}
													else
													{
															echo '<span class="pull-right cancelado">Fermé</span>';
													}

													echo '</h4>';
													echo '<p class="summary">'.substr($listCVE[$i]["descriptionCve"], 0, 100).'</p>';
													echo '</div>';
													echo '</div>';
													echo '<td>';
													echo '<a href="javascript:;" class="star">';
													echo '<i class="glyphicon glyphicon-star"></i>';
													echo '</a>';
													echo '</td>';
													echo '</td>';
													echo '</tr>';
											}
									 ?>
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

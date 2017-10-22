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
							<div class="col-md-3">
								<div class="form-group">
							    <label class="col-md-3 control-label" for="rolename">Editeur</label>
							    <div class="col-md-5">
							        <select id="listEditor" class="multiselect-ui form-control" multiple="multiple">
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
							        <select id="listFaille" class="multiselect-ui form-control" multiple="multiple">
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
								<div class="form-group">
							    <label class="col-md-3 control-label" for="rolename">Status</label>
							    <div class="col-md-5">
							        <select id="listStatus" class="multiselect-ui form-control">
												<option value="all">Toutes</option>
												<option value="open">Ouvertes</option>
												<option value="close">Fermées</option>
							        </select>
							    </div>
								</div>
							</div>
							<div class="col-md-offset-1 col-md-1">
								<div class="btn-group buttonFiltre">
									<button class="btn btn-default"><i class="glyphicon glyphicon-filter"></i></button>
								</div>
							</div>
						</div>

						<div class="table-container">
							<table class="table table-filter">
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

		$.ajax({
				url: "ajax.php",
				type : 'POST',
				data : "createTable=empty",

				success : function(result)
				{
						$('.table-filter').html(result);
				}
		});
	 });

	$('.buttonFiltre').on('click', function()
	{
	    if ($('select[id="listEditor"] > option:selected').val())
	    {
				var editeur = new Array();

				$('select[id="listEditor"] > option:selected').each(function()
				{
					editeur.push($(this).val());
				});
	    }

			if ($('select[id="listFaille"] > option:selected').val())
	    {
				var faille = new Array();

				$('select[id="listFaille"] > option:selected').each(function()
				{
					faille.push($(this).val());
				});
	    }

	    $.ajax({
	        url: "ajax.php",
	        type : 'POST',
	        data : {'createTable':1,'editeur':JSON.stringify(editeur),'faille':JSON.stringify(faille), 'status':$('select[id="listStatus"] > option:selected').val()},

	        success : function(result)
	        {
	            $('.table-filter').html(result);
	        }
	    });
	});
</script>
</html>

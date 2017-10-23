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
				<div class="statCVE">
				</div>
				<h2>Tags :</h2>
					<?php
						$editor = queryFetchWithoutValue($queryGetRandEditor);
						$faille = queryFetchWithoutValue($queryGetRandFaille);

						$compteurCSS = 0;

						for ($i=0; $i < sizeof($editor); $i++)
						{
							if ($compteurCSS == 0)
	            {
	                echo '<div class="row">';
	            }

							echo '<a href="editeur.php?idEditeur='.$editor[$i]["idEditeur"].'"><button type="button" class="btn btn-default btn-sm">'.$editor[$i]["nomEditeur"].'</button></a>';

							$compteurCSS ++;

	            if ($compteurCSS == 4)
	            {
	                echo '</div>';
	                $compteurCSS = 0;
	            }
						}

						for ($i=0; $i < sizeof($faille); $i++)
						{
							if ($compteurCSS == 0)
	            {
	                echo '<div class="row">';
	            }

							echo '<a href="faille.php?idFaille='.$faille[$i]["idFaille"].'"><button type="button" class="btn btn-default btn-sm">'.$faille[$i]["nomFaille"].'</button></a>';

							$compteurCSS ++;

	            if ($compteurCSS == 4)
	            {
	                echo '</div>';
	                $compteurCSS = 0;
	            }
						}

					?>
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
							<div class="col-md-1">
								<div class="buttonFiltre">
									<button class="btn btn-default"><i class="glyphicon glyphicon-filter"></i></button>
								</div>
							</div>
							<div class="row">
<<<<<<< HEAD
									<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button>
									<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button>
=======
									<input type="hidden" value="0" name="page"></input>
									<button class="btn btn-default previous"><i class="glyphicon glyphicon-chevron-left"></i></button>
									<button class="btn btn-default next"><i class="glyphicon glyphicon-chevron-right"></i></button>
>>>>>>> fe65f560a8840cb9f97d9fc609266772b782ef3f
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
		<?php
			include("footer.php");
		?>
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
						$('.previous').prop('disabled', true);
				}
		});

		$.ajax({
				url: "ajax.php",
				type : 'POST',
				data : "createStat=empty",

				success : function(result)
				{
						$('.statCVE').html(result);
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

							$.ajax({
					        url: "ajax.php",
					        type : 'POST',
					        data : {'createStat':1,'editeur':JSON.stringify(editeur),'faille':JSON.stringify(faille), 'status':$('select[id="listStatus"] > option:selected').val()},

					        success : function(result)
					        {
					            $('.statCVE').html(result);
					        }
					    });
	        }
	    });
	});

	$('.previous').on('click', function()
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
				data : {'createTable':1, 'previous': $('input[name="page"]').val(), 'editeur':JSON.stringify(editeur),'faille':JSON.stringify(faille), 'status':$('select[id="listStatus"] > option:selected').val()},

				success : function(result)
				{
						$('.table-filter').html(result);

						if ($('.table-filter >tbody >tr').length == 25)
						{
								if ($('input[name="page"]').val() == 0)
								{
										$('.previous').prop('disabled', true);
								}
								else
								{
									$('input[name="page"]').val(parseInt($('input[name="page"]').val())-1);
									$('.next').prop('disabled', false);
								}
						}
						else
						{
							$('.previous').prop('disabled', true);
						}
				}
		});
	});

	$('.next').on('click', function()
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
				data : {'createTable':1, 'next': $('input[name="page"]').val(), 'editeur':JSON.stringify(editeur),'faille':JSON.stringify(faille), 'status':$('select[id="listStatus"] > option:selected').val()},

				success : function(result)
				{
						$('.table-filter').html(result);

						if ($('.table-filter >tbody >tr').length == 25)
						{
							$('input[name="page"]').val(parseInt($('input[name="page"]').val())+1);
							$('.previous').prop('disabled', false);
							$('.next').prop('disabled', false);
						}
						else
						{
							$('.next').prop('disabled', true);
						}
				}
		});
	});
</script>
</html>

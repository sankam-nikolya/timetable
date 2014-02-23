<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.min.css">
	<style type="text/css">
		body {
            font-family: "Ubuntu", sans-serif;
        }
	</style>
	<script src="<?= base_url() ?>js/jquery.min.js"></script>
	<script type="text/javascript">
		
		function click_apply() {

			var select0 	= $("#select0").val();
			var cab0 		= $("#cab0").val();

			var select1 	= $("#select1").val();
			var cab1 		= $("#cab1").val();

			var select2 	= $("#select2").val();
			var cab2 		= $("#cab2").val();

			if (select0 != 0)
			{
				var gets = getURLParameters($(location).attr('href'));

				if (cab0 == 0)
					var data = {
			            iddays: gets['day'],
			            idgroups: gets['group'],
			            idlessons_time: gets['lt'],
			            idsubjects: select0,
			            type: 0
			        }; 
				else
					var data = {
			            iddays: gets['day'],
			            idgroups: gets['group'],
			            idlessons_time: gets['lt'],
			            idsubjects: select0,
			            idcabinets: cab0,
			            type: 0
			        }; 

		        db_update_binding(data);
			}
			else
			{
				if (select1 != 0)
				{
					
					var gets = getURLParameters($(location).attr('href'));

					if (cab1 == 0)
						var data = {
				            iddays: gets['day'],
				            idgroups: gets['group'],
				            idlessons_time: gets['lt'],
				            idsubjects: select1,
				            type: 1
				        }; 
			        else
			        	var data = {
				            iddays: gets['day'],
				            idgroups: gets['group'],
				            idlessons_time: gets['lt'],
				            idsubjects: select1,
				            idcabinets: cab1,
				            type: 1
				        }; 

			        db_update_binding(data);
				}
				if (select2 != 0)
				{
					var gets = getURLParameters($(location).attr('href'));

					if (cab2 == 0)
						var data = {
				            iddays: gets['day'],
				            idgroups: gets['group'],
				            idlessons_time: gets['lt'],
				            idsubjects: select2,
				            type: 2
				        }; 
				    else
				       	var data = {
				            iddays: gets['day'],
				            idgroups: gets['group'],
				            idlessons_time: gets['lt'],
				            idsubjects: select2,
				            idcabinets: cab2,
				            type: 2
				        }; 

			        db_update_binding(data);
				}
			}
			window.setTimeout(exit, 400)

		}

		function db_update_binding(data) {
	        $.ajax({
	            url: "<?= base_url() ?>index.php/admin_shedule/update_db_binding",
	            type: 'POST',
	            data: data,
	            success: function() {
	            	window.close();
	            }
	        });
		}


		function getURLParameters(url)
		{
		    var result = {};
			var searchIndex = url.indexOf("?");
			if (searchIndex == -1 ) return result;
		    var sPageURL = url.substring(searchIndex +1);
		    var sURLVariables = sPageURL.split('&');
		    for (var i = 0; i < sURLVariables.length; i++)
		    {    	
		        var sParameterName = sURLVariables[i].split('=');      
		        result[sParameterName[0]] = sParameterName[1];
		    }
		    return result;
		} 
	</script>
</head>
<body>
	<div class="well-sm">
		<table>
				<tr>
					<td>Общая пара</td>
					<td>
						<select id="select0">
							<option value="0"></option>
							<?php foreach ($subjects as $subject):?>
								<option 
								<?php foreach ($pars as $par):?>
									<?php if ($par['idsubects'] == $subject['id'] && $par['type'] == 0):?>selected <?php endif?>
								<?php endforeach?>
								value="<?=$subject['id']?>"><?=$subject['name']?></option>						
							<?php endforeach?>
						</select>
					</td>
					<td>
						<select id="cab0">
							<option value="0"></option>
							<?php foreach ($audits as $audit):?>
								<option 
								<?php foreach ($pars as $par):?>
									<?php if ($par['idcabinets'] == $audit['idcabinets'] && $par['type'] == 0):?>selected <?php endif?>
								<?php endforeach?>
								value="<?=$audit['idcabinets']?>"><?=$audit['name']?></option>						
							<?php endforeach?>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Первая подгруппа</td>
					<td>
						<select id="select1">
							<option value="0"></option>
							<?php foreach ($subjects as $subject):?>
								<option
								<?php foreach ($pars as $par):?>
									<?php if ($par['idsubects'] == $subject['id'] && $par['type'] == 1):?>selected <?php endif?>
								<?php endforeach?>
								value="<?=$subject['id']?>"><?=$subject['name']?></option>						
							<?php endforeach?>
						</select>
					</td>
					<td>
						<select id="cab1">
							<option value="0"></option>
							<?php foreach ($audits as $audit):?>
								<option 
								<?php foreach ($pars as $par):?>
									<?php if ($par['idcabinets'] == $audit['idcabinets'] && $par['type'] == 1):?>selected <?php endif?>
								<?php endforeach?>
								value="<?=$audit['idcabinets']?>"><?=$audit['name']?></option>						
							<?php endforeach?>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Вторая подгруппа</td>
					<td>
						<select id="select2">
							<option value="0"></option>
							<?php foreach ($subjects as $subject):?>
								<option 
								<?php foreach ($pars as $par):?>
									<?php if ($par['idsubects'] == $subject['id'] && $par['type'] == 2):?>selected <?php endif?>
								<?php endforeach?>
								value="<?=$subject['id']?>"><?=$subject['name']?></option>						
							<?php endforeach?>
						</select>
					</td>
					<td>
						<select id="cab2">
							<option value="0"></option>
							<?php foreach ($audits as $audit):?>
								<option 
								<?php foreach ($pars as $par):?>
									<?php if ($par['idcabinets'] == $audit['idcabinets'] && $par['type'] == 2):?>selected <?php endif?>
								<?php endforeach?>
								value="<?=$audit['idcabinets']?>"><?=$audit['name']?></option>						
							<?php endforeach?>
						</select>
					</td>
				</tr>	
			</table>
			<p style="padding-top:10px"><button class="btn btn-default btn-sm"  id="cancel" onclick="window.close();">Отмена</button> <button class="btn btn-primary btn-sm" id="apply" onclick="click_apply()">Принять</button></p>
			<script>
				$( "#select0" ).change(function() {
					if ( $( "#select0" ).val() != 0 )
					{
						$( "#select1" ).prop('disabled', true);
						$( "#cab1" ).prop('disabled', true);

						$( "#select2" ).prop('disabled', true);
						$( "#cab2" ).prop('disabled', true);
					}
					else
					{
						$( "#select1" ).prop('disabled', false);
						$( "#cab1" ).prop('disabled', false);

						$( "#select2" ).prop('disabled', false);
						$( "#cab2" ).prop('disabled', false);
					}
					
				});

				$( "#select1" ).change(function() {
					if ( $("#select1").val() != 0 || $("#select2").val() != 0 )
					{
						$( "#select0" ).prop('disabled', true);
						$( "#cab0" ).prop('disabled', true);
					}
					else 
					{
						$( "#select0" ).prop('disabled', false);
						$( "#cab0" ).prop('disabled', false);
					}

				});

				$( "#select2" ).change(function() {
					if ( $("#select2").val() != 0 || $("#select1").val() != 0 )
					{
						$( "#select0" ).prop('disabled', true);
						$( "#cab0" ).prop('disabled', true);
					}
					else
					{
						$( "#select0" ).prop('disabled', false);
						$( "#cab0" ).prop('disabled', false);
					}

				});
			</script>
	</div>
	
</body>
</html>
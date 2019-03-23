<!DOCTYPE html>
<html>
<head>
	<?php include('head.php') ?>
	<title>IMC</title>
</head>
<body>
	<?php include('nav.php') ?>
	<div class="container">
		<div class="card border-primary">
			<div class="card-header bg-transparent border-primary">
				<div align="left">
					INDICE DE MASA CORPORAL (IMC)
				</div>
				<div align="right">
					<a class="btn btn-primary" href="">Agregar</a>
				</div>
			</div>
			<div class="card-body text-dark">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<h5 class="card-title">Nivel 1</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
			<div class="card-footer bg-transparent border-primary" align="center">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item"><a class="page-link" href="#">Anterior</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- Table Markup -->
		<table id="showcase-example-1" class="table" data-paging="true" data-filtering="true" data-sorting="true" data-editing="true" data-state="true"></table>

		<!-- Editing Modal Markup -->
		<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
			<style scoped>
				/* provides a red astrix to denote required fields - this should be included in common stylesheet */
				.form-group.required .control-label:after {
					content:"*";
					color:red;
					margin-left: 4px;
				}
			</style>
			<div class="modal-dialog" role="document">
				<form class="modal-content form-horizontal" id="editor">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="editor-title">Add Row</h4>
					</div>
					<div class="modal-body">
						<input type="number" id="id" name="id" class="hidden"/>
						<div class="form-group required">
							<label for="firstName" class="col-sm-3 control-label">First Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
							</div>
						</div>
						<div class="form-group required">
							<label for="lastName" class="col-sm-3 control-label">Last Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="jobTitle" class="col-sm-3 control-label">Job Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title">
							</div>
						</div>
						<div class="form-group required">
							<label for="startedOn" class="col-sm-3 control-label">Started On</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" id="startedOn" name="startedOn" placeholder="Started On" required>
							</div>
						</div>
						<div class="form-group">
							<label for="dob" class="col-sm-3 control-label">Date of Birth</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-3 control-label">Status</label>
							<div class="col-sm-9">
								<select class="form-control" id="status" name="status">
									<option value="Active">Active</option>
									<option value="Disabled">Disabled</option>
									<option value="Suspended">Suspended</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
			<script type="text/javascript">
				jQuery(function($){
					var $modal = $('#editor-modal'),
					$editor = $('#editor'),
					$editorTitle = $('#editor-title'),
					ft = FooTable.init('#showcase-example-1', {
						columns: $.get("../../content/columns.json"),
						rows: $.get("../../content/rows.json"),
						editing: {
							addRow: function(){
								$modal.removeData('row');
								$editor[0].reset();
								$editorTitle.text('Add a new row');
								$modal.modal('show');
							},
							editRow: function(row){
								var values = row.val();
								$editor.find('#id').val(values.id);
								$editor.find('#firstName').val(values.firstName);
								$editor.find('#lastName').val(values.lastName);
								$editor.find('#jobTitle').val(values.jobTitle);
								$editor.find('#status').val(values.status);
								$editor.find('#startedOn').val(values.started.format('YYYY-MM-DD'));
								$editor.find('#dob').val(values.dob.format('YYYY-MM-DD'));
								$modal.data('row', row);
								$editorTitle.text('Edit row #' + values.id);
								$modal.modal('show');
							},
							deleteRow: function(row){
								if (confirm('Are you sure you want to delete the row?')){
									row.delete();
								}
							}
						}
					}),
					uid = 10001;

					$editor.on('submit', function(e){
						if (this.checkValidity && !this.checkValidity()) return;
						e.preventDefault();
						var row = $modal.data('row'),
						values = {
							id: $editor.find('#id').val(),
							firstName: $editor.find('#firstName').val(),
							lastName: $editor.find('#lastName').val(),
							jobTitle: $editor.find('#jobTitle').val(),
							started: moment($editor.find('#startedOn').val(), 'YYYY-MM-DD'),
							dob: moment($editor.find('#dob').val(), 'YYYY-MM-DD'),
							status: $editor.find('#status option:selected').val()
						};

						if (row instanceof FooTable.Row){
							row.val(values);
						} else {
							values.id = uid++;
							ft.rows.add(values);
						}
						$modal.modal('hide');
					});
				});
			</script>
			<h2>Responsive Table with FooTable</h2>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<table summary="This table shows how to create responsive tables using Footable's extended functionality" class="table table-bordered table-hover footable">
							<caption class="text-center">An example of a responsive table based on <a href="https://github.com/fooplugins/FooTable" target="_blank">FooTable</a>:</caption>
							<thead>
								<tr>
									<th>Country</th>
									<th data-hide="phone,tablet">Languages</th>
									<th data-hide="phone">Population</th>
									<th>Median Age</th>
									<th data-hide="phone">Area (Km²)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Argentina</td>
									<td>Spanish (official), English, Italian, German, French</td>
									<td>41,803,125</td>
									<td>31.3</td>
									<td>2,780,387</td>
								</tr>
								<tr>
									<td>Australia</td>
									<td>English 79%, native and other languages</td>
									<td>23,630,169</td>
									<td>37.3</td>
									<td>7,739,983</td>
								</tr>
								<tr>
									<td>Greece</td>
									<td>Greek 99% (official), English, French</td>
									<td>11,128,404</td>
									<td>43.2</td>
									<td>131,956</td>
								</tr>
								<tr>
									<td>Luxembourg</td>
									<td>Luxermbourgish (national) French, German (both administrative)</td>
									<td>536,761</td>
									<td>39.1</td>
									<td>2,586</td>
								</tr>
								<tr>
									<td>Russia</td>
									<td>Russian, others</td>
									<td>142,467,651</td>
									<td>38.4</td>
									<td>17,076,310</td>
								</tr>
								<tr>
									<td>Sweden</td>
									<td>Swedish, small Sami- and Finnish-speaking minorities</td>
									<td>9,631,261</td>
									<td>41.1</td>
									<td>449,954</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="5" class="text-center">Data retrieved from <a href="http://www.infoplease.com/ipa/A0855611.html" target="_blank">infoplease</a> and <a href="http://www.worldometers.info/world-population/population-by-country/" target="_blank">worldometers</a>.</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$('.footable').footable({
  calculateWidthOverride: function() {
    return { width: $(window).width() };
  }
}); 
			</script>
			<p class="p">Demo by George Martsoukos. <a href="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions" target="_blank">See article</a>.</p>
		</div>
	</div>
	<!--Script-->
	<script src="javascript/imc.js"></script>
	<?php include('script.php') ?>
</body>
</html>
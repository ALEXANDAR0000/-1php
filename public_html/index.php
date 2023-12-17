<!DOCTYPE html>
<html>

<head>
	<?php include_once("include/control.php");?>
	<!-- head -->
	<?php include("include/head.php"); ?>
	<?php include("include/load_css.php"); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

		<!-- Main content -->
		<section class="content">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<button type="button" id="btnAdd" class="btn btn-warning pull-left" style="margin-left:20px;margin-bottom:20px;"><i class="fa fa-plus-circle"></i> <?php echo _("Dodaj") ?></button>
						<button type="button" id="btnDelete" class="btn btn-danger" disabled style="margin-left:20px;margin-bottom:20px;"><i class="fa fa-times-circle-o"></i> <?php echo _("Obriši") ?></button>
						<button type="button" id="btnUpdate" class="btn  btn-danger pull-left" disabled style="margin-left:20px;margin-bottom:20px;"><i class="fa fa-pencil-square-o"></i> <?php echo _("Izmeni") ?></button>
						
                <a href="logout.php" style="margin-left:20px;margin-bottom:20px;" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i><?php echo _("Odjava") ?></a>
				<div class="pull-bottom" style="margin-left:20px;margin-bottom:20px;">
      <a href="locale.php?lang=en_US&link=<?php echo $_SERVER['PHP_SELF'];?>" style="color:#3c8dbc;"><?php echo $_SESSION["Language"]=='en_US '? 'display: none;':''?><?php echo (_("Engleski"));?></a>
      <a href="locale.php?lang=sr-Latn-RS&link=<?php echo $_SERVER['PHP_SELF'];?>" style="color:#3c8dbc;<?php echo $_SESSION["Language"]=='sr-Latn-RS '?' display: none;':''?>"><?php echo (_("Srpski"));?> </a>                 
    </div>
    
					
					<div class="row"></div>
					<table id="datatable-zahtevi" class="table table-bordered table-striped responsive" width=100%>
						<thead>
							<tr>
								<th class="all"> <?php echo (_("Red. br.")); ?> </th>
								<th class="all"><?php echo (_("ID")); ?></th>
								<th class="all">Datum rodjenja</th>
								<th class="all">Ime</th>
								<th class="all">Prezime</th>
								<th class="none">JMBG</th>
								<th class="none">Adresa</th>

							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<!-- ./box-body -->
			</div>
			<!-- ./box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- footer -->
	<?php include("include/footer.php"); ?>
	<!-- ./footer -->
	</div>



	<!-- Add new-->
	<div class="modal fade add-new-modal" id="add-new-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #3c8dbc !important; color: white;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">
						<i class="fa fa-plus-circle"></i>
						<?php echo _("Dodaj korisnika") ?>
					</h4>
				</div>
				<form class="form-horizontal form-label-left input_mask" id="form-add-new" action="#">
					<div class="modal-body">
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_first_name"><?php echo _("JMBG") ?> </label>
								<input type="tel" class="form-control" id="in_identification_number" name="in_identification_number" placeholder="<?php echo _("Unesite JMBG") ?>" required>
								<span class="fa fa-id-card form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_first_name"><?php echo _("Ime") ?> </label>
								<input type="tel" class="form-control" id="in_first_name" name="in_first_name" placeholder="<?php echo _("Unesite ime korisnika") ?>" required>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_last_name"><?php echo _("Prezime") ?> </label>
								<input type="tel" class="form-control" id="in_last_name" name="in_last_name" placeholder="<?php echo _("Unesite prezime korisnika") ?>" required>
								<span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_first_name"><?php echo _("Adresa") ?> </label>
								<input type="tel" class="form-control" id="in_address" name="in_address" placeholder="<?php echo _("Unesite adresu korisnika") ?>" required>
								<span class="fa fa-id-card form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_date"><?php echo _("Datum rodjenja") ?> </label>
								<input type="date" class="form-control" id="in_date" name="in_date" placeholder="<?php echo _("Unesite datum rodjenja korisnika") ?>" required>
								<span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
					</div>
				</form>

				<div class="modal-footer" style="background-color: #fff">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?php echo _("Odustani") ?> </button>
					<button type="submit" id="btnAddNewSubmit" class="btn btn-primary"> <?php echo _("Dodaj") ?> </button>
				</div>
			</div>
		</div>
	</div>
	<!-- .Add new-->

	<!-- Update-->

	<div class="modal fade update-modal" id="update-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #3c8dbc !important; color: white;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">
						<i class="fa fa-pencil-square-o"></i>
						<?php echo (_("Izmeni korisnika")); ?>
					</h4>
				</div>
				<form class="form-horizontal form-label-left input_mask" id="form-add-new" action="#">
					<div class="modal-body">
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_first_name"><?php echo _("JMBG") ?> </label>
								<input type="tel" class="form-control" id="identification_number" name="identification_number" placeholder="<?php echo _("Unesite JMBG") ?>" required>
								<span class="fa fa-id-card form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_first_name"><?php echo _("Ime") ?> </label>
								<input type="tel" class="form-control" id="first_name" name="first_name" placeholder="<?php echo _("Unesite ime korisnika") ?>" required>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_last_name"><?php echo _("Prezime") ?> </label>
								<input type="tel" class="form-control" id="last_name" name="last_name" placeholder="<?php echo _("Unesite prezime korisnika") ?>" required>
								<span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_first_name"><?php echo _("Adresa") ?> </label>
								<input type="tel" class="form-control" id="address" name="address" placeholder="<?php echo _("Unesite adresu korisnika") ?>" required>
								<span class="fa fa-id-card form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-sm-12 col-xs-12 has-feedback">
								<label for="in_date"><?php echo _("Datum rodjenja") ?> </label>
								<input type="date" class="form-control" id="date" name="date" placeholder="<?php echo _("Unesite datum rodjenja korisnika") ?>" required>
								<span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer" style="background-color: #fff">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?php echo _("Odustani") ?> </button>
					<button type="submit" id="btnUpdateSubmit" class="btn btn-primary"> <?php echo _("Izmeni") ?> </button>
				</div>
			</div>
		</div>
	</div>
	<!-- .Update-->

	<!-- load external js -->
	<?php include("include/load_js.php"); ?>

	<script>
		$(document).ready(function() {
			try {
				$('.loading-overlay').hide();
				if ($("#datatable-zahtevi").length == 0) {
					return;
				}
				table_zahtevi = $('#datatable-zahtevi').DataTable({
					paging: true,
					responsive: true,
					searching: true,
					ajax: {
						"dataType": 'json',
						"contentType": "application/json; charset=utf-8",
						"type": "POST",
						"url": "api/data/getKorisnici.php",
						dataSrc: ''
					},
					columnDefs: [{

							"targets": [6]
						},
						{
							visible: false,
							targets: [1]
						}
					],
					columns: [{
							data: "no"
						},
						{
							data: "id"
						},
						{
							data: "datum_rodjenja"
						},
						{
							data: "ime"
						},
						{
							data: "prezime"
						},
						{
							data: "jmbg"
						},
						{
							data: "adresa"
						}
					],
					language: {
						loadingRecords: "Učitavanje podataka je u toku...",
						infoEmpty: "",
						infoFiltered: "",
						decimal: ",",
						thousands: ".",
						sInfoFiltered: "Filtrirano od ukupno _MAX_ elemenata",
						sZeroRecords: "Nije pronađen nijedan rezultat",
						sLengthMenu: "Prikaži _MENU_",
						paginate: {
							first: 'Prva',
							previous: 'Prethodna',
							next: 'Sledeća',
							last: 'Poslednja'
						},
						aria: {
							paginate: {
								first: 'Prva',
								previous: 'Prethodna',
								next: 'Sledeća',
								last: 'Poslednja'
							}
						},
						search:"<?php echo _("Pretraga:")?>",
						info: "Prikaz _START_ do _END_ od _TOTAL_ zahteva",
						infoPostFix: "",
						buttons: {
							colvis: 'Izbor kolona',
							copy: 'Izvoz u Clipboard'
						}
					},
					lengthMenu: [
						[10, 25, 50, -1],
						['10', '25', '50', 'Prikaži sve']
					],


				});
				$('#datatable-zahtevi tbody').on('click', 'tr', function() {
					if ($(this).hasClass('selected')) {
						$(this).removeClass('selected');
					} else {
						table_zahtevi.$('tr.selected').removeClass('selected');
						$(this).addClass('selected');
					}
				});

				$('#datatable-zahtevi tbody').on('click', 'tr', function() {
					if (typeof(table_zahtevi.row('.selected').data()) != "undefined") {
						if (!table_zahtevi.row('.selected').data().is_file) {
							$('#btnDelete').removeAttr("disabled");
						} else {
							$('#btnDelete').prop("disabled", true);
						}
						if (!table_zahtevi.row('.selected').data().is_file) {
							$('#btnUpdate').removeAttr("disabled");
						} else {
							$('#btnUpdate').prop("disabled", true);
						}

					}
				});
				$('#btnUpdateSubmit').click(function() {
					var adresa = $(address).val();
					var datum_rodjenja = $(date).val();
					var ime = $(first_name).val();
					var prezime = $(last_name).val();
					var jmbg = $(identification_number).val();
					if (confirm("Da li ste sigurni da želite da izmjenite korisnika?")) {
						$.ajax({
							type: "POST",
							data: {
								id: table_zahtevi.row('.selected').data().id,
								datum_rodjenja: datum_rodjenja,
								ime: ime,
								prezime: prezime,
								jmbg: jmbg,
								adresa: adresa
							},

							url: "api/actions/actionUpdateKorisnika.php",
							beforeSend: function() {

							},
							success: function(data) {
								PNotify.removeAll();
								new PNotify({
									title: data.title,
									text: data.message,
									delay: 5000,
									type: 'success',
									styling: 'bootstrap3'
								});
								$('#update-modal').modal('hide');
								$('#datatable-zahtevi').DataTable().ajax.reload();
							},
							error: function(request, status, error) {
								var json_response = $.parseJSON(request.responseText);
								PNotify.removeAll();
								new PNotify({
									title: json_response.title,
									text: json_response.message,
									delay: 5000,
									type: 'error',
									styling: 'bootstrap3'
								});
							}
						});
					}
				});
				$('#btnAdd').click(function() {
					$('#add-new-modal').modal('show');
				});

				$('#btnUpdate').click(function() {
					$.ajax({
						type: "GET",
						data: {
							"id": table_zahtevi.row('.selected').data().id,
						},
						url: "api/data/getKorisnika.php",
						beforeSend: function() {

						},
						success: function(data) {
							data = JSON.parse(data);


							$('#update-modal').modal('show');
							$('#identification_number').val(data[0]["jmbg"]);
							$('#last_name').val(data[0]["prezime"]);
							$('#first_name').val(data[0]["ime"]);
							$('#address').val(data[0]["adresa"]);
							$('#date').val(data[0]["datum_rodjenja"]);
						},
						error: function(request, status, error) {

						}
					});

				});

				$('#btnDelete').click(function() {
					if (confirm("Da li ste sigurni da želite da obrišete zapis?")) {
						$.ajax({
							type: "POST",
							data: {
								"id": table_zahtevi.row('.selected').data().id,
							},
							url: "api/actions/actionDeleteKorisnika.php",
							beforeSend: function() {

							},
							success: function(data) {
								PNotify.removeAll();
								new PNotify({
									title: data.title,
									text: data.message,
									delay: 5000,
									type: 'success',
									styling: 'bootstrap3'
								});
								$('#datatable-zahtevi').DataTable().ajax.reload();
							},
							error: function(request, status, error) {
								PNotify.removeAll();
								var json_response = $.parseJSON(request.responseText);
								new PNotify({
									title: json_response.title,
									text: json_response.message,
									delay: 5000,
									type: 'error',
									styling: 'bootstrap3'
								});
							}
						});
					}
				});

				$('#btnAddNewSubmit').click(function() {
					var adresa = $(in_address).val();
					var datum_rodjenja = $(in_date).val();
					var ime = $(in_first_name).val();
					var prezime = $(in_last_name).val();
					var jmbg = $(in_identification_number).val();
					if (confirm("Da li ste sigurni da želite da dodate korisnika?")) {
						$.ajax({
							type: "POST",
							data: {
								datum_rodjenja: datum_rodjenja,
								ime: ime,
								prezime: prezime,
								jmbg: jmbg,
								adresa: adresa
							},
							url: "api/actions/actionAddKorisnika.php",
							beforeSend: function() {

							},
							success: function(data) {
								console.log("Usao u success");
								console.log(data)
								new PNotify({
									title: data.title,
									text: data.message,
									delay: 5000,
									type: 'success',
									styling: 'bootstrap3'
								});
								location.reload();
							},
							error: function(request, status, error) {
								console.log("Usao u error");
								var json_response = $.parseJSON(request.responseText);
								new PNotify({
									title: json_response.title,
									text: json_response.message,
									delay: 5000,
									type: 'error',
									styling: 'bootstrap3'
								});
							}
						});


					}

				});
			} catch (err) {
				alert(err.message);
			}
		});
	</script>
</body>

</html>
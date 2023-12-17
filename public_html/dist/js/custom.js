var filter_start_date;
var filter_end_date;

$(document).ready(function () {
	preparePeriodFilter();
});

function preparePeriodFilter() {
	try {
		$.ajax({
			type: "POST",
			async: true,
			data: {},
			url: "api/data/getFilterData.php",
			success: function (data) {
				filter_start_date = data.FILTER_START_DATE;
				filter_end_date = data.FILTER_END_DATE;
				init_daterangepicker();
			},
			error: function (request, status, error) {
				alert(request.error);
			}
		});
	} catch (err) {
		alert(err.message);
	}
}

function init_daterangepicker() {
	try {
		moment.locale('sr');
		if (typeof ($.fn.daterangepicker) === 'undefined') { return; }
		var cb = function (start, end, label) {
			$('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + end.format('DD.MM.YYYY'));
		};

		var optionSet1 = {

			startDate: filter_start_date,
			endDate: filter_end_date,
			minDate: '01.01.2017',
			maxDate: '31.12.2025',
			dateLimit: {
				days: 720
			},
			showDropdowns: false,
			showWeekNumbers: true,
			timePicker: false,
			timePickerIncrement: 1,
			timePicker12Hour: true,
			ranges: {
				'Danas': [moment().format("L"), moment().format("L")],
				'Juče': [moment().subtract(1, 'days').format("L"), moment().subtract(1, 'days').format("L")],
				'Poslednjih 7 dana': [moment().subtract(6, 'days').format("L"), moment().format("L")],
				'Poslednjih 30 dana': [moment().subtract(29, 'days').format("L"), moment().format("L")],
				'Tekući mesec': [moment().startOf('month').format("L"), moment().endOf('month').format("L")],
				'Prethodni mesec': [moment().subtract(1, 'month').startOf('month').format("L"), moment().subtract(1, 'month').endOf('month').format("L")],
				'Tekuća godina': [moment().startOf('year').format("L"), moment().endOf('month').format("L")],
				'Prethodna godina': [moment().subtract(1, 'year').startOf('year').format("L"), moment().subtract(1, 'year').endOf('year').format("L")],
				'Sve': [moment().subtract(3, 'years').startOf('year').format("L"), moment().format("L")]
			},
			opens: 'left',
			buttonClasses: ['btn btn-default'],
			applyClass: 'btn-small btn-primary',
			cancelClass: 'btn-small',
			format: 'DD.MM.YYYY',
			separator: ' do ',
			locale: {
				applyLabel: 'Potvrda',
				cancelLabel: 'Brisanje',
				fromLabel: 'Od',
				toLabel: 'Do',
				customRangeLabel: 'Željeni period',
				daysOfWeek: ['Ned', 'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'],
				monthNames: ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Jun', 'Jul', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'],
				firstDay: 1
			}
		};

		$('#reportrange span').html(filter_start_date + ' - ' + filter_end_date);
		$('#reportrange').daterangepicker(optionSet1, cb);

		$('#reportrange').on('show.daterangepicker', function () {

		});
		$('#reportrange').on('hide.daterangepicker', function () {

		});
		$('#reportrange').on('apply.daterangepicker', function (ev, picker) {

			prepareFilterForm();
		});

		$('#reportrange').on('cancel.daterangepicker', function (ev, picker) {

		});
		$('#options1').click(function () {
			$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
		});
		$('#options2').click(function () {
			$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
		});
		$('#destroy').click(function () {
			$('#reportrange').data('daterangepicker').remove();
		});



	} catch (err) {

		alert(err.message);

	}

}



function prepareFilterForm() {




	filter_start_date = $('#reportrange').data('daterangepicker').startDate.format('DD.MM.YYYY');
	filter_end_date = $('#reportrange').data('daterangepicker').endDate.format('DD.MM.YYYY');


	$.ajax({

		type: "POST",
		data: {
			FILTER_START_DATE: filter_start_date,
			FILTER_END_DATE: filter_end_date
		},
		url: "api/data/setFilterData.php",
		success: function (data) {

			try {


				filter_start_date = data.FILTER_START_DATE;
				filter_end_date = data.FILTER_END_DATE;


			} catch (err) {

				alert(err.message);
			}
		},
		error: function (data) {
			console.log(data); //error message
		}
	});
}
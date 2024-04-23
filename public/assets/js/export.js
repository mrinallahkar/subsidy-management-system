$(document).ready(function () {
	$("#dataExport").click(function () {
		var exportType = $(this).data('type');
		$('#dataTable').tableExport({
			type: exportType,
			escape: 'false',
			ignoreColumn: []
		});
	});
});


$(document).ready(function () {
	$("#btnExport").click(function (e) {
		let file = new Blob([$('#export').html()], { type: "application/vnd.ms-excel" });
		let url = URL.createObjectURL(file);
		let a = $("<a />", {
			href: url,
			download: $('.invoice-from span').text() + ".xls"
		}).appendTo("body").get(0).click();
		e.preventDefault();
	});
});
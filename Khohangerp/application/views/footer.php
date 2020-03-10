 
<!-- Bootstrap JS-->
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url() ?>assets/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/DataTables/datatables.min.js"></script>

<!-- Main JS-->
<script src="<?= base_url() ?>assets/js/main.js"></script>

<script type="text/javascript" charset="utf-8">
	$('.mytbl').DataTable();
</script>

<script type="text/javascript" charset="utf-8" async defer>
	function loadBody() {
		getNotification();
		setInterval(function () {
			getNotification();
		},10000);
		mainOnLoad();
	}

	function mainOnLoad() {
		try {
			    //bar chart
			    var ctx = document.getElementById("barChart");
			    if (ctx) {

			    	var path='<?= base_url() ?>';
			    	$.ajax({
			    		url: path+'Thongbao/get', 
			    		dataType: 'json',
			    		cache: false,
			    		contentType: false,
			    		processData: false,
			    		type: 'post',
			    		success: function (res) {
			    			var list=res[0].data;
			    			if (list.length!=0) 
			    			{
			    				$('#countItem').css('display', 'block');
			    				$('#countItem').html(list.length);
			    			}
			    			else
			    			{
			    				$('#countItem').css('display', 'none');
			    			}
			    			var content='';
			    			for (var i = list.length - 1; i >= 0; i--) {
			    				content+='<div class="notifi__item">';
			    				content+='<div class="bg-c1 img-cir img-40"><i class="zmdi zmdi-email-open"></i></div>';
			    				content+=' <div class="content">';
			    				content+='<p>'+list[i].content+'</p>';
			    				content+=' <span class="date">'+list[i].datetime+'</span>';
			    				content+='</div>';
			    				content+='</div>';
			    			}

			    			$('#listNotification').html('');
			    			$('#listNotification').html(content);

			    		}
			    	});
			    	
			    	ctx.height = 200;
			    	var myChart = new Chart(ctx, {
			    		type: 'bar',
			    		defaultFontFamily: 'Poppins',
			    		data: {
			    			labels: ["January", "February", "March", "April", "May", "June", "July"],
			    			datasets: [
			    			{
			    				label: "My First dataset",
			    				data: [65, 59, 80, 81, 56, 55, 40],
			    				borderColor: "rgba(0, 123, 255, 0.9)",
			    				borderWidth: "0",
			    				backgroundColor: "rgba(0, 123, 255, 0.5)",
			    				fontFamily: "Poppins"
			    			},
			    			{
			    				label: "My Second dataset",
			    				data: [28, 48, 40, 19, 86, 27, 90],
			    				borderColor: "rgba(0,0,0,0.09)",
			    				borderWidth: "0",
			    				backgroundColor: "rgba(0,0,0,0.07)",
			    				fontFamily: "Poppins"
			    			}
			    			]
			    		},
			    		options: {
			    			legend: {
			    				position: 'top',
			    				labels: {
			    					fontFamily: 'Poppins'
			    				}

			    			},
			    			scales: {
			    				xAxes: [{
			    					ticks: {
			    						fontFamily: "Poppins"

			    					}
			    				}],
			    				yAxes: [{
			    					ticks: {
			    						beginAtZero: true,
			    						fontFamily: "Poppins"
			    					}
			    				}]
			    			}
			    		}
			    	});
			    }


			} catch (error) {
				console.log(error);
			}

		}

		function getNotification() {
			var path='<?= base_url() ?>';
			$.ajax({
				url: path+'Thongbao/get', 
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				type: 'post',
				success: function (res) {
					var list=res[0].data;
					if (list.length!=0) 
					{
						$('#countItem').css('display', 'block');
						$('#countItem').html(list.length);
					}
					else
					{
						$('#countItem').css('display', 'none');
					}
					var content='';
					for (var i = list.length - 1; i >= 0; i--) {
						content+='<div class="notifi__item">';
						content+='<div class="bg-c1 img-cir img-40"><i class="zmdi zmdi-email-open"></i></div>';
						content+=' <div class="content">';
						content+='<p>'+list[i].content+'</p>';
						content+=' <span class="date">'+list[i].datetime+'</span>';
						content+='</div>';
						content+='</div>';
					}

					$('#listNotification').html('');
					$('#listNotification').html(content);

				}
			});
		}
	</script>


</body>

</html> 
<!-- Bootstrap JS-->
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url() ?>assets/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/DataTables/datatables.min.js"></script>

<!-- Main JS-->
<script src="<?= base_url() ?>assets/js/main.js"></script>

<script type="text/javascript" charset="utf-8">
	$('.mytbl').DataTable();
</script>

<script type="text/javascript" charset="utf-8" async defer>
	function loadBody() {
		getNotification();
		mainOnLoad();
		setInterval(function () {
			getNotification();
		},10000);
	}

	function mainOnLoad() {
		try {
			    //bar chart
			    var ctx = document.getElementById("barChart1");
			    if (ctx) {

			    	var path='<?= base_url() ?>';
			    	var listMonth=[];
			    	var listAmountInput=[]; 
			    	var listAmountOutput=[]; 

			    	var testMonthStr="";

			    	$.ajax({
			    		url: path+'Nhapkho/getDataChart', 
			    		dataType: 'json',
			    		cache: false,
			    		contentType: false,
			    		processData: false,
			    		type: 'post',
			    		success: function (res) {
			    			var listBase=res[0].data
			    			for (var i = 0; i < listBase.length; i++) {
			    				listMonth.push("Tháng "+listBase[i].thang);
			    				listAmountInput.push(listBase[i].sln);
			    				testMonthStr+=listBase[i].thang;
			    			}
			    		}
			    	});

			    	$.ajax({
			    		url: path+'Xuatkho/getDataChart', 
			    		dataType: 'json',
			    		cache: false,
			    		contentType: false,
			    		processData: false,
			    		type: 'post',
			    		success: function (res) {
			    			var listBase=res[0].data
			    			for (var i = 0; i < listBase.length; i++) {
			    				if (!testMonthStr.includes(listBase[i].thang)) 
			    				{
			    					listMonth.push("Tháng "+listBase[i].thang);
			    				}
			    				listAmountOutput.push(listBase[i].slx);
			    			}
			    		}
			    	});

			    	console.log(testMonthStr);

			    	ctx.height = 200;
			    	var myChart = new Chart(ctx, {
			    		type: 'bar',
			    		defaultFontFamily: 'Poppins',
			    		data: {
			    			labels: listMonth,
			    			datasets: [
			    			{
			    				label: "Số lượng nhập",
			    				data: listAmountInput,
			    				borderColor: "rgba(0, 123, 255, 0.9)",
			    				borderWidth: "0",
			    				backgroundColor: "rgba(0, 123, 255, 0.5)",
			    				fontFamily: "Poppins"
			    			},
			    			{
			    				label: "Số lượng xuất",
			    				data: listAmountOutput,
			    				borderColor: "rgba(0,0,0,0.09)",
			    				borderWidth: "0",
			    				backgroundColor: "rgba(0,0,0,0.07)",
			    				fontFamily: "Poppins"
			    			}
			    			]
			    		},
			    		options: {
			    			scales: {
			    				xAxes: [{
			    					ticks: {
			    						fontFamily: "Poppins"

			    					}
			    				}],
			    				yAxes: [{
			    					ticks: {
			    						beginAtZero: true,
			    						fontFamily: "Poppins"
			    					}
			    				}]
			    			}
			    		}
			    	});
			    }


			} catch (error) {
				console.log(error);
			}

		}

		function getNotification() {
			var path='<?= base_url() ?>';
			$.ajax({
				url: path+'Thongbao/get', 
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				type: 'post',
				success: function (res) {
					var list=res[0].data;
					if (list.length!=0) 
					{
						$('#countItem').css('display', 'block');
						$('#countItem').html(list.length);
					}
					else
					{
						$('#countItem').css('display', 'none');
					}
					var content='';
					for (var i = list.length - 1; i >= 0; i--) {
						content+='<div class="notifi__item">';
						content+='<div class="bg-c1 img-cir img-40"><i class="zmdi zmdi-email-open"></i></div>';
						content+=' <div class="content">';
						content+='<p>'+list[i].content+'</p>';
						content+=' <span class="date">'+list[i].datetime+'</span>';
						content+='</div>';
						content+='</div>';
					}

					$('#listNotification').html('');
					$('#listNotification').html(content);

				}
			});
		}
	</script>


</body>

</html>
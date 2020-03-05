 
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
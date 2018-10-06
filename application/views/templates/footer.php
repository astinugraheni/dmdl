    </section>
</div>
  <!-- /Main Content -->
<!-- 
  <footer class="main-footer" style="position:bottom; bottom:0; width:100%;">
    <strong>Copyright © 2018 - Project Child</strong> Template by AdminLTE.
  </footer> -->

  <!-- Script goes here -->
  
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/app.js') ;?>"></script>

  <script type="text/javascript" src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/chartjs/Chart.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/nicescroll/jquery.nicescroll.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/iCheck/icheck.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/fastclick/fastclick.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('plugins/select2/select2.min.js') ;?>"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/js/jszip.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/FileSaver.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-timepicker.min.js') ;?>"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/js/vs.js') ;?>"></script>

  <!--Chart-->
  <script type="text/javascript" src="<?php echo base_url('assets/js/Chart.js') ;?>"></script>  
  <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Decs"],
            datasets: [{
                label: '# of Presence',
                data: [<?php echo $presentJan;?>, <?php echo $presentFeb;?>, <?php echo $presentMar;?>, <?php echo $presentApr;?>, <?php echo $presentMay;?>,<?php echo $presentJune;?>,<?php echo $presentJuly;?>,<?php echo $presentAug;?>,<?php echo $presentSept;?>,<?php echo $presentOct;?>,<?php echo $presentNov;?>,<?php echo $presentDec;?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>

    <script>
    var ctx = document.getElementById("myChartAbsence");
    var myChartAbsence = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Decs"],
            datasets: [{
                label: '# of Absence',
                data: [<?php echo $absenceJan;?>, <?php echo $absenceFeb;?>, <?php echo $absenceMar;?>, <?php echo $absenceApr;?>, <?php echo $absenceMay;?>,<?php echo $absenceJune;?>,<?php echo $absenceJuly;?>,<?php echo $absenceAug;?>,<?php echo $absenceSept;?>,<?php echo $absenceOct;?>,<?php echo $absenceNov;?>,<?php echo $absenceDec;?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>
      <script>
    var ctx = document.getElementById("myChartCancelled");
    var myChartCancelled = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["DWP", "ILP", "SS", "SP"],
            datasets: [{
                label: '# of Class Cancelled',
                data: [<?php echo $cancelledDwp;?>, <?php echo $cancelledIlp;?>, <?php echo $cancelledSs;?>, <?php echo $cancelledSp;?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>

  <!--Select2 -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/select2.min.js') ;?>"></script>


</body>
</html>

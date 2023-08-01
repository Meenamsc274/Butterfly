<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
 
  <!-- Copyright -->
  <div class="copyright text-center p-4" >
   
    
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script type="text/javascript">
      $(document).ready(function() {

  


        updateConfig();

        function updateConfig() {
          var options = {};

            options.singleDatePicker = true;
          
       
            options.showDropdowns = true;

       
            options.showWeekNumbers = true;

        
            options.showISOWeekNumbers = true;

         
            options.timePicker = true;
          
        
            options.timePicker24Hour = true;

            options.timePickerIncrement = parseInt($('#timePickerIncrement').val(), 10);

            options.timePickerSeconds = true;
          
       
            options.autoApply = true;

         
            options.dateLimit = { days: 7 };

         
            options.ranges = {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            };
          

        
            options.locale = {
           
              format: 'MM/DD/YYYY HH:mm',
              separator: ' - ',
              applyLabel: 'Apply',
              cancelLabel: 'Cancel',
              fromLabel: 'From',
              toLabel: 'To',
              customRangeLabel: 'Custom',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              firstDay: 1
            };
         

            options.linkedCalendars = false;

         
            options.autoUpdateInput = false;

       
            options.showCustomRangeLabel = false;

            options.alwaysShowCalendars = true;

            options.parentEl = $('#parentEl').val();

          
            options.startDate = $('#startDate').val();

         
            options.endDate = $('#endDate').val();
      
            options.minDate = $('#minDate').val();

      
            options.maxDate = $('#maxDate').val();

       
            options.opens = $('#opens').val();

     
            options.drops = $('#drops').val();

         
            options.buttonClasses = $('#buttonClasses').val();

            options.applyClass = $('#applyClass').val();

        
            options.cancelClass = $('#cancelClass').val();

            $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#config1-demo').daterangepicker(options, function(start, end, label) {
            
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); 
          
          }).click();;
          
        }

        $('#config-demo').daterangepicker({
    "timePicker": true,
    "timePicker24Hour": true,
    "ranges": {
        "Today": [
            "2022-01-27T18:03:44.551Z",
            "2022-01-27T18:03:44.551Z"
        ],
        "Yesterday": [
            "2022-01-26T18:03:44.551Z",
            "2022-01-26T18:03:44.551Z"
        ],
        "Last 7 Days": [
            "2022-01-21T18:03:44.551Z",
            "2022-01-27T18:03:44.551Z"
        ],
        "Last 30 Days": [
            "2021-12-29T18:03:44.551Z",
            "2022-01-27T18:03:44.551Z"
        ],
        "This Month": [
            "2021-12-31T18:30:00.000Z",
            "2022-01-31T18:29:59.999Z"
        ],
        "Last Month": [
            "2021-11-30T18:30:00.000Z",
            "2021-12-31T18:29:59.999Z"
        ]
    },
    "startDate": "01/21/2022",
    "endDate": "01/27/2022"
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});

      });
      </script>
$(document).ready(function() {

    $('#datatable1').DataTable({

        'ajax'   : {
        'type'   : 'GET',
        'url'    : 'https://api-apollo.pegaxy.io/v1/earnings/historical/user/'+address,
        'dataSrc': function (data) {
            var return_data = new Array();
            var len = 1;
            for(var i=data.length-1; i>=0; i--){
                
                var count = data[i].ownRacedVis+data[i].renteeVisShare+data[i].renterVisShare;

                if(count != 0){
                    var id = i-(i-len);
                    len++;
                    var epoch = new Date(data[i].epoch*1000);
                    var date  = epoch.toLocaleDateString('en', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric',
                    });
                
                    return_data.push({
                        'id': id,
                        'date' : date,
                        'own_raced_vis'  : data[i].ownRacedVis,
                        'rentee_vis' : data[i].renteeVisShare,
                        'renter_vis' : data[i].renterVisShare,
                        'owner_vis' : data[i].ownRacedVis+data[i].renteeVisShare,
                        'total_vis' : data[i].ownRacedVis+data[i].renteeVisShare+data[i].renterVisShare
                    })
                }

            }
                return return_data;
            }
        },

        'columns': [
            {'data': 'id'},
            {'data': 'date'},
            {'data': 'own_raced_vis'},
            {'data': 'rentee_vis'},
            {'data': 'renter_vis'},
            {'data': 'owner_vis'},
            {'data': 'total_vis'}
        ],

        dom: '<"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',

        buttons: [
            {
                extend: 'copy',
                titleAttr: 'Copy'
            },
            {
                extend: 'excelHtml5',
                text: 'Excel'
            },
            {
                extend: 'pdf',
                text: 'Pdf'
            },
            {
                extend: 'csvHtml5',
                text: 'CSV'
            },
            {
                extend: 'print',
                text: 'Print'
            },
            {
                extend: 'colvisGroup',
                text: 'Own Raced VIS',
                show: [ 1, 3, 4 , 5, 6],
                hide: [2]
            },
            {
                extend: 'colvisGroup',
                text: 'Rentee VIS',
                show: [ 1, 2 ,4 , 5, 6],
                hide: [3]
            },
            {
                extend: 'colvisGroup',
                text: 'Renter VIS',
                show: [ 1, 2 ,3, 5, 6],
                hide: [4]
            },
            {
                extend: 'colvisGroup',
                text: 'Owner VIS',
                show: [ 1, 2 ,3, 4, 6],
                hide: [5]
            },
            {
                extend: 'colvisGroup',
                text: 'Show all',
                show: ':hidden'
            }

        ],

        columnDefs: [
            { 
                targets: [], 
                visible: false 
            }
        ],

        lengthChange: !1, 
        lengthChange: true,
        scrollX: true,
        searching: true

    });
    
	$('.btn-copy').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '0' ).trigger();
    });
    
    $('.btn-excel').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '1' ).trigger();
    });
    
    $('.btn-pdf').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '2' ).trigger();
    });
    
    $('.btn-csv').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '3' ).trigger();
    });

    $('.btn-print').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '4' ).trigger();
    });

    $('.btn-ownracedvis').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '5' ).trigger();
    });

    $('.btn-renteevis').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '6' ).trigger();
    });

    $('.btn-rentervis').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '7' ).trigger();
    });

    $('.btn-ownervis').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '8' ).trigger();
    });

    $('.btn-showall').on('click',function(){
        var table = $('#datatable1').DataTable();
        table.button( '9' ).trigger();
    });        

});


$(document).ready(function() {
    var dataTable = $('#datatable1').dataTable();
    $("#searchbox").keyup(function() {
        dataTable.fnFilter(this.value);
    });    
});

$(document).ready(function() {
 var dataTable = $("#datatable1").DataTable();

 minDateFilter = "";
 maxDateFilter = "";

 $("#daterange").daterangepicker();
 $("#daterange").on("apply.daterangepicker", function(ev, picker) {
  minDateFilter = Date.parse(picker.startDate);
  maxDateFilter = Date.parse(picker.endDate);

  $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
  var date = Date.parse(data[1]);

  if (
   (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
   (isNaN(minDateFilter) && date <= maxDateFilter) ||
   (minDateFilter <= date && isNaN(maxDateFilter)) ||
   (minDateFilter <= date && date <= maxDateFilter)
  ) {
   return true;
  }
  return false;
 });
 dataTable.draw();
}); 

});
 
 

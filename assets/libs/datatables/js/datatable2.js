$(document).ready(function () {

    var return_data = new Array();

    $.ajax({
        url: "https://api-apollo.pegaxy.io/v1/pegas/owner/user/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A", 
        success: function (data) {
            for (i = 0; i < data.length; i++) {
                
                id = data[i].id;
                name = data[i].name;

                var url1 = 'https://api-apollo.pegaxy.io/v1/game-api/pega/' + id;
                var url2 = 'https://api-apollo.pegaxy.io/v1/game-api/race/history/pega/' + id;

                $.when($.getJSON(url1), $.getJSON(url2)).done(function (data1, data2) {
                    id = data1[0].pega.id;
                    name = data1[0].pega.name;

                    var gold = 0, silver = 0, bronze = 0, total = 0, races = 0;

                    for (j = 0; j < data2[0].data.length; j++) {

                        var today = new Date();
                        var yesterday = new Date(today);
                        yesterday.setDate(today.getDate() - 1);
                        today = today.toLocaleDateString();
                        yesterday = yesterday.toLocaleDateString();

                        var raced_date = moment(data2[0].data[j].updatedAt, 'YYYY-MM-DD').format('DD/MM/YYYY');    
                        var position = data2[0].data[j].position;
                        var reward = data2[0].data[j].reward;

                        if (raced_date == yesterday) {
                            races++;
                            if (position == 1) {
                                gold++;
                            } else if (position == 2) {
                                silver++;
                            } else if (position == 3) {
                                bronze++;
                            }
                            total += reward;
                        }

                    }

                    return_data.push({
                        'Name': name,
                        'Races': races,
                        'Gold': gold,
                        'Silver': silver,
                        'Bronze': bronze,
                        'Total': total
                    });
                
                    if (return_data.length === data.length) {
                        $('#datatable2').DataTable({

                            'data': return_data,

                            'columns': [
                                { 'data': 'Name' },
                                { 'data': 'Races' },
                                { 'data': 'Gold' },
                                { 'data': 'Silver' },
                                { 'data': 'Bronze' },
                                { 'data': 'Total' }
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
                                    show: [ 0, 3, 4 , 5, 6],
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
                            searching: true,
                            ordering: false,

                            language:{
                                "emptyTable":     "No Pegas available in Wallet",
                                "info":           "Showing _START_ to _END_ of _TOTAL_ Pegas",
                                "infoEmpty":      "Showing 0 to 0 of 0 Pegas",
                                "infoFiltered":   "(filtered from _MAX_ total Pegas)",
                                "lengthMenu":     "Show _MENU_ Pegas",
                                "zeroRecords":    "No matching Pegas found",
                            }

                        }); 
                    }

                });

            }
        }
    });

    $('.btn-copy').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '0' ).trigger();
    });
    
    $('.btn-excel').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '1' ).trigger();
    });
    
    $('.btn-pdf').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '2' ).trigger();
    });
    
    $('.btn-csv').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '3' ).trigger();
    });

    $('.btn-print').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '4' ).trigger();
    });

    $('.btn-ownracedvis').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '5' ).trigger();
    });

    $('.btn-renteevis').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '6' ).trigger();
    });

    $('.btn-rentervis').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '7' ).trigger();
    });

    $('.btn-ownervis').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '8' ).trigger();
    });

    $('.btn-showall').on('click',function(){
        var table = $('#datatable2').DataTable();
        table.button( '9' ).trigger();
    });

    $('#searchbox2').keyup(function(){
        var table = $('#datatable2').DataTable();
        table.search($(this).val()).draw();
    });

});
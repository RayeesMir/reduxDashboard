@extends('dashboard.app')
@section('other_style')
   <link href="{!! URL::asset('assets/css/fresh-bootstrap-table.css') !!}" rel="stylesheet" />
   <link href="{!! URL::asset('css/bootstrap-table.min.css') !!}" rel="stylesheet">
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop

@section('maincontent')
<div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default fresh-table">
                    <div class="panel-heading">Registered Users</div>
                    <div class="panel-body fresh-table full-screen-table">
                     
                        <table id="fresh-table" class="table" data-toggle="table"  
                        data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                        data-url="ListOfusers" data-search="true" 
                        data-select-item-name="toolbar1" data-pagination="false"  
                        data-sort-name="uid" data-sort-order="asc" 
                        >
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true" >ID</th>
                                <th data-field="uid" data-sortable="true" data-sorter="starsSorter">ID</th>
                                <th data-field="name" data-sortable="true">User Name</th>
                                <th data-field="field_full_name_value" data-sortable="true">Name</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="mail"  data-sortable="true">Email ID</th>
                                <th data-field="field_phone_no_value" data-sortable="true">Phone</th>
                                <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>                     
                        </table>
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-md" id="btn-send-email">Send Email</button>
                            <button class="btn btn-primary btn-md" id="btn-send-message">Send Message</button>

                        </span>
                         <span class="input-group-btn">
                        </span>
        
                    </div>
                </div>
            </div>
        </div><!--/.row-->  


@stop

/@section('other_scripts')
      <script type="text/javascript"> 
        function starsSorter(a, b) {
            return a - b;
        } 

        $("#btn-send-email").click(function() {
            alert("working");

            $users = $table.bootstrapTable('getSelections');
            console.log($users);
            var mails = [];
            for (var i = 0; i < $users.length; i++) {
               mails[i] = $users[i].mail;
            }
           // console.log(mails);
           $.ajax({
                type: 'POST',
                url : 'sendmail',                 
                data : {
                     mail : mails,
                 },
                 success : function(data) {                 
                    alert(data);
                  }
                });
        });
        $(function () {
            $('#hover, #striped, #condensed').click(function () {
                var classes = 'table';
                        
                    if ($('#hover').prop('checked')) {
                                        classes += ' table-hover';
                                    }
                                    if ($('#condensed').prop('checked')) {
                                        classes += ' table-condensed';
                                    }
                                    $('#table-style').bootstrapTable('destroy')
                                        .bootstrapTable({
                                            classes: classes,
                                            striped: $('#striped').prop('checked')
                                        });
                                });
                            });
                        
                            function rowStyle(row, index) {
                                var classes = ['active', 'success', 'info', 'warning', 'danger'];
                        
                                if (index % 2 === 0 && index / 2 < classes.length) {
                                    return {
                                        classes: classes[index / 2]
                                    };
                                }
                                return {};
                            }

                           var $table = $('#fresh-table'),
                           $alertBtn = $('#alertBtn'), 
                           full_screen = true,
                            window_height;
            
        $().ready(function() {
            
            window_height = $(window).height();
            table_height = window_height - 20;
            
            
            $table.bootstrapTable({
                toolbar: ".toolbar",

                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                striped: true,
                sortable: true,
                height: table_height,
                pageSize: 25,
                pageList: [25,50,100],
                
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
            
            window.operateEvents = {
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
            

            
            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });  

          
        });
        

        function operateFormatter(value, row, index) {
            return [
               
                '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                    '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                    '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }

      
       
    </script>
@stop
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
                        data-url="selectedMails" data-search="true" 
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
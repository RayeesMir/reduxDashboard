@extends('dashboard.app')
@section('maincontent')	
	<div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default fresh-table">
                    <div class="panel-heading">SMS DETAILS</div>
                    <div class="panel-body fresh-table full-screen-table">
                     
                        <table 	id="fresh-table" class="table" data-toggle="table"  
		                        data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		                        data-url="getSentSmsResponse" data-search="true" 
		                        data-select-item-name="toolbar1" data-pagination="true"  
		                        data-sort-name="uid" data-sort-order="desc" 
		                        data-page-list="[10, 25, 50, 100]" page-size= 50  data-detail-view="true"
		                        data-detail-formatter="detailFormatter"                    
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

	                                 <th data-field="sent_sms_status" data-sortable="true">SMS Status</th>
	                           </tr>

                            </thead>
                            <tbody>
                              
                            </tbody>                     
                        </table>
                      
        
                    </div>
                </div>
            </div>
        </div><!--/.row-->  


@stop
@extends('dashboard.app')
@section('other_style')
	<link href="{!! URL::asset('assets/css/fresh-bootstrap-table.css') !!}" rel="stylesheet" />
  	<link href="{!! URL::asset('css/bootstrap-table.css') !!}" rel="stylesheet">
@stop
@section('maincontent')	   
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">All Orders</div>
					<div class="panel-body">
						<table data-toggle="table" id="fresh-table" class="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-url="http://192.168.0.169:8888/api/getAllOrders" data-search="true" data-select-item-name="toolbar1" data-pagination="false"  data-sort-name="timestamp" data-sort-order="desc" 
						>
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="true" >ID</th>
						        <th data-field="id" data-sortable="true" data-sorter='starsSorter'>ID</th>
						        <th data-field="order_id" data-sortable="true">Order ID</th>
						        <th data-field="mail" data-sortable="true">Email ID</th>
						        <th data-field="total" data-sortable="true" data-sorter="starsSorter">Amount(Rs)</th>
						        <th data-field="timestamp"  data-sortable="true">Placed At</th>
						        <th data-field="payment_mode"  data-sortable="true">Payment Mode</th>
						        <th data-field="delivery_status" data-sortable="true">Order Status</th>
						    </tr>
						    </thead>
						    <tbody>
						    	@for($i=0;$i<74;$i++)
							    	<tr>
							    		<td></td>
							    	</tr>
						        @endfor
						        
						    </tbody>					 
						</table>
						<script type="text/javascript">

                            function starsSorter(a, b) {
                             return a - b;
                             } 

                        

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
						</script>
					</div>
				</div>
			</div>
		</div>
@stop


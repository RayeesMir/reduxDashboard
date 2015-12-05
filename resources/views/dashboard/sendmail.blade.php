@extends('dashboard.app')
@section('other_style')
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="{!! URL::asset('css/style.css') !!}" rel="stylesheet">

@stop

@section('maincontent')
<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">Send Emails</div>
                <div class="panel-body">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-xs-12">
                                       <div class="input-group email">
                                         <label>Subject of the Email</label>
                                         <textarea class="form-control" rows="3"></textarea>
                                        </div><!--Subject-->
                                        <div class="input-group email">
                                          <label>Body of the Email</label>
                                          <textarea class="form-control" rows="5"></textarea>
                                        </div><!--Body-->
                                    </div>
                                   
                                </div>
                            </div><!--Div for email form-->

                            <div class="col-lg-4">
                                  <div class="panel panel-default">
                                  <div class="panel-heading">Email Templates</div>
                                  <div class="panel-body">
                                      
                                  </div><!--Email Panel Body-->
                                  </div><!--Email Panel -->                        
                            </div><!--Email Template-->
                     </div><!--Panel Body-->
                </div><!--Panel-->

                <div class="panel panel-default">
                <div class="panel-heading">This is only for testing purpose.</div>
                <div class="panel-body">
                    <!--  <ol>
                         @for ($i = 0; $i < count($mails); $i++)
                            <li>The current value is {{ $i }}</li>
                         @endfor

                     </ol> -->
                     <p id="test"></p>
                   </div> 
                </div><!--Test div for checking the email Id's-->
        </div><!--/.row-->  
@stop
@section('other_scripts')
<script type="text/javascript">
  alert("on send mail page");
    $('#test').html('{{ $mails or 'Default' }}');
</script>
@stop
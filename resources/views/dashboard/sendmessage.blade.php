@extends('dashboard.app')
@section('other_style')
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="{!! URL::asset('css/style.css') !!}" rel="stylesheet">

@stop

@section('maincontent')
<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">Send Message</div>
                <div class="panel-body">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-xs-12">
                                       
                                        <div class="input-group email">
                                          <label>Message to be sent</label>
                                          <textarea class="form-control" rows="5"></textarea>
                                        </div><!--Body-->
                                        <div class="input-group-btn">
                                          <button class="btn btn-success btn-md" id="email-send">Send Message</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div><!--Div for email form-->

                            <div class="col-lg-4">
                                  <div class="panel panel-default">
                                  <div class="panel-heading">Message Templates</div>
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
                         @for ($i = 0; $i < count($mobile); $i++)
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
  var users=decodeURIComponent('{{$mobile}}')
    $('#test').html(users);

     $("#email-send").click(function() {
          alert('Hey');
          $('<form action=messagestatus method=POST><input type=hidden name=_token value={{ csrf_token() }}></form>').submit();
        });
</script>
@stop
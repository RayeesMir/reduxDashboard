@extends('dashboard.app')
@section('other_style')
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link href="{!! URL::asset('css/styles.css') !!}" rel="stylesheet">
<link href="{!! URL::asset('css/sweetalert.css') !!}" rel="stylesheet">
<script src="{!! URL::asset('js/sweetalert.min.js') !!}"></script> 
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@stop

@section('maincontent')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Send Message</div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-lg-3 col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="first-name">First Name
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="last-name">Last Name</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="email-id">Email ID</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="mobile">Mobile Number</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="input-group email">
                                    <label>Message to be sent</label>
                                    <textarea class="form-control" rows="5" id="sms"></textarea>
                                    <label class="pull-right" id="character-count">Charcters:000</label>
                                </div>
                                <!--Body-->
                                <div class="input-group-btn">
                                    <ul>
                                        <li></li>
                                    </ul>

                                    <button class="btn btn-success btn-md" id="sms-send">Send Message</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!--Div for email form-->

                
                <!--Email Template-->
                <button class="btn btn-default btn-success pull-right" id="createTemplate" data-toggle="modal" data-target="#smsTemplateModal"> Create SMS Template </button>
            </div>
            <!--Panel Body-->

        </div>
        <!--Panel-->
        <!-- Create SMS Template Modal -->
        <div class="modal fade" id="smsTemplateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="close=></button> -->
                       <h3 class="modal-title" style="text-align: center;">Create SMS Template </h3>
                   </div>
                   <div class="modal-body">
                    <div class="form-group" id="smsTemplateTitleParent">
                        <input class="form-control" id="smsTemplateTitle" placeholder="Enter the title for the Template."></input>
                    </div>
                    <div class="template-builder">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                            <button type="button" class="btn btn-default" id="first-name-modal">First Name
                            </button>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                            <button type="button" class="btn btn-default" id="last-name-modal">Last Name</button>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                            <button type="button" class="btn btn-default" id="email-id-modal">Email ID</button>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                            <button type="button" class="btn btn-default" id="mobile-modal">Mobile Number</button>

                        </div>
                    </div>
                    
                    <div class="form-group" id="smsTemplateParent">
                        <textarea class="form-control" rows="5" id="smsTemplateText"></textarea>
                        <label class="pull-right" id="character-count-modal">Charcters:000</label>

                    </textarea>

                </div>
            </div>                      
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeModal"> Close </button>
                <button type="button" class="btn btn-primary" id="saveSmsTemplate"> Save Template </button>
            </div>
        </div>
    </div>
</div>
<!-- Create SMS Template Modal -->

<div class="panel panel-default">
    <div class="panel-heading">Message Templates</div>

    <div class="panel-body templates" id="smsTemplatePanel">
        <ul>
            <li style="display: block;">
                <div class="panel panel-blue">
                    <div class="panel-body">

                    </div>
                </div>
            </li>
            <li style="display: block;">
                <div class="panel panel-red">
                    <div class="panel-body">
                        <p>Photo Prints 2</p>
                    </div>
                </div>
            </li>
            <li style="display: block;">
                <div class="panel panel-orange">
                    <div class="panel-body">
                        <p>Photo Prints 3</p>
                    </div>
                </div>
            </li>
            <li style="display: block;" href="#">
                <div class="panel panel-teal">
                    <div class="panel-body">
                        <p>Photo Prints 4</p>
                    </div>
                </div>
            </li>
            <li style="display: block;" href="#">
                <div class="panel panel-teal">
                    <div class="panel-body">
                        <p>Photo Prints 4</p>
                    </div>
                </div>
            </li>
            <li style="display: block;" href="#">
                <div class="panel panel-teal">
                    <div class="panel-body">
                        <p>Photo Prints 4</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!--Email Panel Body-->
</div>
<!--Email Panel -->
</div>
</div><!--Template-->

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
         </div>
         <!--Test div for checking the email Id's-->
     </div>
     <!--/.row-->
 </div>
 @stop
 @section('other_scripts')
 <script type="text/javascript">
    var toggle = 0; 
    var users = decodeURIComponent('{{$mobile}}')
    var text = $('#sms');
    $('#test').html(users);

    $("#sms-send").click(function () {

        $('<form action=messagestatus method=POST><input type=hidden name=_token value={{ csrf_token() }}><input type=hidden name=messages value=' + encodeURIComponent(users) + '><input name=sms value=' + encodeURIComponent($("#sms").val()) + '></form>').submit();

    });

    $("#saveSmsTemplate").click(function(){

       var smsTemplateText=$.trim($("#smsTemplateText").val());
       var smsTemplateTitle = $.trim($("#smsTemplateTitle").val());

       if(smsTemplateTitle.length == 0) {
        $("#smsTemplateTitleParent").addClass("has-error");
        $("#smsTemplateTitle").attr("placeholder","The body field cannot be empty.");
    } else {
      $("#smsTemplateTitleParent").removeClass("has-error");
  }

  if(smsTemplateText.length == 0 ){
      $("#smsTemplateParent").addClass("has-error");
      $("#smsTemplateText").attr("placeholder","The title cannot be empty.");
  } else {
      $("#smsTemplateParent").removeClass("has-error");
  }

  var sms = [];
  sms["title"] = smsTemplateTitle;
  sms["content"] = smsTemplateText;

  console.log(JSON.parse(sms));
  // sms["createdBy"] = 
  $.ajax({
    method : "POST",
    url: "createSmstemplate",
    data:{'smstemplate':sms
    // 'title' : smsTemplateTitleParent
},
success: function(result)
{
    result=JSON.stringify(result);
    e=result.smstemplate;

    console.log(result);
                            // alert(e);
                            // result=;
                            // console.log(JSON.parse(result['smstemplate'][0]));
                       // console.log(result['smstemplate']['smstemplate']);

                          // var html="<li style=display:block; href=#><div class=panel panel-teal><div class=panel-body><p>Photo Prints 4</p></div></div></li>" 
                         // $("#smsTemplatePanel").append(html);
                     }
                 }); 

        // swal({   title: "Error!",   text: smsTemplateText=$.trim($("#smsTemplateText").val()),   type: "error",   confirmButtonText: "Cool" });
    });

$('#createTemplate').click(function(){
 toggle = 1;

});  
$("#closeModal").click(function(){
 toggle = 0;

})


$('#first-name,#first-name-modal ').click(function () {

    var newCharCnt
    if (toggle)
    {
        $('#smsTemplateText').val($('#smsTemplateText').val() + ' {% First Name %}');
        newCharCnt=$('#smsTemplateText').val().length;
        $('#character-count-modal').html('Charcters:' + newCharCnt);
    } 
    else
    {
        text.val(text.val() + ' {% First Name %}');
        newCharCnt = text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);

    }  
});

$('#last-name,#last-name-modal').click(function () {
    var newCharCnt;
    if (toggle) 
    {
        $('#smsTemplateText').val($('#smsTemplateText').val() + ' {% Last Name %}');
        newCharCnt=$('#smsTemplateText').val().length;
        $('#character-count-modal').html('Charcters:' + newCharCnt);
    }
    else
    {
        text.val(text.val() + ' {% Last Name %}');
        newCharCnt=text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);
    }      

});

$('#email-id,#email-id-modal').click(function () {

    var newCharCnt
    if (toggle)
    {
        $('#smsTemplateText').val($('#smsTemplateText').val() + ' {% Email ID %}');
        newCharCnt=$('#smsTemplateText').val().length;
        $('#character-count-modal').html('Charcters:' + newCharCnt);
    } 
    else
    {
        text.val(text.val() + ' {% Email ID %}');
        newCharCnt = text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);

    }

});

$('#mobile,#mobile-modal').click(function () {

    var newCharCnt
    if (toggle)
    {
        $('#smsTemplateText').val($('#smsTemplateText').val() + ' {% Mobile Number %}');
        newCharCnt=$('#smsTemplateText').val().length;
        $('#character-count-modal').html('Charcters:' + newCharCnt);
    } 
    else
    {
     text.val(text.val() + ' {% Mobile Number %}');
     newCharCnt = text.val().length;
     $('#character-count').html('Charcters:' + newCharCnt);

 }

});

(function ($, undefined) {
    $.fn.getCursorPosition = function () {
        var el = $(this).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }
})(jQuery);

$("#sms").on("input", function () {
    $('#character-count').html('Charcters:' + text.val().length);
});

$("#smsTemplateText").on("input", function () {
    $('#character-count-modal').html('Charcters:' + $('#smsTemplateText').val().length);
});    

    // function setSelectionRange(input, selectionStart, selectionEnd) {
    //   if (input.setSelectionRange) {
    //     input.focus();
    //     input.setSelectionRange(selectionStart, selectionEnd);
    //   }
    //   else if (input.createTextRange) {
    //     var range = input.createTextRange();
    //     range.collapse(true);
    //     range.moveEnd('character', selectionEnd);
    //     range.moveStart('character', selectionStart);
    //     range.select();
    //   }
    // }

    // function setCaretToPos (input, pos) {
    //   setSelectionRange(input, pos, pos);
    // }

</script>
@stop
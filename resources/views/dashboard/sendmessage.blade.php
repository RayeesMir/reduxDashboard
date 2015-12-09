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
                            <div class="col-lg-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="first-name">First Name
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="last-name">Last Name</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-default" id="email-id">Email ID</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
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

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Message Templates</div>
                        <div class="templates panel-body">
                            <ul>
                                <li style="display: block;">
                                    <div class="panel panel-blue">
                                        <div class="panel-body">
                                            <p>Photo Prints 1</p>
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
                            </ul>
                        </div>
                        <!--Email Panel Body-->
                    </div>
                    <!--Email Panel -->
                </div>
                <!--Email Template-->
            </div>
            <!--Panel Body-->
        </div>
        <!--Panel-->

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
    // alert("on send messages page");
    var users = decodeURIComponent('{{$mobile}}')
    var text = $('#sms');
    $('#test').html(users);

    $("#sms-send").click(function () {

        $('<form action=messagestatus method=POST><input type=hidden name=_token value={{ csrf_token() }}><input type=hidden name=messages value=' + encodeURIComponent(users) + '><input name=sms value=' + encodeURIComponent($("#sms").val()) + '></form>').submit();

    });

    $('#first-name').click(function () {

        text.val(text.val() + ' {% First Name %}');
        var newCharCnt = text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);

    });

    $('#last-name').click(function () {
        text.val(text.val() + ' {% Last Name %}');
        var newCharCnt = text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);

    });

    $('#email-id').click(function () {
        text.val(text.val() + ' {% Email ID %}');
        var newCharCnt = text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);

    });

    $('#mobile').click(function () {
        text.val(text.val() + ' {% Mobile Number %}');
        var newCharCnt = text.val().length;
        $('#character-count').html('Charcters:' + newCharCnt);

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
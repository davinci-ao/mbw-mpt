@extends('templates.layout')

@section('head_js')
    <link href="/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="/js/datepicker.min.js"></script>

    <!-- Include language -->
    <script src="/js/i18n/datepicker.nl.js"></script>
@endsection

@section('title', 'calendar | mpt')

@section('content')

<h1>tkalender</h1>

<form>
	<input style="border: 1px solid red;" id=datepick1 name=datepick type='text' class="datepicker-here" data-language='nl' data-position="right top" />

    <br>
    <br>
    <h4>kalender</h4>
    <div class="datepicker-here" data-language='nl'></div>

</form>


    
@endsection

@section('bottom_js')
<script>

	// Initialization
    $('#datepick1').datepicker({
    onRenderCell: function (date, cellType) {
        
        language: 'nl',
        if (cellType == 'day') {
            var day = date.getDay(),
                isDisabled = true;

            return {
                disabled: isDisabled
            }
        }
    }
})
    // Access instance of plugin
    //$('#datepick1').data('datepicker')
        
</script>
@endsection
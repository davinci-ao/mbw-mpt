@extends('templates.layout')

@section('head_js')

    <link href="/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="/js/datepicker.min.js"></script>

    <!-- Include language -->
    <script src="/js/i18n/datepicker.nl.js"></script>
@endsection

@section('title', 'calendar | mpt')

@section('content')


<form>
<label for="">Datum</label>
	<input style="border: 1px solid black;" id=datepicker name=datepicker type='text' class="datepicker-here" class="form-control" data-language='nl' data-position="right top" />
</form>
    <br>
    <h4>kalender</h4>
    <div class="datepicker-here" id="datepicker" name= "datepicker" data-language='nl'></div>




    
@endsection

@section('bottom_js')
<script>

  // Initialization


var disabledDates = ["2019-12-23","2019-12-24","2019-12-25"];

$('#datepicker').datepicker({
    language: 'nl',
    onRenderCell: function (date, cellType) {
        if (cellType == 'day') {
            var day = date.getDate();
            var monthIndex = 1+date.getMonth();
            var year = date.getFullYear();
            var currentCellDate = year +"-"+monthIndex+"-"+day;
            var isDisabled= $.inArray(currentCellDate, disabledDates) > -1;
            var today = new Date();
            var isPastDay = date < today;
            
            if (isDisabled == true | isPastDay == true) {
                return {disabled: true}
            } else {
                return {disabled: false}
            }
            
        }
    }   
})
 

   
    // Access instance of plugin
    $('#datepick1').data('datepicker')
        
</script>
@endsection
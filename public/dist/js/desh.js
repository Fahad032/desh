$(document).ready(function(){


    "use strict";

    //Make the dashboard widgets sortable Using jquery UI
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    });
    $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");


    /* Morris.js Charts */
    // Sales chart

    if($(document).find('#revenue-chart').length > 0){
        var area = new Morris.Area({
            element: 'revenue-chart',
            resize: true,
            data: [
                {y: '2014 Q1', item1: 2666, item2: 2666},
                {y: '2014 Q2', item1: 2778, item2: 2294},
                {y: '2014 Q3', item1: 4912, item2: 1969},
                {y: '2014 Q4', item1: 3767, item2: 3597},
                {y: '2015 Q1', item1: 6810, item2: 1914},
                {y: '2015 Q2', item1: 5670, item2: 4293},
                {y: '2015 Q3', item1: 4820, item2: 3795},
                {y: '2015 Q4', item1: 15073, item2: 5967},
                {y: '2016 Q1', item1: 10687, item2: 4460},
                {y: '2016 Q2', item1: 8432, item2: 5713}
            ],
            xkey: 'y',
            ykeys: ['item1', 'item2'],
            labels: ['Item 1', 'Item 2'],
            lineColors: ['#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
        });

        //Fix for charts under tabs
        $('.box ul.nav a').on('shown.bs.tab', function () {
            area.redraw();
        });


    }

    if($(document).find('#line-chart').length > 0){

        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                {y: '2014 Q1', item1: 2666},
                {y: '2014 Q2', item1: 2778},
                {y: '2014 Q3', item1: 4912},
                {y: '2014 Q4', item1: 3767},
                {y: '2015 Q1', item1: 6810},
                {y: '2015 Q2', item1: 5670},
                {y: '2015 Q3', item1: 4820},
                {y: '2015 Q4', item1: 15073},
                {y: '2016 Q1', item1: 10687},
                {y: '2016 Q2', item1: 8432}
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            lineColors: ['#efefef'],
            lineWidth: 2,
            hideHover: 'auto',
            gridTextColor: "#fff",
            gridStrokeWidth: 0.4,
            pointSize: 4,
            pointStrokeColors: ["#efefef"],
            gridLineColor: "#efefef",
            gridTextFamily: "Open Sans",
            gridTextSize: 10
        });

        //Fix for charts under tabs
        $('.box ul.nav a').on('shown.bs.tab', function () {
            line.redraw();
        });


    }


    if($(document).find('#sales-chart').length > 0){

        //Sparkline charts
        var myvalues = [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021];
        $('#sparkline-1').sparkline(myvalues, {
            type: 'line',
            lineColor: '#92c1dc',
            fillColor: "#ebf4f9",
            height: '50',
            width: '80'
        });
        myvalues = [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921];
        $('#sparkline-2').sparkline(myvalues, {
            type: 'line',
            lineColor: '#92c1dc',
            fillColor: "#ebf4f9",
            height: '50',
            width: '80'
        });
        myvalues = [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21];
        $('#sparkline-3').sparkline(myvalues, {
            type: 'line',
            lineColor: '#92c1dc',
            fillColor: "#ebf4f9",
            height: '50',
            width: '80'
        });



        //Donut Chart
        var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#f56954", "#00a65a"],
            data: [
                {label: "Download Sales", value: 12},
                {label: "In-Store Sales", value: 30},
                {label: "Mail-Order Sales", value: 20}
            ],
            hideHover: 'auto'
        });

        //Fix for charts under tabs
        $('.box ul.nav a').on('shown.bs.tab', function () {
            donut.redraw();
        });


    }

    //The Calender
    $("#calendar").datepicker();

    $('.data-sortable').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });

    //report datepicker action
    $('.report-date').on('change', function(){

        var dateVal = $(this).val();
        var actionUrl = $(this).closest('form').data('action');


        $('.archive-report').attr('href',  '\/'+ actionUrl +'\/'+dateVal.replace(/\//g, '\-'));

    });

    $('.archive-report').on('click', function(e){

        if(($('.report-date').val() == null) || ($('.report-date').val() == '')){

            e.preventDefault();

            alert("Please Choose a date first");
        }

    });


});


$(document).ready(function () {

    $('.recharge_form').submit(function (e) {

        $this = $(this);
        $btn = $this.find('.btn');
        $icon = $this.find('fa');

        $btn.addClass('disabled').find('.fa').addClass('fa-spinner fa-pulse fa-fw').removeClass('fa-check');

        var token = $this.find('input[name="_token"]').val();
        console.log(token);

        $.ajax({

            url: '/account',
            type: 'POST',
            beforeSend: function (xhr) {

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }

            },

            data: $this.serialize(),
            success: function ($data) {

                if ($btn.hasClass('btn-danger')) {

                    $btn.removeClass('btn-danger').addClass('btn-success');

                }

                $this.parents('.box-danger').find('.box-header').find('span').text('Saved');

                $btn.removeClass('disabled').find('.fa').removeClass('fa-spinner fa-pulse fa-fw fa-times').addClass('fa-check');

            },

            error: function ($data) {

                $btn.removeClass('disabled btn-success').addClass('btn-danger').find('.fa').removeClass('fa-spinner fa-pulse fa-fw').addClass('fa-times');
                $this.parents('.box-danger').find('.box-header').find('span').text('*Please be sure to Invest First');
            }

        });

        e.preventDefault();
    });


    $('.ajax_submit').submit(function (e) {

        $this = $(this);
        $btn = $this.find('.btn');
        $icon = $this.find('fa');

        $btn.addClass('disabled').find('.fa').addClass('fa-spinner fa-pulse fa-fw').removeClass('fa-check');

        var token = $this.find('input[name="_token"]').val();

        $.ajax({

            url: '/account',
            type: 'POST',
            beforeSend: function (xhr) {

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }

            },

            data: $this.serialize(),
            success: function ($data) {

                if ($btn.hasClass('btn-danger')) {

                    $btn.removeClass('btn-danger').addClass('btn-success');

                }
                $btn.removeClass('disabled').find('.fa').removeClass('fa-spinner fa-pulse fa-fw fa-times').addClass('fa-check');

                console.log($data);


            },

            error: function ($data) {

                $btn.removeClass('disabled btn-success').addClass('btn-danger').find('.fa').removeClass('fa-spinner fa-pulse fa-fw').addClass('fa-times');

            }

        });

        e.preventDefault();
    });


});




/*

 $('#investment_form').submit(function(e){

 $this = $(this);
 $btn = $this.find('.btn');
 $icon = $this.find('fa');

 $btn.addClass('disabled').find('.fa').addClass('fa-spinner fa-pulse fa-fw').removeClass('fa-check');

 var token = $this.find('input[name="_token"]').val();

 $.ajax({

 url : '/account',
 type: 'POST',
 beforeSend: function (xhr) {

 if (token) {
 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
 }

 },

 data: $this.serialize(),
 success: function( $data ){

 if($btn.hasClass('btn-danger')){

 $btn.removeClass('btn-danger').addClass('btn-success');

 }
 $btn.removeClass('disabled').find('.fa').removeClass('fa-spinner fa-pulse fa-fw fa-times').addClass('fa-check');

 console.log($data);


 },

 error: function($data){

 $btn.removeClass('disabled btn-success').addClass('btn-danger').find('.fa').removeClass('fa-spinner fa-pulse fa-fw').addClass('fa-times');

 }

 });

 e.preventDefault();
 });



 $('.commission-calculation').submit(function(e){

 $this = $(this);
 $btn = $this.find('.btn');
 $icon = $this.find('fa');

 $btn.addClass('disabled').find('.fa').addClass('fa-spinner fa-pulse fa-fw').removeClass('fa-check');

 var token = $this.find('input[name="_token"]').val();

 $.ajax({

 url : '/account',
 type: 'POST',
 beforeSend: function (xhr) {

 if (token) {
 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
 }

 },

 data: $this.serialize(),
 success: function( $data ){

 if($btn.hasClass('btn-danger')){

 $btn.removeClass('btn-danger').addClass('btn-success');

 }
 $btn.removeClass('disabled').find('.fa').removeClass('fa-spinner fa-pulse fa-fw fa-times').addClass('fa-check');

 console.log($data);


 },

 error: function($data){

 $btn.removeClass('disabled btn-success').addClass('btn-danger').find('.fa').removeClass('fa-spinner fa-pulse fa-fw').addClass('fa-times');

 }

 });

 e.preventDefault();
 });

 */

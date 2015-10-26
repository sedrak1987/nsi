@extends('admin.app')
@section('content')
    <section class="content">
        @if (Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    <i class="fa fa-check-circle fa-lg fa-fw"></i> &nbsp;
                </strong>
                {{ Session::get('message') }}
            </div>
            @endif
                    <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $projects_count?></h3>

                            <p>My Projects</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper-outline"></i>
                        </div>
                        <a href="{{ route('admin.projects.index') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $accounts_count?></h3>

                            <p>Accounts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin.accounts.index') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Charges</p>
                        </div>
                        <div class="icon">
                            <span class="glyphicon glyphicon-piggy-bank"></span>
                        </div>
                        <a href="{{ route('admin.charges.index') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

            </div><!-- /.row -->
            <!-- Main row -->


    </section><!-- /.content -->

    <!-- chart -->
    <div class="row">

        <form method="get" class="col-md-5 col-md-offset-3" id="idForm" action="admin/">


            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="filter" placeholder="Search for month" name="filter">
          <span class="input-group-btn">
            <input type="submit"  id="search" class="btn btn-default" value="Get" >
          </span>
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
        </form>
    </div>
    <div id="container" style="height: 400px; width: 900px"></div>
    {!! Html::script("highcharts/highstock.js") !!}
    {!! Html::script("highcharts/modules/exporting.js") !!}
    {!! Html::script("highcharts/themes/dark-green.js") !!}

    <script>
        var chart;
        $(function () {
            var data1=[
                    <?php

                    foreach($income as $key=>$value){
                        echo $value.",";
                    }
                    ?>
            ];
            var data2=[
                <?php
                foreach($spending as $key=>$value){
                    echo $value.",";
                }
                ?>
        ];
            var data3=[
                <?php
                foreach($diff as $key=>$value){
                    echo $value.",";
                }
                ?>
        ];

            var month=[<?php
                foreach($myarr as $value){
                    echo "'".$value."',";
                }
            ?>];
            chart=new Highcharts.Chart({

            chart: {
                // type: 'column',
                renderTo: 'container'
            },
            title: {
                text: 'Monthly Average Income, Spending,Income-Spending',
                        x: 20 //center
            },
            subtitle: {
                text: 'For NSI:<br>No So Important<br>',
                        x: -20
            },
            xAxis: {
                categories: month,
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]},
            yAxis: {
                title: {
                    text: 'Amount ($)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '$'
            },
            legend: {
                layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
            },
            series: [{
                name: 'Income',
                data: data1
            }, {
                name: 'Spending',
                data: data2
            }, {
                name: 'Income-Spending',
                data: data3
            }, ]
        });
        });
    </script>
@stop

<script>

</script>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>







<div class="archive-report-form-wrapper col-xs-12">

    <div class="box box-primary">

        <form action="/report" method="GET" class="archive-report-form form-inline" data-action="report">

            <div class="form-group">

                <input type="text" name="date" placeholder="mm-dd-yy" id="calendar" class="form-control input-sm report-date" />

            </div>

            <div class="form-group">

                <a class="btn btn-primary btn-sm archive-report" href="">View Report</a>

            </div>
            @if($date)

                <div class="pull-right report-info">
                    <span class="text-light-blue"> Report For {{ $date }} </span>
                </div>

            @endif


        </form>


    </div>



    <div class="clearfix"></div>

</div>

<div class="clearfix"></div>

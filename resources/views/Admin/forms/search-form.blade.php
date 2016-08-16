<div class="archive-report-form-wrapper col-xs-12">

    <div class="box box-primary">

        <form action="/{{ $action }}" method="GET" class="archive-report-form form-inline" data-action="{{ $action }}">

            <div class="form-group">

                <input type="text" name="date" placeholder="mm-dd-yy" id="calendar" class="form-control input-sm report-date" />

            </div>

            <div class="form-group">

                <a class="btn btn-primary btn-sm archive-report" href="">{{ $btn_value }}</a>

            </div>
            @if(isset($date))

                <div class="pull-right report-info">
                    <span class="text-light-blue"> {{ $text_info }} {{ isset($date)? str_replace('00:00:00', '', $date):'' }} </span>
                </div>

            @endif


        </form>


    </div>



    <div class="clearfix"></div>

</div>

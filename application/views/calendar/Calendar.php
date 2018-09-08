<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">&nbsp;</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Event</a></li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Events and Schedules</h3>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <!-- Modal -->
    </section>
</div>
<link rel="stylesheet" href="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.css" />
<script src="<?php echo base_url() ?>scripts/fullcalendar/lib/moment.min.js"></script>
<script src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>scripts/fullcalendar/gcal.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
         $('#calendar').fullCalendar({
            eventSources: [
            {
                events: function(start, end, timezone, callback) {
                    $.ajax({
                    url: '<?php echo base_url() ?>calendar/get_events',
                    dataType: 'json',
                    data: {
                    // our hypothetical feed requires UNIX timestamps
                    start: start.unix(),
                    end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                    });
                }
            },
           ]
        });

    });
</script>
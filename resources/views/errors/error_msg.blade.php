@if(Session::has('successMsg'))
    <div class="am-alert am-alert-success" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p>{{Session::get('successMsg')}}</p>
    </div>
@endif
@if(Session::has('failureMsg'))
    <div class="am-alert am-alert-danger" data-am-alert="">
        <button type="button" class="am-close">×</button>
        <p>{{Session::get('failureMsg')}}</p>
    </div>
@endif
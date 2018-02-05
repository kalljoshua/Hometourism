<h2>Hello {{$property->agent->last_name}}</h2>
<h3>Your property has been activated successfully
    and shall expire on {{$property->expiry_date->format('M-d-Y \a\t h:i a')}}</h3>
<p>Property title: <strong>{{$property->title}}</strong></p>
<p>Thank you.</p>
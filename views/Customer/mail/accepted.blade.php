<x-mail::message>
Hi {{$details["name"]}},

Your booking for package {{$details['package_name']}} has been accepted! <br>

Booking details:

Name: {{$details['name']}} <br>
Contact: {{$details['phone']}} <br>
Email: {{$details['email']}} <br>
Num of pax: {{$details['pax']}} <br>

<b>Status: Booking Approved</b><br>


<x-mail::button :url="$details['url_invoice']">
View booking 
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

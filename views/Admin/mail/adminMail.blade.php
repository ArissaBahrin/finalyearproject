<x-mail::message>
# Hi {{$details['name']}}

New booking for the package {{$details['package_name']}} received!

Booking details:

Name: {{$details['name']}} <br>
Contact: {{$details['phone']}} <br>
Email: {{$details['email']}} <br>
Num of pax: {{$details['pax']}} <br>

Total amount: RM{{$details['total']}}

<x-mail::button :url="$details['url_edit']">
Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

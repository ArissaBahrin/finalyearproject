<x-mail::message>
# Hi {{$details['name']}}

Your booking for the package {{$details['package_name']}} has been submitted successfully!

Booking details:

Name: {{$details['name']}} <br>
Contact: {{$details['phone']}} <br>
Email: {{$details['email']}} <br>
Num of pax: {{$details['pax']}} <br>

Total amount: RM{{$details['total']}}

<x-mail::button :url="$details['url_invoice']">
Upload Receipt
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

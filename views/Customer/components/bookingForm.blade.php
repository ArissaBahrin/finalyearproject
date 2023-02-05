<label for="name"><b>Name</b></label>
<input type="text" placeholder="Enter Name" name="name" id="name" value="{{$booking->customer_name ?? $user->name}}" {{!isset($booking) ? 'required' : 'readonly'}}>

<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" id="email" value="{{$booking->customer_email ?? $user->email}}" {{!isset($booking) ? 'required' : 'readonly'}}>

<label for="number"><b>Phone Number</b></label>
<input type="text" placeholder="Enter Phone Number" name="number" id="number" value="{{$booking->customer_phone ?? ''}}" {{!isset($booking) ? 'required' : 'readonly'}}>

<label for="address"><b>Address</b></label>
<input type="text" placeholder="Enter Name" name="address" id="address" value="{{$booking->user->address ?? $user->name}}" {{!isset($booking) ? 'required' : 'readonly'}}>

<label for="date"><b>Travel Date</b></label>
<input type="text" placeholder="Enter tentative travel dates here" name="date" id="date" value="{{$booking->departure_date ?? ''}}" {{!isset($booking) ? 'required' : 'readonly'}}>

<label for="pax"><b>No of Pax</b></label>
<input type="text" placeholder="Enter No of Pax" name="pax" id="pax" value="{{$booking->pax ?? ''}}" {{!isset($booking) ? 'required' : 'readonly'}}>
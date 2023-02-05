<div class="row">
    <div class="col-2">
      <h5>NAME</h5>
    </div>
    <div class="col-md-10">
      <div class="form-group">
          <input type="text" class="form-control" id="subject" name="name" placeholder="Enter Subject" value="{{$package->name ?? ''}}" required>
      </div>
    </div>

    {{-- <div class="col-2">
      <h5>COUNTRY</h5>
    </div>
    <div class="col-md-10">
      <div class="form-group">
          <input type="radio" id="malaysia" name="country" value="Malaysia" 
          @if (isset($package))
            @if ($package->country == "Malaysia")
                {{"checked"}}
            @endif
          @endif>
          <label for="malaysia" class="ml-2">Malaysia</label>
          <input type="radio" class="ml-5" id="oversea" name="country" value="Oversea"
          @if (isset($package))
            @if ($package->country == "Oversea")
                {{"checked"}}
            @endif
          @endif>
          <label for="malaysia" class="ml-2">Oversea</label>
      </div>
    </div> --}}
    

    <div class="col-2">
      <h5>DAYS & NIGHTS</h5>
    </div>
    <div class="col-4">
      <div class="form-group">
          <input type="number" class="form-control" id="days" name="days" placeholder="0" value="{{$package->days ?? ''}}" required>
      </div>
    </div>
    <div class="col-1">
      <label for="days">Days</label>
    </div>

    <div class="col-4">
      <div class="form-group">
          <input type="number" class="form-control" id="nights" name="nights" placeholder="0" value="{{$package->nights ?? ''}}" required>
      </div>
    </div>
    <div class="col-1">
      <label for="nights">Nights</label>
    </div>

    <div class="col-2">
      <h5>PRICE (RM)</h5>
    </div>

    <div class="col-4">
      <div class="form-group">
          <input type="number" class="form-control" id="adult_price" name="adult_price" placeholder="0" value="{{$package->adult_price ?? ''}}" required>
      </div>
    </div>
    <div class="col-1">
      <label for="adult_price">Adult</label>
    </div>

    <div class="col-4">
      <div class="form-group">
          <input type="number" class="form-control" id="children_price" name="children_price" placeholder="0" value="{{$package->children_price ?? ''}}" required>
      </div>
    </div>
    <div class="col-1">
      <label for="children_price">Children</label>
    </div>

    <div class="col-2">
      <h5>ITINERY FILE</h5>
    </div>
    <div class="col-md-10">
      <div class="form-group">
          <input type="file" name="itinery" {{isset($package) ? '' : 'required'}}>
      </div>
    </div>
    @if (isset($package))
      <div class="col-md-10" style="margin-left: 190px">
        <div class="form-group">
          <a href="{{ asset('storage/'.$package->itinery_path) }}" target="_blank">
            <button type="button" class="btn"><i class="fa fa-download"></i> Uploaded Itinerary </button>
          </a>
        </div>
      </div>
    @endif
    <div class="col-2">
      <h5>THUMBNAIL</h5>
    </div>
    <div class="col-md-10">
      <div class="form-group">
          <input type="file" name="thumbnail" {{isset($package) ? '' : 'required'}}>
      </div>
    </div>
    @if (isset($package))
      <div class="col-md-10" style="margin-left: 190px">
        <div class="form-group">
          <a href="{{ asset('storage/'.$package->thumbnail_path) }}" target="_blank">
            <button type="button" class="btn"><i class="fa fa-download"></i> Uploaded Thumbnail </button></a>
        </div>
      </div>
    @endif
  </div>

  
  <div class="mt-2 d-flex justify-content-end">
    <button type="submit" class="button home-banner-btn" style="background-color: #cca772">Save</button>
  </div>
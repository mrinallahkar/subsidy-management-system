<option value="">--Select--</option>
@foreach($districtMaster as $districtMaster)
<option value="{{$districtMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$districtMaster->District_Name}}</option>
@endforeach
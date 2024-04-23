<option value="">--Select--</option>
@foreach($role as $role)
<option value="{{$role->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$role->Role_Name}}</option>
@endforeach
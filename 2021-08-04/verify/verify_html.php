<?php

/* HTML */

/* Hide & Show */

{!!(isset($login_frm) && !empty($login_frm))? 'class="modal fade in"' : 'class="modal fade in"'!!}

<div class="content-page" {!!($pwd_resetfrm)? '' : 'style=display:none;'!!}>

{{$key==0?'selected="selected"' : ''}}
   
/* HTML SELECTED SELECT */
<div class="col-md-3">
	<label for="from"> {{trans('admin/general.country')}}</label>
	<select name="country" id="country_id" class="form-control">
		<option value="">{{trans('admin/general.country_search')}}</option>
		@if(!empty($country_list))
		@foreach ($country_list as $row)
		<option value="{{$row->country_id}}" {{ (isset($country) && $country == $row->country_id) ? 'selected':''}}>{{$row->country}}</option>
		@endforeach
		@endif
	</select>
</div>

*** NEW ***
<option value="{{$v}}" {{$v == $details->gender ? 'selected="selected"': ''}} >{{$v}}</option>

/* Display */
  <div class="callout callout-danger" {!!($userInfo->is_email_verified)?'style=display:none;':''!!}>

/* GOOGLE API */

<script src="https://maps.googleapis.com/maps/api/js?key={{$siteConfig->google_api_key}}&libraries=places&callback=initAutocomplete" async defer></script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initAutocomplete"
        async defer></script>
		
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

//LINKS
https://selftaughtcoders.com/from-idea-to-launch/lesson-17/laravel-5-mvc-application-in-10-minutes/

https://support.canva.com/canva-print/pricing-information/print-orders-invoice/

https://www.codeinwp.com/blog/how-to-create-an-attractive-dropdown-blogroll-with-css/  Nice website
?>
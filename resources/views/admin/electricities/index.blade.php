@extends('layouts.admin')
@section('content')

<!--<div class="card">
    <div class="card-header">
        {{ trans('cruds.electricity.title') }}
    </div>
</div>-->
<div class="card">
  <div class="card-header text-center">
    <img src="https://i.imgur.com/0SK9QRc.png" alt="TNB Home Energy Calculator" width="250px" height="82px"></img>
    <img src="https://www.tnb.com.my/medium/imgs/tnb_logo.png" alt="TNB Home Energy Calculator" width="160px" height="82px"></img>
  </div>
  <div class="card-body text-center">
    <h2>Home Energy Calculator, a service provided by Tenaga Nasional Berhad and UtilityBuddy, aims to  
    provide utility customers with information on how much electricity they typically consume and information  
    on how to reduce consumption.</h2>
  </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Energy Usage Calculator</h5>
                <p class="card-text">Calculate your estimated energy consumption/usage for a house or room using this calculator.</p>
                <a href="https://hec.tnb.com.my/Public/UsageCalculator" target="_blank" class="btn btn-primary">Go To Calculator</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Appliance Calculator</h5>
                <p class="card-text">Calculate electricity consumption for an appliance or compare new appliance to be purchased.</p>
                <a href="https://hec.tnb.com.my/Public/ApplianceComparison" target="_blank" class="btn btn-primary">Go To Calculator</a>
            </div>
        </div>
    </div>
</div>



@endsection
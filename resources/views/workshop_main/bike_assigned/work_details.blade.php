@extends('workshop_main.layout')
@section('title', 'Bike Working Details')
@push('style')
<style>
    .highlight {
        border: 1px red solid;
        background: aliceblue;
    }
</style>

@endpush
@section('content')
    <div class="content-wrapper">
        @if ($work->workshop_work_is_done != 'Yes')
            <form method="POST" action="{{ route('workshop_main.bike-assigned.update', $work->id) }}" >
            @csrf
            @method('PUT')
        @endif
        
        
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <center><h5>Body Work</h5></center>
                            {{-- $work->bike_inspections->bike_inspection_full_body_paint --}}
                            <div class="form-group row">
                                <label for="bike_inspection_full_body_paint">Full Body Paint</label>
                                @if ($work->bike_inspections->bike_inspection_full_body_paint)
                                    <input type="number" class="form-control highlight" id="bike_inspection_full_body_paint" name="bike_inspection_full_body_paint" placeholder="Issue found please check" value="{{ $work->bike_inspection_full_body_paint ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_full_body_paint" name="bike_inspection_full_body_paint" placeholder="Full Body Paint" value="{{ $work->bike_inspection_full_body_paint ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_full_body_paint')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_half_body_paint">Half Body Paint</label>
                                @if ($work->bike_inspections->bike_inspection_half_body_paint)
                                    <input type="number" class="form-control highlight" id="bike_inspection_half_body_paint" name="bike_inspection_half_body_paint" placeholder="Issue found please check" value="{{ $work->bike_inspection_half_body_paint ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_half_body_paint" name="bike_inspection_half_body_paint" placeholder="Half Body Paint" value="{{ $work->bike_inspection_half_body_paint ?? '' }}">
                                @endif
                            </div>
                            @error('bike_inspection_half_body_paint')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_panel_scooty">Panel Scooty</label>
                                @if ($work->bike_inspections->bike_inspection_panel_scooty)
                                    <input type="number" class="form-control highlight" id="bike_inspection_panel_scooty" name="bike_inspection_panel_scooty" placeholder="Issue found please check" value="{{ $work->bike_inspection_panel_scooty ?? '' }}">   
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_panel_scooty" name="bike_inspection_panel_scooty" placeholder="Panel Scooty" value="{{ $work->bike_inspection_panel_scooty ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_panel_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_noise_scooty">Noise Scooty</label>
                                @if ($work->bike_inspections->bike_inspection_noise_scooty)
                                    <input type="number" class="form-control highlight" id="bike_inspection_noise_scooty" name="bike_inspection_noise_scooty" placeholder="Issue found please check" value="{{ $work->bike_inspection_noise_scooty ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_noise_scooty" name="bike_inspection_noise_scooty" placeholder="Noise Scooty" value="{{ $work->bike_inspection_noise_scooty ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_noise_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_fender_scooty">Fender Scooty</label>
                                @if ($work->bike_inspections->bike_inspection_fender_scooty)
                                    <input type="number" class="form-control highlight" id="bike_inspection_fender_scooty" name="bike_inspection_fender_scooty" placeholder="Issue found please check" value="{{ $work->bike_inspection_fender_scooty ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_fender_scooty" name="bike_inspection_fender_scooty" placeholder="Fender Scooty" value="{{ $work->bike_inspection_fender_scooty ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_fender_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_floor_trim_scooty">Floor Trim Scooty</label>
                                @if ($work->bike_inspections->bike_inspection_floor_trim_scooty)
                                    <input type="number" class="form-control highlight" id="bike_inspection_floor_trim_scooty" name="bike_inspection_floor_trim_scooty" placeholder="Issue found please check" value="{{ $work->bike_inspection_floor_trim_scooty ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_floor_trim_scooty" name="bike_inspection_floor_trim_scooty" placeholder="Floor Trim Scooty" value="{{ $work->bike_inspection_floor_trim_scooty ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_floor_trim_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_visor">Visor - Scooty / Bike</label>
                                @if ($work->bike_inspections->bike_inspection_visor)
                                    <input type="number" class="form-control highlight" id="bike_inspection_visor" name="bike_inspection_visor" placeholder="Issue found please check" value="{{ $work->bike_inspection_visor ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_visor" name="bike_inspection_visor" placeholder="Visor - Scooty / Bike" value="{{ $work->bike_inspection_visor ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_visor')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_fuel_tank">Fuel Tank</label>
                                @if ($work->bike_inspections->bike_inspection_fuel_tank)
                                    <input type="number" class="form-control highlight" id="bike_inspection_fuel_tank" name="bike_inspection_fuel_tank" placeholder="Issue found please check" value="{{ $work->bike_inspection_fuel_tank ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_fuel_tank" name="bike_inspection_fuel_tank" placeholder="Fuel Tank" value="{{ $work->bike_inspection_fuel_tank ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_fuel_tank')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_front_mudguard">Front Mudguard</label>
                                @if ($work->bike_inspections->bike_inspection_front_mudguard)
                                    <input type="number" class="form-control highlight" id="bike_inspection_front_mudguard" name="bike_inspection_front_mudguard" placeholder="Issue found please check" value="{{ $work->bike_inspection_front_mudguard ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_front_mudguard" name="bike_inspection_front_mudguard" placeholder="Front Mudguard" value="{{ $work->bike_inspection_front_mudguard ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_front_mudguard')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            

                            <div class="form-group row">
                                <label for="bike_inspection_tail_cowl">Tail Cowl</label>
                                @if ($work->bike_inspections->bike_inspection_tail_cowl)
                                    <input type="number" class="form-control highlight" id="bike_inspection_tail_cowl" name="bike_inspection_tail_cowl" placeholder="Issue found please check" value="{{ $work->bike_inspection_tail_cowl ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_tail_cowl" name="bike_inspection_tail_cowl" placeholder="Tail Cowl" value="{{ $work->bike_inspection_tail_cowl ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_tail_cowl')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_side_panel">Side Panel</label>
                                @if ($work->bike_inspections->bike_inspection_side_panel)
                                    <input type="number" class="form-control highlight" id="bike_inspection_side_panel" name="bike_inspection_side_panel" placeholder="Issue found please check" value="{{ $work->bike_inspection_side_panel ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_side_panel" name="bike_inspection_side_panel" placeholder="Side Panel" value="{{ $work->bike_inspection_side_panel ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_side_panel')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_chassis_paint">Chassis Paint </label>
                                @if ($work->bike_inspections->bike_inspection_chassis_paint)
                                    <input type="number" class="form-control highlight" id="bike_inspection_chassis_paint" name="bike_inspection_chassis_paint" placeholder="Issue found please check" value="{{ $work->bike_inspection_chassis_paint ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_chassis_paint" name="bike_inspection_chassis_paint" placeholder="Chassis Paint" value="{{ $work->bike_inspection_chassis_paint ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_chassis_paint')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_misc">Misc</label>
                                @if ($work->bike_inspections->bike_inspection_misc)
                                    <input type="number" class="form-control highlight" id="bike_inspection_misc" name="bike_inspection_misc" placeholder="Issue found please check" value="{{ $work->bike_inspection_misc ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_misc" name="bike_inspection_misc" placeholder="Misc" value="{{ $work->bike_inspection_misc ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_misc')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_meter_repair">Meter Repair</label>
                                @if ($work->bike_inspections->bike_inspection_meter_repair)
                                    <input type="number" class="form-control highlight" id="bike_inspection_meter_repair" name="bike_inspection_meter_repair" placeholder="Issue found please check" value="{{ $work->bike_inspection_meter_repair ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_meter_repair" name="bike_inspection_meter_repair" placeholder="Meter Repair" value="{{ $work->bike_inspection_meter_repair ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_meter_repair')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_shocker_repair">Shocker Repair</label>
                                @if ($work->bike_inspections->bike_inspection_shocker_repair)
                                    <input type="number" class="form-control highlight" id="bike_inspection_shocker_repair" name="bike_inspection_shocker_repair" placeholder="Issue found please check" value="{{ $work->bike_inspection_shocker_repair ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_shocker_repair" name="bike_inspection_shocker_repair" placeholder="Shocker Repair" value="{{ $work->bike_inspection_shocker_repair ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_shocker_repair')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_key_making">Key Making</label>
                                @if ($work->bike_inspections->bike_inspection_key_making)
                                    <input type="number" class="form-control highlight" id="bike_inspection_key_making" name="bike_inspection_key_making" placeholder="Issue found please check" value="{{ $work->bike_inspection_key_making ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_key_making" name="bike_inspection_key_making" placeholder="Key Making" value="{{ $work->bike_inspection_key_making ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_key_making')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_tyre_front">Front Tyre</label>
                                @if ($work->bike_inspections->bike_inspection_tyre_front)
                                    <input type="number" class="form-control highlight" id="bike_inspection_tyre_front" name="bike_inspection_tyre_front" placeholder="Issue found please check" value="{{ $work->bike_inspection_tyre_front ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_tyre_front" name="bike_inspection_tyre_front" placeholder="Front Tyre" value="{{ $work->bike_inspection_tyre_front ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_tyre_front')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_tyre_rear">Rear Tyre</label>
                                @if ($work->bike_inspections->bike_inspection_tyre_rear)
                                    <input type="number" class="form-control highlight" id="bike_inspection_tyre_rear" name="bike_inspection_tyre_rear" placeholder="Issue found please check" value="{{ $work->bike_inspection_tyre_rear ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_tyre_rear" name="bike_inspection_tyre_rear" placeholder="Rear Tyre" value="{{ $work->bike_inspection_tyre_rear ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_tyre_rear')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

<center><h5>Engine Parts</h5></center>

                            <div class="form-group row">
                                <label for="bike_inspection_cylinder_boring">Cylinder Boring</label>
                                @if ($work->bike_inspections->bike_inspection_cylinder_boring)
                                    <input type="number" class="form-control highlight" id="bike_inspection_cylinder_boring" name="bike_inspection_cylinder_boring" placeholder="Issue found please check" value="{{ $work->bike_inspection_cylinder_boring ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_cylinder_boring" name="bike_inspection_cylinder_boring" placeholder="Cylinder Boring" value="{{ $work->bike_inspection_cylinder_boring ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_cylinder_boring')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve_grind">Valve Grind</label>
                                @if ($work->bike_inspections->bike_inspection_valve_grind)
                                    <input type="number" class="form-control highlight" id="bike_inspection_valve_grind" name="bike_inspection_valve_grind" placeholder="Issue found please check" value="{{ $work->bike_inspection_valve_grind ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_valve_grind" name="bike_inspection_valve_grind" placeholder="Valve Grind" value="{{ $work->bike_inspection_valve_grind ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_valve_grind')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve_guide">Valve Guide</label>
                                @if ($work->bike_inspections->bike_inspection_valve_guide)
                                    <input type="number" class="form-control highlight" id="bike_inspection_valve_guide" name="bike_inspection_valve_guide" placeholder="Issue found please check" value="{{ $work->bike_inspection_valve_guide ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_valve_guide" name="bike_inspection_valve_guide" placeholder="Valve Guide" value="{{ $work->bike_inspection_valve_guide ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_valve_guide')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_crank_repair">Crank Repair</label>
                                @if ($work->bike_inspections->bike_inspection_crank_repair)
                                    <input type="number" class="form-control highlight" id="bike_inspection_crank_repair" name="bike_inspection_crank_repair" placeholder="Issue found please check" value="{{ $work->bike_inspection_crank_repair ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_crank_repair" name="bike_inspection_crank_repair" placeholder="Crank Repair" value="{{ $work->bike_inspection_crank_repair ?? '' }}">  
                                @endif
                                
                            </div>
                            @error('bike_inspection_crank_repair')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_crank_assembly">Crank Assembly</label>
                                @if ($work->bike_inspections->bike_inspection_crank_assembly)
                                    <input type="number" class="form-control highlight" id="bike_inspection_crank_assembly" name="bike_inspection_crank_assembly" placeholder="Issue found please check" value="{{ $work->bike_inspection_crank_assembly ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_crank_assembly" name="bike_inspection_crank_assembly" placeholder="Crank Assembly" value="{{ $work->bike_inspection_crank_assembly ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_crank_assembly')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_piston">Piston</label>
                                @if ($work->bike_inspections->bike_inspection_piston)
                                    <input type="number" class="form-control highlight" id="bike_inspection_piston" name="bike_inspection_piston" placeholder="Issue found please check" value="{{ $work->bike_inspection_piston ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_piston" name="bike_inspection_piston" placeholder="Piston" value="{{ $work->bike_inspection_piston ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_piston')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve">Valve</label>
                                @if ($work->bike_inspections->bike_inspection_valve)
                                    <input type="number" class="form-control highlight" id="bike_inspection_valve" name="bike_inspection_valve" placeholder="Issue found please check" value="{{ $work->bike_inspection_valve ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_valve" name="bike_inspection_valve" placeholder="Valve" value="{{ $work->bike_inspection_valve ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_valve')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve_seal">Valve Seal</label>
                                @if ($work->bike_inspections->bike_inspection_valve_seal)
                                    <input type="number" class="form-control highlight" id="bike_inspection_valve_seal" name="bike_inspection_valve_seal" placeholder="Issue found please check" value="{{ $work->bike_inspection_valve_seal ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_valve_seal" name="bike_inspection_valve_seal" placeholder="Valve Seal" value="{{ $work->bike_inspection_valve_seal ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_valve_seal')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_oil_seal">Oil Seal</label>
                                @if ($work->bike_inspections->bike_inspection_oil_seal)
                                    <input type="number" class="form-control highlight" id="bike_inspection_oil_seal" name="bike_inspection_oil_seal" placeholder="Issue found please check" value="{{ $work->bike_inspection_oil_seal ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_oil_seal" name="bike_inspection_oil_seal" placeholder="Oil Seal" value="{{ $work->bike_inspection_oil_seal ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_oil_seal')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_plate">Clutch Plate</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_plate)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_plate" name="bike_inspection_clutch_plate" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_plate ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_plate" name="bike_inspection_clutch_plate" placeholder="Clutch Plate" value="{{ $work->bike_inspection_clutch_plate ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_plate')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_bell">Clutch Bell</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_bell)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_bell" name="bike_inspection_clutch_bell" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_bell ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_bell" name="bike_inspection_clutch_bell" placeholder="Clutch Bell" value="{{ $work->bike_inspection_clutch_bell ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_bell')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_roller">Clutch Roller</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_roller)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_roller" name="bike_inspection_clutch_roller" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_roller ?? '' }}"> 
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_roller" name="bike_inspection_clutch_roller" placeholder="Clutch Roller" value="{{ $work->bike_inspection_clutch_roller ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_roller')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_pulley">Clutch Pulley</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_pulley)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_pulley" name="bike_inspection_clutch_pulley" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_pulley ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_pulley" name="bike_inspection_clutch_pulley" placeholder="Clutch Pulley" value="{{ $work->bike_inspection_clutch_pulley ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_pulley')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_shoe">Clutch Shoe</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_shoe)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_shoe" name="bike_inspection_clutch_shoe" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_shoe ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_shoe" name="bike_inspection_clutch_shoe" placeholder="Clutch Shoe" value="{{ $work->bike_inspection_clutch_shoe ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_shoe')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_assembly">Clutch Assembly</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_assembly)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_assembly" name="bike_inspection_clutch_assembly" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_assembly ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_assembly" name="bike_inspection_clutch_assembly" placeholder="Clutch Assembly" value="{{ $work->bike_inspection_clutch_assembly ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_assembly')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_hub">Clutch Hub</label>
                                @if ($work->bike_inspections->bike_inspection_clutch_hub)
                                    <input type="number" class="form-control highlight" id="bike_inspection_clutch_hub" name="bike_inspection_clutch_hub" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_hub ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_clutch_hub" name="bike_inspection_clutch_hub" placeholder="Clutch Hub" value="{{ $work->bike_inspection_clutch_hub ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_clutch_hub')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_carburetor">Carburetor</label>
                                @if ($work->bike_inspections->bike_inspection_carburetor)
                                    <input type="number" class="form-control highlight" id="bike_inspection_carburetor" name="bike_inspection_carburetor" placeholder="Issue found please check" value="{{ $work->bike_inspection_carburetor ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_carburetor" name="bike_inspection_carburetor" placeholder="Carburetor" value="{{ $work->bike_inspection_carburetor ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_carburetor')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_camshaft">Camshaft</label>
                                @if ($work->bike_inspections->bike_inspection_camshaft)
                                    <input type="number" class="form-control highlight" id="bike_inspection_camshaft" name="bike_inspection_camshaft" placeholder="Issue found please check" value="{{ $work->bike_inspection_camshaft ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_camshaft" name="bike_inspection_camshaft" placeholder="Camshaft" value="{{ $work->bike_inspection_camshaft ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_camshaft')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_rocker">Rocker</label>
                                @if ($work->bike_inspections->bike_inspection_rocker)
                                    <input type="number" class="form-control highlight" id="bike_inspection_rocker" name="bike_inspection_rocker" placeholder="Issue found please check" value="{{ $work->bike_inspection_rocker ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_rocker" name="bike_inspection_rocker" placeholder="Rocker" value="{{ $work->bike_inspection_rocker ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_rocker')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_pressure_plate">Pressure Plate</label>
                                @if ($work->bike_inspections->bike_inspection_pressure_plate)
                                    <input type="number" class="form-control highlight" id="bike_inspection_pressure_plate" name="bike_inspection_pressure_plate" placeholder="Issue found please check" value="{{ $work->bike_inspection_pressure_plate ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_pressure_plate" name="bike_inspection_pressure_plate" placeholder="Pressure Plate" value="{{ $work->bike_inspection_pressure_plate ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_pressure_plate')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_engine_oil">Engine Oil</label>
                                @if ($work->bike_inspections->bike_inspection_engine_oil)
                                    <input type="number" class="form-control highlight" id="bike_inspection_engine_oil" name="bike_inspection_engine_oil" placeholder="Issue found please check" value="{{ $work->bike_inspection_engine_oil ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_engine_oil" name="bike_inspection_engine_oil" placeholder="Engine Oil" value="{{ $work->bike_inspection_engine_oil ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_engine_oil')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_air_filter">Air Filter</label>
                                @if ($work->bike_inspections->bike_inspection_air_filter)
                                    <input type="number" class="form-control highlight" id="bike_inspection_air_filter" name="bike_inspection_air_filter" placeholder="Issue found please check" value="{{ $work->bike_inspection_air_filter ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_air_filter" name="bike_inspection_air_filter" placeholder="Air Filter" value="{{ $work->bike_inspection_air_filter ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_air_filter')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_neutral_switch">Neutral Switch</label>
                                @if ($work->bike_inspections->bike_inspection_neutral_switch)
                                    <input type="number" class="form-control highlight" id="bike_inspection_neutral_switch" name="bike_inspection_neutral_switch" placeholder="Issue found please check" value="{{ $work->bike_inspection_neutral_switch ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_neutral_switch" name="bike_inspection_neutral_switch" placeholder="Neutral Switch" value="{{ $work->bike_inspection_neutral_switch ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_neutral_switch')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_inspection_spark_plug">Spark Plug</label>
                                @if ($work->bike_inspections->bike_inspection_spark_plug)
                                    <input type="number" class="form-control highlight" id="bike_inspection_spark_plug" name="bike_inspection_spark_plug" placeholder="Issue found please check" value="{{ $work->bike_inspection_spark_plug ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_spark_plug" name="bike_inspection_spark_plug" placeholder="Spark Plug" value="{{ $work->bike_inspection_spark_plug ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_spark_plug')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_inspection_timing_chain">Timing Chain</label>
                                @if ($work->bike_inspections->bike_inspection_timing_chain)
                                    <input type="number" class="form-control highlight" id="bike_inspection_timing_chain" name="bike_inspection_timing_chain" placeholder="Issue found please check" value="{{ $work->bike_inspection_timing_chain ?? '' }}">
                                @else
                                    <input type="number" class="form-control" id="bike_inspection_timing_chain" name="bike_inspection_timing_chain" placeholder="Timing Chain" value="{{ $work->bike_inspection_timing_chain ?? '' }}">
                                @endif
                                
                            </div>
                            @error('bike_inspection_timing_chain')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    

                    <div class="form-group row">
                        <label for="bike_inspection_tentioner">Tentioner</label>
                        @if ($work->bike_inspections->bike_inspection_tentioner)
                            <input type="number" class="form-control highlight" id="bike_inspection_tentioner" name="bike_inspection_tentioner" placeholder="Issue found please check" value="{{ $work->bike_inspection_tentioner ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_tentioner" name="bike_inspection_tentioner" placeholder="Tentioner" value="{{ $work->bike_inspection_tentioner ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_tentioner')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_primery_gear">Primary Gear</label>
                        @if ($work->bike_inspections->bike_inspection_primery_gear)
                            <input type="number" class="form-control highlight" id="bike_inspection_primery_gear" name="bike_inspection_primery_gear" placeholder="Issue found please check" value="{{ $work->bike_inspection_primery_gear ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_primery_gear" name="bike_inspection_primery_gear" placeholder="Primary Gear" value="{{ $work->bike_inspection_primery_gear ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_primery_gear')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

<center><h5>Inner Body - Mechanical & Electrical</h5></center>
                    
                    <div class="form-group row">
                        <label for="bike_inspection_chainset">Chainset</label>
                        @if ($work->bike_inspections->bike_inspection_chainset)
                            <input type="number" class="form-control highlight" id="bike_inspection_chainset" name="bike_inspection_chainset" placeholder="Issue found please check" value="{{ $work->bike_inspection_chainset ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_chainset" name="bike_inspection_chainset" placeholder="Chainset" value="{{ $work->bike_inspection_chainset ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_chainset')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_coneset">Coneset</label>
                        @if ($work->bike_inspections->bike_inspection_coneset)
                            <input type="number" class="form-control highlight" id="bike_inspection_coneset" name="bike_inspection_coneset" placeholder="Issue found please check" value="{{ $work->bike_inspection_coneset ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_coneset" name="bike_inspection_coneset" placeholder="Coneset" value="{{ $work->bike_inspection_coneset ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_coneset')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_lockset">Lockset</label>
                        @if ($work->bike_inspections->bike_inspection_lockset)
                            <input type="number" class="form-control highlight" id="bike_inspection_lockset" name="bike_inspection_lockset" placeholder="Issue found please check" value="{{ $work->bike_inspection_lockset ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_lockset" name="bike_inspection_lockset" placeholder="Lockset" value="{{ $work->bike_inspection_lockset ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_lockset')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_wheel_bearing">Wheel Bearing</label>
                        @if ($work->bike_inspections->bike_inspection_wheel_bearing)
                            <input type="number" class="form-control highlight" id="bike_inspection_wheel_bearing" name="bike_inspection_wheel_bearing" placeholder="Issue found please check" value="{{ $work->bike_inspection_wheel_bearing ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_wheel_bearing" name="bike_inspection_wheel_bearing" placeholder="Wheel Bearing" value="{{ $work->bike_inspection_wheel_bearing ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_wheel_bearing')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_accelerator_cable">Accelerator Cable</label>
                        @if ($work->bike_inspections->bike_inspection_accelerator_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_accelerator_cable" name="bike_inspection_accelerator_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_accelerator_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_accelerator_cable" name="bike_inspection_accelerator_cable" placeholder="Accelerator Cable" value="{{ $work->bike_inspection_accelerator_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_accelerator_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_brake_cable">Front Brake Cable</label>
                        @if ($work->bike_inspections->bike_inspection_front_brake_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_front_brake_cable" name="bike_inspection_front_brake_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_front_brake_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_front_brake_cable" name="bike_inspection_front_brake_cable" placeholder="Front Brake Cable" value="{{ $work->bike_inspection_front_brake_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_front_brake_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_back_brake_cable">Back Brake Cable</label>
                        @if ($work->bike_inspections->bike_inspection_back_brake_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_back_brake_cable" name="bike_inspection_back_brake_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_back_brake_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_back_brake_cable" name="bike_inspection_back_brake_cable" placeholder="Back Brake Cable" value="{{ $work->bike_inspection_back_brake_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_back_brake_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_chock_cable">Chock Cable</label>
                        @if ($work->bike_inspections->bike_inspection_chock_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_chock_cable" name="bike_inspection_chock_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_chock_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_chock_cable" name="bike_inspection_chock_cable" placeholder="Chock Cable" value="{{ $work->bike_inspection_chock_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_chock_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_clutch_cable">Clutch Cable</label>
                        @if ($work->bike_inspections->bike_inspection_clutch_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_clutch_cable" name="bike_inspection_clutch_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_clutch_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_clutch_cable" name="bike_inspection_clutch_cable" placeholder="Clutch Cable" value="{{ $work->bike_inspection_clutch_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_clutch_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_meter_cable">Meter Cable</label>
                        @if ($work->bike_inspections->bike_inspection_meter_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_meter_cable" name="bike_inspection_meter_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_meter_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_meter_cable" name="bike_inspection_meter_cable" placeholder="Meter Cable" value="{{ $work->bike_inspection_meter_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_meter_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_seat_lock_cable">Seat Lock Cable</label>
                        @if ($work->bike_inspections->bike_inspection_seat_lock_cable)
                            <input type="number" class="form-control highlight" id="bike_inspection_seat_lock_cable" name="bike_inspection_seat_lock_cable" placeholder="Issue found please check" value="{{ $work->bike_inspection_seat_lock_cable ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_seat_lock_cable" name="bike_inspection_seat_lock_cable" placeholder="Seat Lock Cable" value="{{ $work->bike_inspection_seat_lock_cable ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_seat_lock_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_handle_bar">Handle Bar</label>
                        @if ($work->bike_inspections->bike_inspection_handle_bar)
                            <input type="number" class="form-control highlight" id="bike_inspection_handle_bar" name="bike_inspection_handle_bar" placeholder="Issue found please check" value="{{ $work->bike_inspection_handle_bar ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_handle_bar" name="bike_inspection_handle_bar" placeholder="Handle Bar" value="{{ $work->bike_inspection_handle_bar ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_handle_bar')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_battery">Battery</label>
                        @if ($work->bike_inspections->bike_inspection_battery)
                            <input type="number" class="form-control highlight" id="bike_inspection_battery" name="bike_inspection_battery" placeholder="Issue found please check" value="{{ $work->bike_inspection_battery ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_battery" name="bike_inspection_battery" placeholder="Battery" value="{{ $work->bike_inspection_battery ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_battery')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rr_unit_regulator">RR Unit (Regulator)</label>
                        @if ($work->bike_inspections->bike_inspection_rr_unit_regulator)
                            <input type="number" class="form-control highlight" id="bike_inspection_rr_unit_regulator" name="bike_inspection_rr_unit_regulator" placeholder="Issue found please check" value="{{ $work->bike_inspection_rr_unit_regulator ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_rr_unit_regulator" name="bike_inspection_rr_unit_regulator" placeholder="RR Unit (Regulator)" value="{{ $work->bike_inspection_rr_unit_regulator ?? '' }}"> 
                        @endif
                        
                    </div>
                    @error('bike_inspection_rr_unit_regulator')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                    <div class="form-group row">
                        <label for="bike_inspection_head_light_assembly">Head Light Assembly</label>
                        @if ($work->bike_inspections->bike_inspection_head_light_assembly)
                            <input type="number" class="form-control highlight" id="bike_inspection_head_light_assembly" name="bike_inspection_head_light_assembly" placeholder="Issue found please check" value="{{ $work->bike_inspection_head_light_assembly ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_head_light_assembly" name="bike_inspection_head_light_assembly" placeholder="Head Light Assembly" value="{{ $work->bike_inspection_head_light_assembly ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_head_light_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_tall_light_assembly">Tall Light Assembly</label>
                        @if ($work->bike_inspections->bike_inspection_tall_light_assembly)
                            <input type="number" class="form-control highlight" id="bike_inspection_tall_light_assembly" name="bike_inspection_tall_light_assembly" placeholder="Issue found please check" value="{{ $work->bike_inspection_tall_light_assembly ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_tall_light_assembly" name="bike_inspection_tall_light_assembly" placeholder="Tall Light Assembly" value="{{ $work->bike_inspection_tall_light_assembly ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_tall_light_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_starter_motor">Starter Motor</label>
                        @if ($work->bike_inspections->bike_inspection_starter_motor)
                            <input type="number" class="form-control highlight" id="bike_inspection_starter_motor" name="bike_inspection_starter_motor" placeholder="Issue found please check" value="{{ $work->bike_inspection_starter_motor ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_starter_motor" name="bike_inspection_starter_motor" placeholder="Starter Motor" value="{{ $work->bike_inspection_starter_motor ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_starter_motor')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_cdi">CDI</label>
                        @if ($work->bike_inspections->bike_inspection_cdi)
                            <input type="number" class="form-control highlight" id="bike_inspection_cdi" name="bike_inspection_cdi" placeholder="Issue found please check" value="{{ $work->bike_inspection_cdi ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_cdi" name="bike_inspection_cdi" placeholder="CDI" value="{{ $work->bike_inspection_cdi ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_cdi')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_flasher">Flasher</label>
                        @if ($work->bike_inspections->bike_inspection_flasher)
                            <input type="number" class="form-control highlight" id="bike_inspection_flasher" name="bike_inspection_flasher" placeholder="Issue found please check" value="{{ $work->bike_inspection_flasher ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_flasher" name="bike_inspection_flasher" placeholder="Flasher" value="{{ $work->bike_inspection_flasher ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_flasher')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_left_hand_switch_assembly">Left Hand Switch Assembly</label>
                        @if ($work->bike_inspections->bike_inspection_left_hand_switch_assembly)
                            <input type="number" class="form-control highlight" id="bike_inspection_left_hand_switch_assembly" name="bike_inspection_left_hand_switch_assembly" placeholder="Issue found please check" value="{{ $work->bike_inspection_left_hand_switch_assembly ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_left_hand_switch_assembly" name="bike_inspection_left_hand_switch_assembly" placeholder="Left Hand Switch Assembly" value="{{ $work->bike_inspection_left_hand_switch_assembly ?? '' }}"> 
                        @endif
                        
                    </div>
                    @error('bike_inspection_left_hand_switch_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_right_hand_switch_assembly">Right Hand Switch Assembly</label>
                        @if ($work->bike_inspections->bike_inspection_right_hand_switch_assembly)
                            <input type="number" class="form-control highlight" id="bike_inspection_right_hand_switch_assembly" name="bike_inspection_right_hand_switch_assembly" placeholder="Issue found please check" value="{{ $work->bike_inspection_right_hand_switch_assembly ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_right_hand_switch_assembly" name="bike_inspection_right_hand_switch_assembly" placeholder="Right Hand Switch Assembly" value="{{ $work->bike_inspection_right_hand_switch_assembly ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_right_hand_switch_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_wiring_harness">Wiring Harness</label>
                        @if ($work->bike_inspections->bike_inspection_wiring_harness)
                            <input type="number" class="form-control highlight" id="bike_inspection_wiring_harness" name="bike_inspection_wiring_harness" placeholder="Issue found please check" value="{{ $work->bike_inspection_wiring_harness ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_wiring_harness" name="bike_inspection_wiring_harness" placeholder="Wiring Harness" value="{{ $work->bike_inspection_wiring_harness ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_wiring_harness')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_indicator">Front Indicator</label>
                        @if ($work->bike_inspections->bike_inspection_front_indicator)
                            <input type="number" class="form-control highlight" id="bike_inspection_front_indicator" name="bike_inspection_front_indicator" placeholder="Issue found please check" value="{{ $work->bike_inspection_front_indicator ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_front_indicator" name="bike_inspection_front_indicator" placeholder="Front Indicator" value="{{ $work->bike_inspection_front_indicator ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_front_indicator')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rear_indicator">Rear Indicator</label>
                        @if ($work->bike_inspections->bike_inspection_rear_indicator)
                            <input type="number" class="form-control highlight" id="bike_inspection_rear_indicator" name="bike_inspection_rear_indicator" placeholder="Issue found please check" value="{{ $work->bike_inspection_rear_indicator ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_rear_indicator" name="bike_inspection_rear_indicator" placeholder="Rear Indicator" value="{{ $work->bike_inspection_rear_indicator ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_rear_indicator')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_nose">Nose</label>
                        @if ($work->bike_inspections->bike_inspection_nose)
                            <input type="number" class="form-control highlight" id="bike_inspection_nose" name="bike_inspection_nose" placeholder="Issue found please check" value="{{ $work->bike_inspection_nose ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_nose" name="bike_inspection_nose" placeholder="Nose" value="{{ $work->bike_inspection_nose ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_nose')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_inner_visor">Visor</label>
                        @if ($work->bike_inspections->bike_inspection_inner_visor)
                            <input type="number" class="form-control highlight" id="bike_inspection_inner_visor" name="bike_inspection_inner_visor" placeholder="Issue found please check" value="{{ $work->bike_inspection_inner_visor ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_inner_visor" name="bike_inspection_inner_visor" placeholder="Visor" value="{{ $work->bike_inspection_inner_visor ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_inner_visor')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_floor_board">Floor Board</label>
                        @if ($work->bike_inspections->bike_inspection_floor_board)
                            <input type="number" class="form-control highlight" id="bike_inspection_floor_board" name="bike_inspection_floor_board" placeholder="Issue found please check" value="{{ $work->bike_inspection_floor_board ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_floor_board" name="bike_inspection_floor_board" placeholder="Floor Board" value="{{ $work->bike_inspection_floor_board ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_floor_board')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_inner_cover">Inner Cover</label>
                        @if ($work->bike_inspections->bike_inspection_inner_cover)
                            <input type="number" class="form-control highlight" id="bike_inspection_inner_cover" name="bike_inspection_inner_cover" placeholder="Issue found please check" value="{{ $work->bike_inspection_inner_cover ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_inner_cover" name="bike_inspection_inner_cover" placeholder="Inner Cover" value="{{ $work->bike_inspection_inner_cover ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_inner_cover')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_trim">Trim</label>
                        @if ($work->bike_inspections->bike_inspection_trim)
                            <input type="number" class="form-control highlight" id="bike_inspection_trim" name="bike_inspection_trim" placeholder="Issue found please check" value="{{ $work->bike_inspection_trim ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_trim" name="bike_inspection_trim" placeholder="Trim" value="{{ $work->bike_inspection_trim ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_trim')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_panel">Front Panel</label>
                        @if ($work->bike_inspections->bike_inspection_front_panel)
                            <input type="number" class="form-control highlight" id="bike_inspection_front_panel" name="bike_inspection_front_panel" placeholder="Issue found please check" value="{{ $work->bike_inspection_front_panel ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_front_panel" name="bike_inspection_front_panel" placeholder="Front Panel" value="{{ $work->bike_inspection_front_panel ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_front_panel')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rear_panel">Rear Panel</label>
                        @if ($work->bike_inspections->bike_inspection_rear_panel)
                            <input type="number" class="form-control highlight" id="bike_inspection_rear_panel" name="bike_inspection_rear_panel" placeholder="Issue found please check" value="{{ $work->bike_inspection_rear_panel ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_rear_panel" name="bike_inspection_rear_panel" placeholder="Rear Panel" value="{{ $work->bike_inspection_rear_panel ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_rear_panel')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_fender">Front Fender</label>
                        @if ($work->bike_inspections->bike_inspection_front_fender)
                            <input type="number" class="form-control highlight" id="bike_inspection_front_fender" name="bike_inspection_front_fender" placeholder="Issue found please check" value="{{ $work->bike_inspection_front_fender ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_front_fender" name="bike_inspection_front_fender" placeholder="Front Fender" value="{{ $work->bike_inspection_front_fender ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_front_fender')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rear_fender">Rear Fender</label>
                        @if ($work->bike_inspections->bike_inspection_rear_fender)
                            <input type="number" class="form-control highlight" id="bike_inspection_rear_fender" name="bike_inspection_rear_fender" placeholder="Issue found please check" value="{{ $work->bike_inspection_rear_fender ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_rear_fender" name="bike_inspection_rear_fender" placeholder="Rear Fender" value="{{ $work->bike_inspection_rear_fender ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_rear_fender')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    

                    <div class="form-group row">
                        <label for="bike_inspection_accident">Accident</label>
                        @if ($work->bike_inspections->bike_inspection_accident)
                            <input type="number" class="form-control highlight" id="bike_inspection_accident" name="bike_inspection_accident" placeholder="Issue found please check" value="{{ $work->bike_inspection_accident ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_accident" name="bike_inspection_accident" placeholder="Accident" value="{{ $work->bike_inspection_accident ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_accident')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_accident_remark">Accident Remark</label>
                        @if ($work->bike_inspections->bike_inspection_accident_remark)
                            <textarea class="form-control highlight" id="bike_inspection_accident_remark" name="bike_inspection_accident_remark" rows="3" placeholder="{{ optional($work->bike_inspections)->bike_inspection_accident_remark }}">{{ $work->bike_inspection_accident_remark ?? '' }}</textarea>
                        @else
                            <textarea class="form-control" id="bike_inspection_accident_remark" name="bike_inspection_accident_remark" rows="3" placeholder="{{ optional($work->bike_inspections)->bike_inspection_accident_remark }}">{{ $work->bike_inspection_accident_remark ?? '' }}</textarea>
                        @endif
                        
                    </div>
                    @error('bike_inspection_accident_remark')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    

                    <div class="form-group row">
                        <label for="bike_inspection_others_amount">Others Amount</label>
                        @if ($work->bike_inspections->bike_inspection_others_amount)
                            <input type="number" class="form-control highlight" id="bike_inspection_others_amount" name="bike_inspection_others_amount" placeholder="Issue found please check" value="{{ $work->bike_inspection_others_amount ?? '' }}">
                        @else
                            <input type="number" class="form-control" id="bike_inspection_others_amount" name="bike_inspection_others_amount" placeholder="Others Amount" value="{{ $work->bike_inspection_others_amount ?? '' }}">
                        @endif
                        
                    </div>
                    @error('bike_inspection_others_amount')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    {{-- Issue found please check --}}
                    <div class="form-group row">
                        <label for="bike_inspection_others_remarks">Others Remark</label>
                        @if ($work->bike_inspections->bike_inspection_others_remarks)
                            <textarea class="form-control highlight" id="bike_inspection_others_remarks" name="bike_inspection_others_remarks" rows="3" placeholder="{{ optional($work->bike_inspections)->bike_inspection_others_remarks }}">{{ $work->bike_inspection_others_remarks ?? '' }}</textarea>  
                        @else
                            <textarea class="form-control" id="bike_inspection_others_remarks" name="bike_inspection_others_remarks" rows="3" placeholder="Others Remark">{{ $work->bike_inspection_others_remarks ?? '' }}</textarea>
                        @endif
                        
                    </div>
                    @error('bike_inspection_others_remarks')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="workshop_work_remarks">My Remarks</label>
                        <textarea class="form-control" id="workshop_work_remarks" name="workshop_work_remarks" rows="3">{{ $work->workshop_work_remarks ?? '' }}</textarea>
                    </div>
                    @error('workshop_work_remarks')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="workshop_work_is_done">Work is done</label>
                        <select class="form-control" name="workshop_work_is_done" id="workshop_work_is_done">
                            <option value="">Please Select</option>
                            <option value="Yes" {{ $work->workshop_work_is_done=='Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $work->workshop_work_is_done=='No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    @error('workshop_work_is_done')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                </div>
            </div>
        </div>
        </div>
        @if ($work->workshop_work_is_done != 'Yes')
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success mr-2">Update Work</button></center> 
                </div>
            </form>
        @endif
        
    </div>
@endsection

@push('scripts')
  <script>
      var workshop_work_is_done = "{{ $work->workshop_work_is_done }}";
    //   console.log(workshop_work_is_done);
      if(workshop_work_is_done == 'Yes'){
        $('.form-control').prop('disabled',true);
        // $('textarea').prop('disabled',true);
        // $('select').prop('disabled',true);
      }
      $("#bike_inspection_accident").keyup(function(){
            var bike_inspection_accident = $('[name="bike_inspection_accident"]').val();
            if(bike_inspection_accident==''){
                $('#bike_inspection_accident_remark').prop('required',false);
            }else{
                $('#bike_inspection_accident_remark').prop('required',true);
            }
        });

        $("#bike_inspection_others_amount").keyup(function(){
            var bike_inspection_others_amount = $('[name="bike_inspection_others_amount"]').val();
            if(bike_inspection_others_amount==''){
                $('#bike_inspection_others_remarks').prop('required',false);
            }else{
                $('#bike_inspection_others_remarks').prop('required',true);
            }
        });
  
  </script>
@endpush
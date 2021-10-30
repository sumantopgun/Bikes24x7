@extends('collection_point.layout')
@section('title', 'Bike Inspection Details')
@push('style')
    <style>
        .form-control {
            pointer-events: none;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        {{-- <form method="POST" action="{{ route('collectionpoint.bike-buy.store ?? ''}}" >
        @csrf --}}
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- <input type="hidden" name="bike_buy_requests" id="bike_buy_requests" value="{{ $bike_buy_requests }}"> --}}

                            <center><h5>Body Work</h5></center>

                            <div class="form-group row">
                                <label for="bike_inspection_full_body_paint">Full Body Paint</label>
                                <input type="number" class="form-control" id="bike_inspection_full_body_paint" name="bike_inspection_full_body_paint" placeholder="Full Body Paint" value="{{ $inspection->bike_inspection_full_body_paint ?? '' }}">
                            </div>
                            @error('bike_inspection_full_body_paint')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_half_body_paint">Half Body Paint</label>
                                <input type="number" class="form-control" id="bike_inspection_half_body_paint" name="bike_inspection_half_body_paint" placeholder="Half Body Paint" value="{{ $inspection->bike_inspection_half_body_paint ?? '' }}">
                            </div>
                            @error('bike_inspection_half_body_paint')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_panel_scooty">Panel Scooty</label>
                                <input type="number" class="form-control" id="bike_inspection_panel_scooty" name="bike_inspection_panel_scooty" placeholder="Panel Scooty" value="{{ $inspection->bike_inspection_panel_scooty ?? '' }}">
                            </div>
                            @error('bike_inspection_panel_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_noise_scooty">Noise Scooty</label>
                                <input type="number" class="form-control" id="bike_inspection_noise_scooty" name="bike_inspection_noise_scooty" placeholder="Noise Scooty" value="{{ $inspection->bike_inspection_noise_scooty ?? '' }}">
                            </div>
                            @error('bike_inspection_noise_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_fender_scooty">Fender Scooty</label>
                                <input type="number" class="form-control" id="bike_inspection_fender_scooty" name="bike_inspection_fender_scooty" placeholder="Fender Scooty" value="{{ $inspection->bike_inspection_fender_scooty ?? ''}}">
                            </div>
                            @error('bike_inspection_fender_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_floor_trim_scooty">Floor Trim Scooty</label>
                                <input type="number" class="form-control" id="bike_inspection_floor_trim_scooty" name="bike_inspection_floor_trim_scooty" placeholder="Floor Trim Scooty" value="{{ $inspection->bike_inspection_floor_trim_scooty ?? ''}}">
                            </div>
                            @error('bike_inspection_floor_trim_scooty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_visor">Visor - Scooty / Bike</label>
                                <input type="number" class="form-control" id="bike_inspection_visor" name="bike_inspection_visor" placeholder="Visor - Scooty / Bike" value="{{ $inspection->bike_inspection_visor ?? ''}}">
                            </div>
                            @error('bike_inspection_visor')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_fuel_tank">Fuel Tank</label>
                                <input type="number" class="form-control" id="bike_inspection_fuel_tank" name="bike_inspection_fuel_tank" placeholder="Fuel Tank" value="{{ $inspection->bike_inspection_fuel_tank ?? ''}}">
                            </div>
                            @error('bike_inspection_fuel_tank')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_front_mudguard">Front Mudguard</label>
                                <input type="number" class="form-control" id="bike_inspection_front_mudguard" name="bike_inspection_front_mudguard" placeholder="Front Mudguard" value="{{ $inspection->bike_inspection_front_mudguard ?? ''}}">
                            </div>
                            @error('bike_inspection_front_mudguard')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            

                            <div class="form-group row">
                                <label for="bike_inspection_tail_cowl">Tail Cowl</label>
                                <input type="number" class="form-control" id="bike_inspection_tail_cowl" name="bike_inspection_tail_cowl" placeholder="Tail Cowl" value="{{ $inspection->bike_inspection_tail_cowl ?? ''}}">
                            </div>
                            @error('bike_inspection_tail_cowl')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_side_panel">Side Panel</label>
                                <input type="number" class="form-control" id="bike_inspection_side_panel" name="bike_inspection_side_panel" placeholder="Side Panel" value="{{ $inspection->bike_inspection_side_panel ?? ''}}">
                            </div>
                            @error('bike_inspection_side_panel')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_chassis_paint">Chassis Paint </label>
                                <input type="number" class="form-control" id="bike_inspection_chassis_paint" name="bike_inspection_chassis_paint" placeholder="Chassis Paint" value="{{ $inspection->bike_inspection_chassis_paint ?? ''}}">
                            </div>
                            @error('bike_inspection_chassis_paint')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_misc">Misc</label>
                                <input type="number" class="form-control" id="bike_inspection_misc" name="bike_inspection_misc" placeholder="Misc" value="{{ $inspection->bike_inspection_misc ?? ''}}">
                            </div>
                            @error('bike_inspection_misc')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_meter_repair">Meter Repair</label>
                                <input type="number" class="form-control" id="bike_inspection_meter_repair" name="bike_inspection_meter_repair" placeholder="Meter Repair" value="{{ $inspection->bike_inspection_meter_repair ?? ''}}">
                            </div>
                            @error('bike_inspection_meter_repair')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_shocker_repair">Shocker Repair</label>
                                <input type="number" class="form-control" id="bike_inspection_shocker_repair" name="bike_inspection_shocker_repair" placeholder="Shocker Repair" value="{{ $inspection->bike_inspection_shocker_repair ?? ''}}">
                            </div>
                            @error('bike_inspection_shocker_repair')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_key_making">Key Making</label>
                                <input type="number" class="form-control" id="bike_inspection_key_making" name="bike_inspection_key_making" placeholder="Key Making" value="{{ $inspection->bike_inspection_key_making ?? ''}}">
                            </div>
                            @error('bike_inspection_key_making')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_tyre_front">Front Tyre</label>
                                <input type="number" class="form-control" id="bike_inspection_tyre_front" name="bike_inspection_tyre_front" placeholder="Front Tyre" value="{{ $inspection->bike_inspection_tyre_front ?? ''}}">
                            </div>
                            @error('bike_inspection_tyre_front')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_tyre_rear">Rear Tyre</label>
                                <input type="number" class="form-control" id="bike_inspection_tyre_rear" name="bike_inspection_tyre_rear" placeholder="Rear Tyre" value="{{ $inspection->bike_inspection_tyre_rear ?? ''}}">
                            </div>
                            @error('bike_inspection_tyre_rear')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

<center><h5>Engine Parts</h5></center>

                            <div class="form-group row">
                                <label for="bike_inspection_cylinder_boring">Cylinder Boring</label>
                                <input type="number" class="form-control" id="bike_inspection_cylinder_boring" name="bike_inspection_cylinder_boring" placeholder="Cylinder Boring" value="{{ $inspection->bike_inspection_cylinder_boring ?? ''}}">
                            </div>
                            @error('bike_inspection_cylinder_boring')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve_grind">Valve Grind</label>
                                <input type="number" class="form-control" id="bike_inspection_valve_grind" name="bike_inspection_valve_grind" placeholder="Valve Grind" value="{{ $inspection->bike_inspection_valve_grind ?? ''}}">
                            </div>
                            @error('bike_inspection_valve_grind')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve_guide">Valve Guide</label>
                                <input type="number" class="form-control" id="bike_inspection_valve_guide" name="bike_inspection_valve_guide" placeholder="Valve Guide" value="{{ $inspection->bike_inspection_valve_guide ?? ''}}">
                            </div>
                            @error('bike_inspection_valve_guide')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_crank_repair">Crank Repair</label>
                                <input type="number" class="form-control" id="bike_inspection_crank_repair" name="bike_inspection_crank_repair" placeholder="Crank Repair" value="{{ $inspection->bike_inspection_crank_repair ?? ''}}">
                            </div>
                            @error('bike_inspection_crank_repair')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_crank_assembly">Crank Assembly</label>
                                <input type="number" class="form-control" id="bike_inspection_crank_assembly" name="bike_inspection_crank_assembly" placeholder="Crank Assembly" value="{{ $inspection->bike_inspection_crank_assembly ?? ''}}">
                            </div>
                            @error('bike_inspection_crank_assembly')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_piston">Piston</label>
                                <input type="number" class="form-control" id="bike_inspection_piston" name="bike_inspection_piston" placeholder="Piston" value="{{ $inspection->bike_inspection_piston ?? ''}}">
                            </div>
                            @error('bike_inspection_piston')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve">Valve</label>
                                <input type="number" class="form-control" id="bike_inspection_valve" name="bike_inspection_valve" placeholder="Valve" value="{{ $inspection->bike_inspection_valve ?? ''}}">
                            </div>
                            @error('bike_inspection_valve')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_valve_seal">Valve Seal</label>
                                <input type="number" class="form-control" id="bike_inspection_valve_seal" name="bike_inspection_valve_seal" placeholder="Valve Seal" value="{{ $inspection->bike_inspection_valve_seal ?? ''}}">
                            </div>
                            @error('bike_inspection_valve_seal')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_oil_seal">Oil Seal</label>
                                <input type="number" class="form-control" id="bike_inspection_oil_seal" name="bike_inspection_oil_seal" placeholder="Oil Seal" value="{{ $inspection->bike_inspection_oil_seal ?? ''}}">
                            </div>
                            @error('bike_inspection_oil_seal')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_plate">Clutch Plate</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_plate" name="bike_inspection_clutch_plate" placeholder="Clutch Plate" value="{{ $inspection->bike_inspection_clutch_plate ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_plate')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_bell">Clutch Bell</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_bell" name="bike_inspection_clutch_bell" placeholder="Clutch Bell" value="{{ $inspection->bike_inspection_clutch_bell ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_bell')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_roller">Clutch Roller</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_roller" name="bike_inspection_clutch_roller" placeholder="Clutch Roller" value="{{ $inspection->bike_inspection_clutch_roller ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_roller')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_pulley">Clutch Pulley</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_pulley" name="bike_inspection_clutch_pulley" placeholder="Clutch Pulley" value="{{ $inspection->bike_inspection_clutch_pulley ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_pulley')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_shoe">Clutch Shoe</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_shoe" name="bike_inspection_clutch_shoe" placeholder="Clutch Shoe" value="{{ $inspection->bike_inspection_clutch_shoe ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_shoe')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_assembly">Clutch Assembly</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_assembly" name="bike_inspection_clutch_assembly" placeholder="Clutch Assembly" value="{{ $inspection->bike_inspection_clutch_assembly ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_assembly')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_clutch_hub">Clutch Hub</label>
                                <input type="number" class="form-control" id="bike_inspection_clutch_hub" name="bike_inspection_clutch_hub" placeholder="Clutch Hub" value="{{ $inspection->bike_inspection_clutch_hub ?? ''}}">
                            </div>
                            @error('bike_inspection_clutch_hub')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_carburetor">Carburetor</label>
                                <input type="number" class="form-control" id="bike_inspection_carburetor" name="bike_inspection_carburetor" placeholder="Carburetor" value="{{ $inspection->bike_inspection_carburetor ?? ''}}">
                            </div>
                            @error('bike_inspection_carburetor')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_camshaft">Camshaft</label>
                                <input type="number" class="form-control" id="bike_inspection_camshaft" name="bike_inspection_camshaft" placeholder="Camshaft" value="{{ $inspection->bike_inspection_camshaft ?? ''}}">
                            </div>
                            @error('bike_inspection_camshaft')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_rocker">Rocker</label>
                                <input type="number" class="form-control" id="bike_inspection_rocker" name="bike_inspection_rocker" placeholder="Rocker" value="{{ $inspection->bike_inspection_rocker ?? ''}}">
                            </div>
                            @error('bike_inspection_rocker')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_pressure_plate">Pressure Plate</label>
                                <input type="number" class="form-control" id="bike_inspection_pressure_plate" name="bike_inspection_pressure_plate" placeholder="Pressure Plate" value="{{ $inspection->bike_inspection_pressure_plate ?? ''}}">
                            </div>
                            @error('bike_inspection_pressure_plate')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_engine_oil">Engine Oil</label>
                                <input type="number" class="form-control" id="bike_inspection_engine_oil" name="bike_inspection_engine_oil" placeholder="Engine Oil" value="{{ $inspection->bike_inspection_engine_oil ?? ''}}">
                            </div>
                            @error('bike_inspection_engine_oil')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_inspection_air_filter">Air Filter</label>
                                <input type="number" class="form-control" id="bike_inspection_air_filter" name="bike_inspection_air_filter" placeholder="Air Filter" value="{{ $inspection->bike_inspection_air_filter ?? ''}}">
                            </div>
                            @error('bike_inspection_air_filter')
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
                        <label for="bike_inspection_neutral_switch">Neutral Switch</label>
                        <input type="number" class="form-control" id="bike_inspection_neutral_switch" name="bike_inspection_neutral_switch" placeholder="Neutral Switch" value="{{ $inspection->bike_inspection_neutral_switch ?? ''}}">
                    </div>
                    @error('bike_inspection_neutral_switch')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_spark_plug">Spark Plug</label>
                        <input type="number" class="form-control" id="bike_inspection_spark_plug" name="bike_inspection_spark_plug" placeholder="Spark Plug" value="{{ $inspection->bike_inspection_spark_plug ?? ''}}">
                    </div>
                    @error('bike_inspection_spark_plug')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_timing_chain">Timing Chain</label>
                        <input type="number" class="form-control" id="bike_inspection_timing_chain" name="bike_inspection_timing_chain" placeholder="Timing Chain" value="{{ $inspection->bike_inspection_timing_chain ?? ''}}">
                    </div>
                    @error('bike_inspection_timing_chain')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_tentioner">Tentioner</label>
                        <input type="number" class="form-control" id="bike_inspection_tentioner" name="bike_inspection_tentioner" placeholder="Tentioner" value="{{ $inspection->bike_inspection_tentioner ?? ''}}">
                    </div>
                    @error('bike_inspection_tentioner')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_primery_gear">Primary Gear</label>
                        <input type="number" class="form-control" id="bike_inspection_primery_gear" name="bike_inspection_primery_gear" placeholder="Primary Gear" value="{{ $inspection->bike_inspection_primery_gear ?? ''}}">
                    </div>
                    @error('bike_inspection_primery_gear')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

<center><h5>Inner Body - Mechanical & Electrical</h5></center>
                    
                    <div class="form-group row">
                        <label for="bike_inspection_chainset">Chainset</label>
                        <input type="number" class="form-control" id="bike_inspection_chainset" name="bike_inspection_chainset" placeholder="Chainset" value="{{ $inspection->bike_inspection_chainset ?? ''}}">
                    </div>
                    @error('bike_inspection_chainset')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_coneset">Coneset</label>
                        <input type="number" class="form-control" id="bike_inspection_coneset" name="bike_inspection_coneset" placeholder="Coneset" value="{{ $inspection->bike_inspection_coneset ?? ''}}">
                    </div>
                    @error('bike_inspection_coneset')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_lockset">Lockset</label>
                        <input type="number" class="form-control" id="bike_inspection_lockset" name="bike_inspection_lockset" placeholder="Lockset" value="{{ $inspection->bike_inspection_lockset ?? ''}}">
                    </div>
                    @error('bike_inspection_lockset')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_wheel_bearing">Wheel Bearing</label>
                        <input type="number" class="form-control" id="bike_inspection_wheel_bearing" name="bike_inspection_wheel_bearing" placeholder="Wheel Bearing" value="{{ $inspection->bike_inspection_wheel_bearing ?? ''}}">
                    </div>
                    @error('bike_inspection_wheel_bearing')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_accelerator_cable">Accelerator Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_accelerator_cable" name="bike_inspection_accelerator_cable" placeholder="Accelerator Cable" value="{{ $inspection->bike_inspection_accelerator_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_accelerator_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_brake_cable">Front Brake Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_front_brake_cable" name="bike_inspection_front_brake_cable" placeholder="Front Brake Cable" value="{{ $inspection->bike_inspection_front_brake_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_front_brake_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_back_brake_cable">Back Brake Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_back_brake_cable" name="bike_inspection_back_brake_cable" placeholder="Back Brake Cable" value="{{ $inspection->bike_inspection_back_brake_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_back_brake_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_chock_cable">Chock Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_chock_cable" name="bike_inspection_chock_cable" placeholder="Chock Cable" value="{{ $inspection->bike_inspection_chock_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_chock_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_clutch_cable">Clutch Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_clutch_cable" name="bike_inspection_clutch_cable" placeholder="Clutch Cable" value="{{ $inspection->bike_inspection_clutch_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_clutch_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_meter_cable">Meter Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_meter_cable" name="bike_inspection_meter_cable" placeholder="Meter Cable" value="{{ $inspection->bike_inspection_meter_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_meter_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_seat_lock_cable">Seat Lock Cable</label>
                        <input type="number" class="form-control" id="bike_inspection_seat_lock_cable" name="bike_inspection_seat_lock_cable" placeholder="Seat Lock Cable" value="{{ $inspection->bike_inspection_seat_lock_cable ?? ''}}">
                    </div>
                    @error('bike_inspection_seat_lock_cable')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_handle_bar">Handle Bar</label>
                        <input type="number" class="form-control" id="bike_inspection_handle_bar" name="bike_inspection_handle_bar" placeholder="Handle Bar" value="{{ $inspection->bike_inspection_handle_bar ?? ''}}">
                    </div>
                    @error('bike_inspection_handle_bar')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_battery">Battery</label>
                        <input type="number" class="form-control" id="bike_inspection_battery" name="bike_inspection_battery" placeholder="Battery" value="{{ $inspection->bike_inspection_battery ?? ''}}">
                    </div>
                    @error('bike_inspection_battery')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rr_unit_regulator">RR Unit (Regulator)</label>
                        <input type="number" class="form-control" id="bike_inspection_rr_unit_regulator" name="bike_inspection_rr_unit_regulator" placeholder="RR Unit (Regulator)" value="{{ $inspection->bike_inspection_rr_unit_regulator ?? ''}}">
                    </div>
                    @error('bike_inspection_rr_unit_regulator')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                    <div class="form-group row">
                        <label for="bike_inspection_head_light_assembly">Head Light Assembly</label>
                        <input type="number" class="form-control" id="bike_inspection_head_light_assembly" name="bike_inspection_head_light_assembly" placeholder="Head Light Assembly" value="{{ $inspection->bike_inspection_head_light_assembly ?? ''}}">
                    </div>
                    @error('bike_inspection_head_light_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_tall_light_assembly">Tall Light Assembly</label>
                        <input type="number" class="form-control" id="bike_inspection_tall_light_assembly" name="bike_inspection_tall_light_assembly" placeholder="Tall Light Assembly" value="{{ $inspection->bike_inspection_tall_light_assembly ?? ''}}">
                    </div>
                    @error('bike_inspection_tall_light_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_starter_motor">Starter Motor</label>
                        <input type="number" class="form-control" id="bike_inspection_starter_motor" name="bike_inspection_starter_motor" placeholder="Starter Motor" value="{{ $inspection->bike_inspection_starter_motor ?? ''}}">
                    </div>
                    @error('bike_inspection_starter_motor')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_cdi">CDI</label>
                        <input type="number" class="form-control" id="bike_inspection_cdi" name="bike_inspection_cdi" placeholder="CDI" value="{{ $inspection->bike_inspection_cdi ?? ''}}">
                    </div>
                    @error('bike_inspection_cdi')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_flasher">Flasher</label>
                        <input type="number" class="form-control" id="bike_inspection_flasher" name="bike_inspection_flasher" placeholder="Flasher" value="{{ $inspection->bike_inspection_flasher ?? ''}}">
                    </div>
                    @error('bike_inspection_flasher')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_left_hand_switch_assembly">Left Hand Switch Assembly</label>
                        <input type="number" class="form-control" id="bike_inspection_left_hand_switch_assembly" name="bike_inspection_left_hand_switch_assembly" placeholder="Left Hand Switch Assembly" value="{{ $inspection->bike_inspection_left_hand_switch_assembly ?? ''}}">
                    </div>
                    @error('bike_inspection_left_hand_switch_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_right_hand_switch_assembly">Right Hand Switch Assembly</label>
                        <input type="number" class="form-control" id="bike_inspection_right_hand_switch_assembly" name="bike_inspection_right_hand_switch_assembly" placeholder="Right Hand Switch Assembly" value="{{ $inspection->bike_inspection_right_hand_switch_assembly ?? ''}}">
                    </div>
                    @error('bike_inspection_right_hand_switch_assembly')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_wiring_harness">Wiring Harness</label>
                        <input type="number" class="form-control" id="bike_inspection_wiring_harness" name="bike_inspection_wiring_harness" placeholder="Wiring Harness" value="{{ $inspection->bike_inspection_wiring_harness ?? ''}}">
                    </div>
                    @error('bike_inspection_wiring_harness')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_indicator">Front Indicator</label>
                        <input type="number" class="form-control" id="bike_inspection_front_indicator" name="bike_inspection_front_indicator" placeholder="Front Indicator" value="{{ $inspection->bike_inspection_front_indicator ?? ''}}">
                    </div>
                    @error('bike_inspection_front_indicator')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rear_indicator">Rear Indicator</label>
                        <input type="number" class="form-control" id="bike_inspection_rear_indicator" name="bike_inspection_rear_indicator" placeholder="Rear Indicator" value="{{ $inspection->bike_inspection_rear_indicator ?? ''}}">
                    </div>
                    @error('bike_inspection_rear_indicator')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_nose">Nose</label>
                        <input type="number" class="form-control" id="bike_inspection_nose" name="bike_inspection_nose" placeholder="Nose" value="{{ $inspection->bike_inspection_nose ?? ''}}">
                    </div>
                    @error('bike_inspection_nose')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_inner_visor">Visor</label>
                        <input type="number" class="form-control" id="bike_inspection_inner_visor" name="bike_inspection_inner_visor" placeholder="Visor" value="{{ $inspection->bike_inspection_inner_visor ?? ''}}">
                    </div>
                    @error('bike_inspection_inner_visor')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_floor_board">Floor Board</label>
                        <input type="number" class="form-control" id="bike_inspection_floor_board" name="bike_inspection_floor_board" placeholder="Floor Board" value="{{ $inspection->bike_inspection_floor_board ?? ''}}">
                    </div>
                    @error('bike_inspection_floor_board')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_inner_cover">Inner Cover</label>
                        <input type="number" class="form-control" id="bike_inspection_inner_cover" name="bike_inspection_inner_cover" placeholder="Inner Cover" value="{{ $inspection->bike_inspection_inner_cover ?? ''}}">
                    </div>
                    @error('bike_inspection_inner_cover')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_trim">Trim</label>
                        <input type="number" class="form-control" id="bike_inspection_trim" name="bike_inspection_trim" placeholder="Trim" value="{{ $inspection->bike_inspection_trim ?? ''}}">
                    </div>
                    @error('bike_inspection_trim')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_panel">Front Panel</label>
                        <input type="number" class="form-control" id="bike_inspection_front_panel" name="bike_inspection_front_panel" placeholder="Front Panel" value="{{ $inspection->bike_inspection_front_panel ?? ''}}">
                    </div>
                    @error('bike_inspection_front_panel')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rear_panel">Rear Panel</label>
                        <input type="number" class="form-control" id="bike_inspection_rear_panel" name="bike_inspection_rear_panel" placeholder="Rear Panel" value="{{ $inspection->bike_inspection_rear_panel ?? ''}}">
                    </div>
                    @error('bike_inspection_rear_panel')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_front_fender">Front Fender</label>
                        <input type="number" class="form-control" id="bike_inspection_front_fender" name="bike_inspection_front_fender" placeholder="Front Fender" value="{{ $inspection->bike_inspection_front_fender ?? ''}}">
                    </div>
                    @error('bike_inspection_front_fender')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_rear_fender">Rear Fender</label>
                        <input type="number" class="form-control" id="bike_inspection_rear_fender" name="bike_inspection_rear_fender" placeholder="Rear Fender" value="{{ $inspection->bike_inspection_rear_fender ?? ''}}">
                    </div>
                    @error('bike_inspection_rear_fender')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_accident_remark">Accident Remark</label>
                        <textarea class="form-control" id="bike_inspection_accident_remark" name="bike_inspection_accident_remark" rows="3"></textarea>
                    </div>
                    @error('bike_inspection_accident_remark')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_accident">Accident</label>
                        <input type="number" class="form-control" id="bike_inspection_accident" name="bike_inspection_accident" placeholder="Accident" value="{{ $inspection->bike_inspection_accident ?? ''}}">
                    </div>
                    @error('bike_inspection_accident')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_others_remarks">Others Remark</label>
                        <textarea class="form-control" id="bike_inspection_others_remarks" name="bike_inspection_others_remarks" rows="3"></textarea>
                    </div>
                    @error('bike_inspection_others_remarks')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_inspection_others_amount">Others Amount</label>
                        <input type="number" class="form-control" id="bike_inspection_others_amount" name="bike_inspection_others_amount" placeholder="Others Amount" value="{{ $inspection->bike_inspection_others_amount ?? ''}}">
                    </div>
                    @error('bike_inspection_others_amount')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                </div>
            </div>
        </div>
        </div>
        <div class="form-group">
            <center><a href="{{ URL::previous() }}" type="button" class="btn btn-success mr-2">Back</a></center> 
         </div>
        {{-- <div class="form-group">
           <center><button type="submit" class="btn btn-success mr-2">Submit</button></center> 
        </div>
    </form> --}}
    </div>
@endsection

@push('scripts')
  
@endpush
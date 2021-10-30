@extends('admin.layout')
@section('title', 'City Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit City</h4>
                    <form method="POST" class="forms-sample" action="{{ route('admin.city.update', $city->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="city_name">City</label>
                            <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $city->city_name }}" required>
                        </div>
                        @error('city_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="city_state">State</label>
                            <input type="text" class="form-control" id="city_state" name="city_state" value="{{ $city->city_state }}" required>
                        </div>
                        @error('city_state')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror

                        {{-- <div class="form-group">
                            <label for="city_state">State</label>
                            <select class="form-control" id="stateSelect" size="1" onchange="makeSubmenu(this.value)" name="city_state" required>
                                <option value="Maharashtra" {{ $city->city_state=='Maharashtra' ? 'selected' : ''}}>Maharashtra</option>
                                <option value="Odisha" {{ $city->city_state=='Odisha' ? 'selected' : ''}}>Odisha</option>
                                <option value="Kerala" {{ $city->city_state=='Kerala' ? 'selected' : ''}}>Kerala</option>
                            </select>
                        </div>
                        @error('city_state')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror --}}
                        
                        {{-- <div class="form-group">
                            <label for="city_name">City</label>
                            <select class="form-control" id="citySelect" size="1" name="city_name" required>
                                <option value="" disabled selected>Choose City</option>
                            </select>
                        </div>
                        @error('city_name')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror --}}

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
    {{-- <script>
        $(document).ready(function () {
            var currentState = $("#stateSelect").val();
            console.log(currentState);
            if(currentState.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for(cityId in citiesByState[currentState]) {
                    citiesOptions+="<option value="+citiesByState[currentState][cityId]+" >"+citiesByState[currentState][cityId]+"</option>";
                }
                document.getElementById("citySelect").innerHTML = citiesOptions;
            }
        });
    </script>
    <script type="text/javascript">
        var citiesByState = {
            Odisha: ["Bhubaneswar","Puri","Cuttack"],
            Maharashtra: ["Mumbai","Pune","Nagpur","Thane","Nashik","Kalyan-Dombivli","Vasai-Virar City MC","Aurangabad","Navi Mumbai","Solapur","Mira-Bhayandar","Latur","Amravati","Nanded Waghala","Kolhapur","Akola","Panvel","Ulhasnagar","Sangli-Miraj-Kupwad","Malegaon","Jalgaon","Dule","Bhivandi-Nizampur","Ahmednagar","Chandrapur","Parbhani","Ichalkaranji","Jalna","Ambarnath","Bhusawal","Ratnagiri","Beed","Gondia","Satara","Barshi","Yavatmal","Achalpur","Osmanabad","Nandurbar","Wardha","Udgir","Hinganghat"],
            Kerala: ["kochi","Kanpur"]
        }

        function makeSubmenu(value) {
            if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for(cityId in citiesByState[value]) {
                    citiesOptions+="<option value="+citiesByState[value][cityId]+">"+citiesByState[value][cityId]+"</option>";
                }
                document.getElementById("citySelect").innerHTML = citiesOptions;
            }
        }
    </script> --}}
@endpush
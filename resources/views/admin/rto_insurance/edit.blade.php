@extends('admin.layout')
@section('title', 'RTO Insurance Fees Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit RTO Insurance Fees</h4>
                    <form method="POST" class="forms-sample" action="{{ route('admin.rto-insurance-fees.update', $rtoInsuranceFee->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="insurance_fees_wheeler">Wheeler Type</label>
                            <select class="form-control" name="insurance_fees_wheeler" required>
                                <option value="">Vehicle Type</option>
                                <option value="two_wheelers" {{ $rtoInsuranceFee->insurance_fees_wheeler=='two_wheelers' ? 'selected' : ''}}>Two Wheelers</option>
                                <option value="four_wheelers" {{ $rtoInsuranceFee->insurance_fees_wheeler=='four_wheelers' ? 'selected' : ''}}>Four Wheelers</option>
                            </select>
                        </div>
                        @error('insurance_fees_wheeler')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Is CNG</label>
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="insurance_fees_is_cng" id="membershipRadios1" value="1"  {{ $rtoInsuranceFee->insurance_fees_is_cng=='1' ? 'checked' : ''}}>
                                Yes
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="insurance_fees_is_cng" id="membershipRadios2" value="0" {{ $rtoInsuranceFee->insurance_fees_is_cng=='0' ? 'checked' : ''}}>
                                No
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group" id="insuranceFeesShow" style="display:none;">
                            <label for="insurance_fees_cng_fees">CNG Fees</label>
                            <input type="number" class="form-control" id="insurance_fees_cng_fees" name="insurance_fees_cng_fees" value="{{ $rtoInsuranceFee->insurance_fees_cng_fees }}" placeholder="CNG Fees">
                        </div>
                        @error('insurance_fees_cng_fees')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="insurance_fees_cc_from">Wheeler CC From</label>
                            <input type="number" class="form-control" id="insurance_fees_cc_from" name="insurance_fees_cc_from" value="{{ $rtoInsuranceFee->insurance_fees_cc_from }}" placeholder="Wheeler CC From" required>
                        </div>
                        @error('insurance_fees_cc_from')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="insurance_fees_cc_to">Wheeler CC To</label>
                            <input type="number" class="form-control" id="insurance_fees_cc_to" name="insurance_fees_cc_to" value="{{ $rtoInsuranceFee->insurance_fees_cc_to }}" placeholder="Wheeler CC To" required>
                        </div>
                        @error('insurance_fees_cc_to')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="insurance_fees_amount">Fees Amount</label>
                            <input type="number" class="form-control" id="insurance_fees_amount" name="insurance_fees_amount" value="{{ $rtoInsuranceFee->insurance_fees_amount }}" placeholder="Fees Amount" required>
                        </div>
                        @error('insurance_fees_amount')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="insurance_fees_total_amount">Fees Total Amount</label>
                            <input type="number" class="form-control" id="insurance_fees_total_amount" name="insurance_fees_total_amount" value="{{ $rtoInsuranceFee->insurance_fees_total_amount }}" placeholder="Fees Total Amount" required>
                        </div>
                        @error('insurance_fees_total_amount')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            var IsCNG = $('input[name="insurance_fees_is_cng"]:checked').val();
            // console.log(IsCNG);
            if (IsCNG == '1') {
                $('#insuranceFeesShow').show();
                $('#insurance_fees_cng_fees').prop('required',true);
            } else {
                $('#insuranceFeesShow').hide();
                $('#insurance_fees_cng_fees').prop('required',false);                   
            }
        });
    </script>
    <script>
        $(function(){
            $("input:radio[name='insurance_fees_is_cng']").change(function(){
                var IsCNG = $(this).val();
                console.log(IsCNG);
                if (IsCNG == '1') {
                    $('#insuranceFeesShow').show();
                    $('#insurance_fees_cng_fees').prop('required',true);
                } else {
                    $('#insuranceFeesShow').hide();
                    $('#insurance_fees_cng_fees').prop('required',false);                   
                }
            });
        });
    </script>
@endpush
@extends('superadmin.layout')
@section('title', 'Offer Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Offer</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.offers.update', $offer->id ) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="offer_name">Offer Name</label>
                            <input type="text" class="form-control" id="offer_name" name="offer_name" value="{{ $offer->offer_name }}" placeholder="Offer Name" required>
                        </div>
                        @error('offer_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label for="offer_type">Offer Type</label>
                            <select class="form-control" name="offer_type" required>
                                <option value="">Select Type</option>
                                <option value="percentage" {{ $offer->offer_type=='percentage' ? 'selected' : ''}}>Percentage</option>
                                <option value="fixed" {{ $offer->offer_type=='fixed' ? 'selected' : ''}}>Fixed</option>
                            </select>
                        </div>
                        @error('offer_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="offer_amount">Amount</label>
                            <input type="number" class="form-control" id="offer_amount" name="offer_amount" value="{{ $offer->offer_amount }}" placeholder="Amount" required>
                        </div>
                        @error('offer_amount')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="offer_start_date">Start Date</label>
                            <input type="date" class="form-control form-control-sm" data-inputmask="'alias': 'date'" name="offer_start_date" id="offer_start_date" value="{{ $offer->offer_start_date }}">
                        </div>
                        @error('offer_start_date')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label for="offer_end_date">End Date</label>
                            <input type="date" class="form-control form-control-sm" data-inputmask="'alias': 'date'" name="offer_end_date" id="offer_end_date" value="{{ $offer->offer_end_date }}">
                        </div>
                        @error('offer_end_date')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror                        

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<div class="col-sm-1">
    <p class="text-dark">
        <b>
            <strong>Filters:</strong>
        </b>
    </p>
</div>
<div class="col-sm-3 end-date">
    <p class="text-dark">
        <strong>Date From:</strong>
    </p>
    <div class="input-group date d-flex">
        <input type="date" class="form-control @error('start') is-invalid @enderror" name="start" id="datepickerFrom"
            value="{{ old('start', $start ?? '') }}" placeholder="dd-mm-yyyy">
        @error('start')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>                                    
</div>
<div class="col-sm-3 end-date">
    <p class="text-dark">
        <strong>Date To:</strong>
    </p>
    <div class="input-group date d-flex">
        <input type="date" class="form-control @error('end') is-invalid @enderror" name="end" id="datepickerTo"
            value="{{ old('end', $end ?? '') }}" placeholder="dd-mm-yyyy">
        @error('end')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-1 text-end" style="margin-left: 10px; margin-top: 47px;">
    <button class="btn text-white shadow-lg" type="submit"
        style="background-color:#033496;">Filter</button>
</div>
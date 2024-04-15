<div class="form-group {{$errors->has('region_id')}}">
    <label>Region:</label>
    {{html()->select('region_id', $regions)->class('form-control')}}
    {{$errors->first('region_id')}}
</div>
<div class="form-group {{$errors->has('province_id')}}">
    <label>Province:</label>
    {{html()->select('province_id')->class('form-control')}}
    {{$errors->first('province_id')}}
</div>
<div class="form-group {{$errors->has('city_id')}}">
    <label>City:</label>
    {{html()->select('city_id')->class('form-control')}}
    {{$errors->first('city_id')}}
</div>
<div class="form-group {{$errors->has('barangay_id')}}">
    <label>Barangay:</label>
    {{html()->select('barangay_id')->class('form-control')}}
    {{$errors->first('barangay_id')}}
</div>
<div class="form-group {{$errors->has('street')}}">
    <label>Street:</label>
    {{html()->text('street')->class('form-control')}}
    {{$errors->first('street')}}
</div>

@push('scripts')
    <script>
        $(function () {
            var address = {
                province: '{{old('province_id', $model->province_id)}}',
                city: '{{old('city_id', $model->city_id)}}',
                barangay: '{{old('barangay_id', $model->barangay_id)}}',
            };

            $('#region_id').on('change', function () {
                $.getJSON('{{config('address.prefix')}}/provinces/' + this.value, function (data) {
                    var options = '';
                    $.each(data, function (index, data) {
                        var selected = '';
                        if (data.province_id == address.province) {
                            selected = ' selected ';
                        }
                        options += '<option value="' + data.province_id + '"' + selected + '>' + data.name + '</option>';
                    });
                    $('#province_id').html(options);
                    $('#province_id').change();
                });
            });

            $('#province_id').on('change', function () {
                $.getJSON('{{config('address.prefix')}}/cities/' + this.value, function (data) {
                    var options = '';
                    $.each(data, function (index, data) {
                        var selected = '';
                        if (data.city_id == address.city) {
                            selected = ' selected ';
                        }
                        options += '<option value="' + data.city_id + '"' + selected + '>' + data.name + '</option>';
                    });
                    $('#city_id').html(options);
                    $('#city_id').change();
                });
            });

            $('#city_id').on('change', function () {
                $.getJSON('{{config('address.prefix')}}/barangays/' + this.value, function (data) {
                    var options = '';
                    $.each(data, function (index, data) {
                        var selected = '';
                        if (data.code == address.barangay) {
                            selected = ' selected ';
                        }
                        options += '<option value="' + data.code + '"' + selected + '>' + data.name + '</option>';
                    });
                    $('#barangay_id').html(options);
                    $('#barangay_id').change();
                });
            });

            $('#region_id').change();
        });
    </script>
@endpush

@extends('layouts.app')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <label for="Department">Department</label>

                        <select class="form-select" id="dpt_id" name="dpt_id" aria-label="Default select example">
                            <option selected value="">Open this select menu</option>
                            @foreach ($dt as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>

                            @endforeach

                        </select>

                        <label class="mt-4" for="Doctor"> Doctor</label>

                        <select class="form-select" name="doc_id" aria-label="Default select example">
                            <option selected value="">Open this select menu</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <img class="loader" src="{{ URL::to('asset/Ajax-loader.gif') }}" height="25px" width="25px">


                </div>
            </div>
        </div>
    </div>

    <style>

    </style>

    <script>
        $(document).ready(function() {
            var loader = $('.loader'),
                dept = $('select[name="dpt_id"]'),
                doc = $('select[name="doc_id"]');
            loader.hide();
            doc.attr('disabled', 'disabled');

            dept.change(function() {

                var id = $(this).val();
                if (id) {
                    loader.show();
                    doc.attr('disabled', 'disabled');

                    $.get('{{url('/department?dpt_id=') }}'+id)
                    .then(function(data){

                        var s='<option value="">--select--</option>';
                       data.forEach(function(row){
                             s+='<option value="'+row.id+'">'+row.name+'</option>'

                       })
                        doc.removeAttr('disabled');
                        doc.html(s);
                        loader.hide();
                    })
                }
            })

        });
    </script>
@endsection

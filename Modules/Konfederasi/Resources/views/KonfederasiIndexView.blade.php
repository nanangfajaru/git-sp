@extends('layouts.layouts')

@section('content')        

@if(Session::has('alert'))
            <div class="alert bg-danger">
                <a class="close" data-dismiss="alert">&times;</a>
                <span> <b>{{Session::get('alert')}}  </b></span>
            </div>
 @endif

@if(Session::has('notif'))
    {{-- <div class="alert bg-teal-400">
        <a class="close" data-dismiss="alert">&times;</a>
        <span> <b>{{Session::get('notif')}}  </b></span>
    </div> --}}
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() { 
                var notif = '{{Session::get('notif')}}';
                toastrAlert(notif); 
            });
        </script>
    @endpush
@endif

{{-- <div class="card">
    <div class="card-header header-elements-inline" data-toggle="collapse" href="#accordion-item-default2">
        <h6 class="card-title"><i class="icon-filter3 mr-2"></i> Filter </h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
            </div>
        </div>
    </div>

    <div id="accordion-item-default2" class="collapse" data-parent="#accordion-default">
    
        <form action="{{ route('konfederasi.export') }}" method="post">
            {{csrf_field()}}    
            <div class="card-body">
                <div class="row"> 
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label> Dari Tanggal </label>
                                    <input type="text" class="form-control" placeholder="Choose Date" name="tanggal_mulai" autocomplete="off" value="" id="tanggal_mulai">
                                    <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label>Sampai Tanggal</label>
                                    <input type="text" class="form-control" placeholder="Choose Date" name="tanggal_selesai" autocomplete="off" value="" id="tanggal_selesai">
                                    <span class="text-danger"></span>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-12">                    
                        <div class="form-group row mb-0">
                            <div class="col-lg-10 ml-lg-auto">
                                <button type="submit" class="btn btn-sm bg-teal-400">Excel <i class="icon-file-excel ml-2"></i></button>
                                <button type="button" id="btnFilter" class="btn btn-sm bg-teal-400">Filter <i class="icon-filter3 ml-2"></i></button>
                            </div>
                        </div>                    
                    </div>                
                </div>
            </div>
        </form>
    
    </div>
</div> --}}

<div class="card">
    <div class="card-header header-elements-inline">
        {{-- <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-bookmark2 mr-2"></i> Pengajuan konfederasi
            <div class="pull-right">
                     <a href="{{ route('konfederasi.create') }}" class="btn btn-sm bg-teal-400">ADD <i class="icon-plus-circle2 ml-2"></i></a>
            </div>
        </legend> --}}
        <div class="header-elements">
            <div class="list-icons">
             {{--    <a href="{{ route('konfederasi.create') }}" class="btn btn-sm bg-teal-400">
                    <i class="icon-plus-circle2"></i>   
                    &nbsp;ADD
                </a> --}}
            </div>
        </div>
    </div>

    <table class="table" id="TableId">
        <thead>
            <tr>
                <th>No</th>
                <th>Konfederasi</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Proses</th>                
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
  <script src="{{asset('template/global_assets/js/plugins/ui/moment/moment.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/daterangepicker.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/anytime.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/picker.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/picker.date.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/picker.time.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/legacy.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/jquery-ui.js ')}}"></script>

  <script src="{{asset('template/global_assets/js/demo_pages/picker_date.js')}}"></script>
  <script src="{{asset('template/global_assets/js/demo_pages/datatables_basic.js')}}"></script>
<script>
  $(function() {
    var dateToday = new Date();
    var dates = $("#tanggal_mulai, #tanggal_selesai").datepicker({
        // changeMonth: true,
        dateFormat:"yy-mm-dd",
        numberOfMonths: 1,
        // minDate: dateToday,
        onSelect: function(selectedDate) {
            var option = this.id == "tanggal_mulai" ? "minDate" : "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });
  });
</script>

<script>
    $(document).ready(function() { 
        $('#TableId').DataTable({
            serverSide: true,
            processing: true,
            pageLength: 5,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

            ajax: {
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('konfederasi.api') }}",
                type: "POST"
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'serikat_pekerja_desc'},
                    {data: 'alamat'},
                    {data: 'status', orderable: false, searchable: false},
                    {data: 'kirim', orderable: false, searchable: false},
                    {data: 'action', orderable: false, searchable: false}
                ],
            columnDefs: [
             {
                  "targets": 0,
                  "width": "5%"
             },
             {
                  "targets": 1,
                  "width": "20%"
             },
             {
                  "targets": 2,
                  "width": "auto"
             },
             {
                  "targets": 3,
                  "width": "3%",
                  "className": 'text-center'
             },
             {
                  "targets": 4,
                  "width": "3%",
                  "className": 'text-center'
             },
             {
                  "targets": 5,
                  "width": "3%",
                  "className": 'text-center'
             },
             ]            
        });
    });

    

    $(document).ready(function() { 
        $('#btn_refresh').on("click", function(){        
            reload_table();
        });
    });

    function reload_table()
    {
        var table = $('#TableId').DataTable();
        table.ajax.reload();
    }

</script>
@endpush

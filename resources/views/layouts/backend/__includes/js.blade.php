<script>
    fetch("{{ route('assets.lang') }}").then(response => {
        return response.json();
    }).then(data => {
        translations = data;
    });
    window.translations = {
        default: {
            label: {
                please_wait: "{{ __('default.label.please_wait') }}"
            }
        }
    };
</script>

<script>
    var this_url = "{{ URL::Current() }}";
    var active = "{{ !empty($active) && $active == 'true' ? 'true' : '' }}";
    var date = "{{ !empty($date) && $date == 'true' ? 'true' : '' }}";
    var datetime = "{{ !empty($datetime) && $datetime == 'true' ? 'true' : '' }}";
    var daterange = "{{ !empty($daterange) && $daterange == 'true' ? 'true' : '' }}";
    var file = "{{ !empty($file) && $file == 'true' ? 'true' : '' }}";
    var status = "{{ !empty($status) && $status == 'true' ? 'true' : '' }}";
    var extensions = "{{ !empty($extension) && $extension == 'management-users' ? 'management-users' : '' }}";
    var sort = "{{ !empty($sort) && $sort > 0 ? $sort : '1, desc' }}";
    window.tableBodyColumns = [
        @yield('table-body')
    ];
</script>

<script src="{{ env('APP_URL') }}/assets/backend/mix/js/app.js"></script>
@stack('js')

@if ($message = Session::get('success'))
<script>
    toastr.success('{{ $message }}');
</script>
@endif
@if ($message = Session::get('error'))
<script>
    toastr.error('{{ $message }}');
</script>
@endif
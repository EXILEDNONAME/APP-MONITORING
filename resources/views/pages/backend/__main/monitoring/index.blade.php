@extends('layouts.backend.__templates.custom-monitoring', [])
@section('title', 'Monitorings')

@section('table-header')
<th> Status </th>
<th> Name </th>
<th> IP Address </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'status_device' }, 
{ data: 'name' }, 
{ data: 'ip_address', 'className': 'ip-address-cell', }, 
{ data: 'description' }, 
@endsection

@push('js')
<script>
function getAllIpsFromTable() {
    const ips = [];
    $('#exilednoname_table tbody tr').each(function() {
        const ip = $(this).find('.ip-address-cell').text().trim();
        if (ip) ips.push(ip);
    });
    return ips;
}

async function pingAllIps() {
    const ips = getAllIpsFromTable();
    if (!ips.length) return;

    try {
        const response = await fetch('/ping-check-batch', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ ips })
        });

        const results = await response.json();

        // Update kolom status di tabel
        $('#exilednoname_table tbody tr').each(function() {
            const ip = $(this).find('.ip-address-cell').text().trim();
            const statusCell = $(this).find('.status-device-cell');
            if (results[ip]) {
                let badgeClass = results[ip] === 'online' ? 'badge bg-success' : 'badge bg-danger';
    statusCell.html(`<span class="${badgeClass}">${results[ip].toUpperCase()}</span>`);
            }
        });
    } catch (e) {
        console.error("Ping error:", e);
    }
}

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
  }
});

setInterval(() => {
  pingAllIps();
}, 5000);
</script>


@endpush
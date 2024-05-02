@php
$color = $color ?? '#9055FD';
@endphp
<span style="color:{{ $color }};">
  <svg height="90" viewBox="0 0 160 90" width="160" fill="none">
    <image xlink:href="{{ asset('assets/img/icons/brands/logop2.png') }}" width="100%" height="100%" />
  </svg>
</span>

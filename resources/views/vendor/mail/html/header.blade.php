@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="https://teams.cyberexpertgh.org/img/logo2.png" class="logo">
{{-- @else
{{ $slot }}
@endif --}}
</a>
</td>
</tr>

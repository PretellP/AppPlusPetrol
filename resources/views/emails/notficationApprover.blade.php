@component('mail::message')
# Estimado: 

Nos contactamos con usted, para informarle que se ha generado la siguiente Guía para su aprobación:
<br><br>
N° Guía: <br>
<a href="{{route('approverGuides.show', $guide)}}"> {{$guide->code}} </a>
<br><br>
Le recordamos que en todo momento podrá revisar las Guías Aprobadas desde el siguiente link:
<br><br>
@component('mail::panel')
<a href="{{route('approvingApprovedGuides.index')}}">{{route('approvingApprovedGuides.index')}}</a>
@endcomponent
<br>
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Saludos,<br>
SIGRE-Malvinas
@endcomponent

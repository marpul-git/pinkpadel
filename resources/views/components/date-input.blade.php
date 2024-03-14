
@php
    $classes = "mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
@endphp
<div>
    <label for="source-date" class="block mt-2 text-lg font-medium text-gray-800">{{ $slot }}</label>
    <input type="date" name="date_input" id="date_input"  value="{{$value}}" 
    {{$attributes->merge(['class' => $classes])}}>
       
</div>

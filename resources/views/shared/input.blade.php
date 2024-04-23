@php
    $type ??='text';
    $value ??='';
    $name ??='';
    $class ??=null;
    $label ??=ucfirst($name);
@endphp
<label @class(['block font-medium text-sm text-gray-700 dark:text-gray-300 py-3',$class]) for="{{$name}}">{{$label}}</label>
@if ($type =='textarea')
    <textarea name="{{$name}}" id="{{$name}}" @class(['block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 p-6',$class]) rows="4"  placeholder="Ici votre petite desciption">{{old($name,$value)}}</textarea>
@else
<input type={{$type}} id={{$name}} name={{$name}} @class(["border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm",$class]) value="{{old($name,$value)}}"  >
@endif

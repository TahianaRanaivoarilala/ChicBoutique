@php
    $class??=null;
    $label=ucfirst($name);
    $name??='';
    $value??='';
@endphp
 <label @class(['inline-flex items-center cursor-pointer block font-medium text-sm text-gray-700 dark:text-gray-300 py-3',$class])>
    <input type="hidden" name="{{$name}}" value="0">
    <input  @checked(old($name,$value ??false)) type="checkbox" @class(['sr-only peer',$name]) value="1" name="{{$name}}" id="{{$name}}"   role="switch">
    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{$label}}</span>
  </label>

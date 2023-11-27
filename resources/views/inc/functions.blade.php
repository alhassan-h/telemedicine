
@php

function setName($val) {
    return ucwords($val);
}

function active($name){
    return $page_name === '$name';
}

@endphp
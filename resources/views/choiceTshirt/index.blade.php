@extends('layout')
@section('content')
        <div class="flex justify-center">
            
                <a href="{{ route('choiceTshirt.create') }}">
                <div class=" font-semibold mr-4 p-32 bg-fuchsia-200 hover:bg-fuchsia-300 rounded-lg">
                    <svg class="w-16"  viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5282 28.2974C23.1556 28.2974 28.5282 22.9248 28.5282 16.2974C28.5282 9.66995 23.1556 4.29736 16.5282 4.29736C9.90078 4.29736 4.5282 9.66995 4.5282 16.2974C4.5282 22.9248 9.90078 28.2974 16.5282 28.2974Z" stroke="rgb(249 250 251)" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M11.5282 16.2974H21.5282" stroke="rgb(249 250 251)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16.5282 11.2974V21.2974" stroke="rgb(249 250 251)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    </div>
                </a>
            

            <div class="p-36">
                <h2>Affichage d'un t-shirt </h2>
            </div>
        </div>
    </div>
@stop
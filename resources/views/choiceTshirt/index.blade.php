@extends('layout')
@section('content')
<div class="flex justify-center">

    <a href="{{ route('choiceTshirt.create') }}">
        <div class=" font-semibold mr-4 p-32 bg-fuchsia-200 hover:bg-fuchsia-300 rounded-lg">
            <svg class="w-16" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5282 28.2974C23.1556 28.2974 28.5282 22.9248 28.5282 16.2974C28.5282 9.66995 23.1556 4.29736 16.5282 4.29736C9.90078 4.29736 4.5282 9.66995 4.5282 16.2974C4.5282 22.9248 9.90078 28.2974 16.5282 28.2974Z" stroke="rgb(249 250 251)" stroke-width="2" stroke-miterlimit="10" />
                <path d="M11.5282 16.2974H21.5282" stroke="rgb(249 250 251)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.5282 11.2974V21.2974" stroke="rgb(249 250 251)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </a>

</div>
<div class="pt-8 px-36 grid gap-x-8 gap-y-4 grid-cols-4  ">
    @foreach($arrayOfTshirt as $oneTshirt)
  
        <div class=" font-semibold text-xl p-4 mx-2 w-80 h-80 text-white  bg-blue-200 hover:bg-blue-300 rounded-lg mb-2 bg-[url({{$oneTshirt -> urlimg}})]">
            <div class="flex justify-between  ">
                <p class=""> {{$oneTshirt -> title}}</p>
                <p> {{$oneTshirt -> type}}</p>
            </div>
            <div class="p-24  h-16">

            </div>
            <div class="pt-6  flex justify-between ">
               
                    <div>
                    <a href="{{ route('choiceTshirt.show', $oneTshirt) }}">
                        <svg class="w-10 hover:w-12" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 22C19.3137 22 22 19.3137 22 16C22 12.6863 19.3137 10 16 10C12.6863 10 10 12.6863 10 16C10 19.3137 12.6863 22 16 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M24.675 10.0875C24.976 10.5184 25.2394 10.9742 25.4625 11.45L28.7 13.25C29.1043 15.0606 29.1086 16.9376 28.7125 18.75L25.4625 20.55C25.2394 21.0259 24.976 21.4817 24.675 21.9125L24.7375 25.625C23.3655 26.8753 21.7416 27.8173 19.975 28.3876L16.7875 26.475C16.2632 26.5126 15.7369 26.5126 15.2125 26.475L12.0375 28.375C10.2654 27.8152 8.63615 26.8769 7.26254 25.625L7.32504 21.925C7.02662 21.4882 6.7633 21.0285 6.53754 20.55L3.30004 18.75C2.89578 16.9395 2.89152 15.0625 3.28754 13.25L6.53754 11.45C6.76064 10.9742 7.0241 10.5184 7.32504 10.0875L7.26254 6.37505C8.6346 5.12476 10.2585 4.1828 12.025 3.61255L15.2125 5.52505C15.7369 5.48754 16.2632 5.48754 16.7875 5.52505L19.9625 3.62505C21.7347 4.18492 23.3639 5.12324 24.7375 6.37505L24.675 10.0875Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </a>
                    </div>
                

                <form method="POST" action="{{ route('choiceTshirt.destroy', $oneTshirt) }}">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="X">

                </form>

            </div>
        </div>
  
    @endforeach
</div>
</div>
@stop
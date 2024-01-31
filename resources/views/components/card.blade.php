{{-- https://www.svgrepo.com/collection/mini-tiny-interface-icons/ --}}

@if($link != NULL)
    <a href="{{ $link }}" class="card"> 
@else
    <div class="card"> 
@endif
   <div>
        <div class="cardSVG">
            <svg fill="#d52020" width="184px" height="184px" viewBox="-266.24 -266.24 1044.48 1044.48" id="_02_Out" data-name="02 Out" xmlns="http://www.w3.org/2000/svg" stroke="#d52020">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier"> 
                    <g id="Group_7" data-name="Group 7"> 
                        {!! $svg !!} 
                    </g> 
                </g>
            </svg>
        </div>

        <h2>{{ $title }}</h2>

        <p>
            {{ $body }}
        </p>
    </div>

    {{ $slot }}
@if($link != NULL)
    </a>
@else
    </div>
@endif
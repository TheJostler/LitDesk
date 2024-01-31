<div class="hidden overlay" id="form-box-overlay">
    <div class="overlay-box scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"> 
        <div class="min-w-32">
            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
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
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white" id="formTitle">
                {!! $title !!}
            </h2>

            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed" id="formBody">
                {!! $body !!}
            </p>
        </div>
        <div class="ml-4" id="form">
            {{ $slot }}
        </div>
    </div>
</div>
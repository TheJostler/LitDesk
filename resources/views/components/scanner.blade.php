<div id="qrdemo" class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
    <h1 class="m-10 text-xl font-semibold">{{ $title }}</h1>
    <p>{{ $description }}</p>
    <div id="loadingMessage" class="p-6 text-center">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
    <canvas id="canvas" class="size-full mt-6" hidden></canvas>
</div>
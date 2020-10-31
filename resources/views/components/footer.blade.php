<footer class="flex flex-col justify-center items-center h-32 bg-teal-400">
    <div class="">
        <h3 class="text-xl">Made by <a class="text-white font-bold" href="https://jondelweb.com" target="_blank">JDW</a></h3>
    </div>

    <ul>
        @foreach ($pages as $page)
        <li><a class="grey-text text-lighten-3" href="{{ route('page', $page->slug) }}">{{ $page->title }}</a></li>
        @endforeach
    </ul>
</footer>
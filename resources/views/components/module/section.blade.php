<section class="module-section">

    @isset($title)

        <h2>

            {{ $title }}

        </h2>

    @endisset

    {{ $slot }}

</section>
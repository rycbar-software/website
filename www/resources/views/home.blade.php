<x-app-layout>
    <div class="parallax-wrapper">
        <div class="parallax">
            <section class="screen hero">
                <div class="hero__content font-raleway">
                    <h1 class="hero__title"><span class="hero__name">RYCBAR</span><span class="hero__text">Software maintenance & development</span></h1>
                </div>
            </section>
            <div class="screen pseudo"></div>
            <div class="relative bg-gray-100">
                <div class="sticky top-0 bg-white z-10">
                    @include('layouts.navigation')
                </div>
                <div class="container w-full md:max-w-5xl mx-auto py-20">
                    <section class="screen">
                        Who we are
                    </section>
                    <section class="screen">
                        Partners
                    </section>
                    <section class="screen">
                        Contacts
                    </section>
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
</x-app-layout>

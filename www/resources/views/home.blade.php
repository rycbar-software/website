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
                <div class="container w-full md:max-w-5xl mx-auto">
                    <section class="screen flex items-center border-b-2">
                        <div>
                            <h2 class="text-6xl font-raleway mb-10">Who we are</h2>
                            <div class="text-lg text-justify">
                                <p class="mb-3">
                                    Welcome to RYCBAR - your trusted partner for long-term software maintenance, refactoring, and development solutions.
                                </p>
                                <p class="mb-3">
                                    At RYCBAR, we are more than just a software company – we are your dedicated collaborators in enhancing, optimizing, and evolving your digital solutions. With a passion for innovation and a commitment to excellence, we have established ourselves as a leading force in the realm of software services.
                                </p>
                                <p>
                                    We are highly skilled and experienced professionals who thrive on transforming complex challenges into elegant solutions. Whether your software needs require meticulous maintenance, strategic refactoring, or ground-up development, we possess the expertise to turn your vision into reality. With a deep understanding of industry best practices and cutting-edge technologies, we are equipped to empower your business with software that stands the test of time.
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="screen flex items-center border-b-2">
                        <div>
                            <h2 class="text-6xl font-raleway mb-10">How we works</h2>
                            <div class="text-lg text-justify">
                                <p class="mb-3">
                                    At RYCBAR, our approach is centered around your long-term success. We believe that building and maintaining exceptional software requires a strategic partnership, and that's exactly what we offer. Our transparent and collaborative process ensures that your software remains resilient, up-to-date, and aligned with your evolving business goals.
                                </p>
                                <p class="mb-3">
                                    We understand the importance of financial planning and will works with you to establish a flexible budget that suits your requirements. Whether you prefer a monthly or yearly budget, we ensure that you have complete visibility into how your investment is being utilized.
                                </p>
                                <p>
                                    Our commitment extends beyond just initial development. We offer robust long-term maintenance solutions to ensure your software remains secure, efficient, and up-to-date. With regular updates and proactive monitoring, we safeguard your software's performance and usability.
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="screen flex items-center border-b-2">
                        <div>
                            <h2 class="text-6xl font-raleway mb-10">Contact us</h2>
                            @include('feedback.form')
                        </div>
                    </section>
                    <section class="screen flex items-center">
                        <div>
                            <h2 class="text-6xl font-raleway mb-10">Our partners</h2>
                        </div>
                    </section>
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
</x-app-layout>
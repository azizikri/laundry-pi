<x-app-layout>
    <section class="contact relative z-1 py-12 lg:py-20">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-7xl">
            <div class="mb-8 lg:mb-12">
                <h1 class="text-center">Contact Us</h1>
            </div>

            <div class="grid grid-cols-12 gap-y-8 lg:gap-12">
                <div class="col-span-12 lg:col-span-6">
                    <dl class="details-list details-list--rows">
                        <div class="details-list__item py-5 lg:py-8 lg:flex lg:justify-between">
                            <dt class="font-bold mb-1.5 lg:mb-0">Alamat</dt>
                            <dd class="leading-snug lg:text-right">
                                Jalan Supratno <br>Cibinong <br>Bogor, Indonesia
                            </dd>
                        </div>

                        <div class="details-list__item py-5 lg:py-8 lg:flex lg:justify-between">
                            <dt class="font-bold mb-1.5 lg:mb-0">Email</dt>
                            <dd>
                                <a href="mailto:webmaster@example.com">laundry@gmail.com</a>
                            </dd>
                        </div>

                        <div class="details-list__item py-5 lg:py-8 lg:flex lg:justify-between">
                            <dt class="font-bold mb-1.5 lg:mb-0">Nomor Telepon</dt>
                            <dd class="leading-snug lg:text-right">
                                <p><a href="tel:+62 812 9012 1313">+62 812 9012 1313</a></p>
                                <p class="text-contrast-medium">Sen - Jum, 09:00 - 17:00</p>
                            </dd>
                        </div>
                    </dl>
                </div>

                <div role="application"
                    class="google-maps rounded col-span-12 lg:col-span-6 lg:h-auto lg:pb-0 js-google-maps"
                    data-coordinates="51.5658015,-0.40339">
                    <!-- Google Map -->
                </div>
            </div>
        </div>
    </section>
    <!--
        ⚠️ Make sure to include the Google Maps script right before your page body closing tag
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initGoogleMap"></script>
        Replace 'YOUR_API_KEY' with your google maps API key
      -->

    @push('scripts')
        <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initGoogleMap"></script>
    @endpush
</x-app-layout>

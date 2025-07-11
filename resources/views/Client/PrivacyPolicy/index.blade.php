@extends('Client.layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/client-styles/about-us.css') }}">

    <div class="tnt-container aboutus-page text-2xl sm:text-3xl md:text-5xl">
        <h1 class="font-playfair aboutus-title ">Privacy Policy</h1>
        <p class="aboutus-desc">
            Namaste! Welcome to Trail Nepal Treks! Based in Kathmandu, Nepal, we specialize in
            unforgettable Himalayan trekking and travel experiences. With years of expertise, we are
            committed to providing safe, sustainable, and enriching adventures for explorers worldwide.
        </p>
        <img class="aboutus-cover" src="{{ asset('assets/images/client/us.jpg') }}" alt="About Trail Nepal Treks">
        <div class="aboutus-info-container">
            <div class="row">
                <div class="offset-md-0 offset-lg-3 col-md-12 col-lg-6 my-4">
                    <h2 class="font-playfair">Know us better</h2>
                    <p>We, Trail Nepal Treks is a trusted trekking company offering expertly crafted trekking, hiking,
                        and cultural tours in Nepal. With years of experience, we specialize in safe, immersive, and
                        well-organized adventures in the Himalayas. Whether you're a solo traveler, part of a group, or
                        looking for a luxury trekking experience, we ensure a memorable and rewarding journey.</p>

                    <strong class="font-playfair aboutus-subheading">Why Choose Trail Nepal Treks?</strong>
                    <ul class="list-unstyled">
                        <li>✅ Experienced &amp; Licensed Guides – Our expert team ensures safe and enriching journeys.</li>
                        <li> ✅ Customized Trekking Packages – Tailor-made itineraries to suit your adventure style.</li>
                        <li> ✅ Sustainable Tourism – We practice responsible trekking, supporting local communities.
                        </li>
                        <li> ✅ Safety-First Approach – Proper altitude acclimatization and 24/7 support.</li>
                        <li> ✅ Competitive Pricing – Best value treks with no hidden costs.</li>
                    </ul>
                    <strong class="font-playfair aboutus-subheading">Our Mission</strong>
                    <p>
                        To deliver exceptional trekking experiences while promoting responsible tourism, preserving the
                        natural beauty of the Himalayas, and supporting local communities.
                    </p>

                    <strong class="font-playfair aboutus-subheading">Why Choose Trail Nepal Treks?</strong>
                    <ul>
                        <li>
                            Expert Guides: Our team of experienced, English-speaking guides and porters
                            are trained to ensure your safety and comfort throughout the trek.
                        </li>
                        <li>
                            Tailored Itineraries: We offer customizable trekking packages to suit your
                            preferences, fitness level, and schedule.
                        </li>
                        <li>
                            Eco-Friendly Practices: We are committed to minimizing our environmental
                            impact by promoting sustainable trekking practices and supporting local conservation
                            efforts.
                        </li>
                        <li>
                            Cultural Immersion: Our treks are designed to provide authentic cultural
                            experiences, allowing you to connect with the local Sherpa communities and their traditions.
                        </li>
                        <li>
                            Safety First: Your safety is our top priority. We provide comprehensive
                            support, including altitude sickness management, emergency evacuation plans, and
                            well-maintained equipment.
                        </li>
                    </ul>

                    <strong class="font-playfair aboutus-subheading">Our Commitment to Responsible Travel</strong>
                    <p>
                        We believe in giving back to the communities and environments that make
                        our adventures possible.
                    </p>
                    <ul>
                        <li>Follow eco-friendly practices, such as using kerosene for cooking and discouraging
                            wood-fuelled hot showers.</li>
                        <li>Carry back non-biodegradable waste to maintain the pristine beauty of the Himalayas.</li>
                        <li>Support local communities by employing Sherpa guides and porters and promoting fair wages.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="aboutus-newsletter-container tnt-container">
        <x-news-letter></x-news-letter>
    </div>
@endsection
@php
    // Set SEO variables
    $title = 'Privacy Policy - Trail Nepal Treks';
@endphp

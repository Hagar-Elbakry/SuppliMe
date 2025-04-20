<x-head>
    <link rel="stylesheet" href="/assets/css/contact-us.css" />
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Contact Us</h1>
    <x-header href="/contact">Contact Us</x-header>
</div>
<div class="contact">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-6">
                <div class="contact-form">
                    <form>
                        <x-contact-label>
                            <x-slot:name>
                                Name *
                            </x-slot:name>
                            <x-contact-input type="text" placeholder="e.g. John"/>
                        </x-contact-label>

                        <x-contact-label>
                            <x-slot:name>
                               Phone *
                            </x-slot:name>
                            <x-contact-input type="tel" placeholder="Enter Phone Number"/>
                        </x-contact-label>
                        <x-contact-label>
                            <x-slot:name>
                                Email *
                            </x-slot:name>
                            <x-contact-input type="email" placeholder="example@gmail.com"/>
                        </x-contact-label>

                        <div class="mb-3">
                            <label class="form-label">Your Message *</label>
                            <textarea class="form-control" rows="4" placeholder="Enter your message here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom text-light rounded-pill">Send a Message</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 contact-image text-center">
                <img src="/assets/imgs/New folder/Mask group.png" class="img-fluid" alt="Shopping woman with phone">
            </div>
        </div>
    </div>

</div>

<x-footer/>
</x-head>

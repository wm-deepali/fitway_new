@extends('layouts.app')

@section('title', 'Faqs | Fitway')
@section('meta_description', 'Find answers to common questions about Fitway gym equipment, fitness solutions and complete gym setup services.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/faqs/faqs.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
            <img src="{{ asset('assets/images/home/faq-banner.jpg') }}"/>

            <nav class="breadcrumb left breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>

                    <li>
                        <a href="{{ route('faqs') }}" class="active">FAQs</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>Frequently Asked Questions.</h1>

                        <p>
                            Find answers to common questions about our gym equipment,
                            fitness solutions and complete gym setup services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-secA">
        <div class="container">
            <div class="heading">
                <span class="label">Need Help?</span>
                <h3>Everything You <span>Need to Know.</span></h3>
                <p>
                    From choosing the right equipment to planning a complete fitness
                    space, find answers to the questions we hear most often.
                </p>
            </div>
        </div>
    </section>

   <section class="faq-secB">
    <div class="container">

        <!-- Products & Equipment -->
        <div class="faq-group">
            <h5 class="faq-group__title">Products &amp; Equipment</h5>

            <div class="accordion-wrapper">

                <div class="accordion-item active">
                    <div class="accordion-header">
                        <h4>What types of gym equipment does Fitway offer?</h4>
                        <span class="accordion-icon">−</span>
                    </div>
                    <div class="accordion-content" style="display: block">
                        <p>
                            Fitway offers a wide range of fitness equipment, including
                            treadmills, exercise bikes, strength machines, free weights,
                            benches, racks, functional training equipment and accessories.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you provide equipment for commercial gyms?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We supply professional fitness equipment suitable for
                            commercial gyms, fitness centres, studios, hotels, clubs and
                            other high-use training spaces.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can I buy equipment for a home gym?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We offer a variety of equipment for home workout spaces,
                            from compact cardio machines to strength equipment and complete
                            home gym solutions.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you offer cardio equipment?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. Our cardio range includes treadmills, exercise bikes,
                            cross trainers and other equipment designed for endurance and
                            cardiovascular training.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you provide strength training equipment?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We offer a variety of strength equipment, including
                            selectorized machines, plate-loaded equipment, benches, racks,
                            dumbbells and other training essentials.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can you help me choose the right equipment?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Absolutely. Our team can recommend suitable equipment based on
                            your available space, training requirements, expected usage and
                            budget.
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <!-- Gym Setup Services -->
        <div class="faq-group">
            <h5 class="faq-group__title">Gym Setup Services</h5>

            <div class="accordion-wrapper">

                <div class="accordion-item active">
                    <div class="accordion-header">
                        <h4>Do you provide complete gym setup services?</h4>
                        <span class="accordion-icon">−</span>
                    </div>
                    <div class="accordion-content" style="display: block">
                        <p>
                            Yes. Fitway can assist with the complete setup process, from
                            understanding your space and selecting equipment to delivery,
                            installation and final arrangement.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can you help with gym layout and space planning?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We help plan equipment placement and workout zones to make
                            the best use of your available space while keeping the layout
                            practical and comfortable.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you handle equipment installation?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. Our team can handle equipment installation and positioning
                            to ensure your gym setup is properly arranged and ready for use.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you set up gyms for new businesses?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We work with new gym owners and fitness businesses to help
                            plan and equip their facilities according to their space and
                            business requirements.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can you upgrade an existing gym?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We can help upgrade your existing fitness space by adding
                            new equipment, replacing older machines or improving the overall
                            equipment layout.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>What is included in a complete gym setup?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Depending on your requirements, a complete setup may include
                            equipment selection, space planning, delivery, installation and
                            arrangement of the final workout area.
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <!-- Custom Gym Solutions -->
        <div class="faq-group">
            <h5 class="faq-group__title">Custom Gym Solutions</h5>

            <div class="accordion-wrapper">

                <div class="accordion-item active">
                    <div class="accordion-header">
                        <h4>Can you create a gym package based on my budget?</h4>
                        <span class="accordion-icon">−</span>
                    </div>
                    <div class="accordion-content" style="display: block">
                        <p>
                            Yes. We can recommend a practical equipment package based on
                            your budget, available space and the type of training you want
                            your facility to support.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can I customise my gym equipment package?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. Equipment packages can be tailored based on your space,
                            training requirements, target users and budget.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you provide outdoor fitness solutions?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We provide outdoor fitness equipment suitable for parks,
                            residential communities, schools and other open fitness spaces.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can you set up a gym in a small space?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We can recommend space-efficient equipment and layouts to
                            help create a functional workout area even in compact spaces.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you provide solutions for apartments and societies?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. We can provide fitness equipment and setup solutions for
                            residential gyms, apartment communities and shared fitness
                            spaces.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>What information do you need to plan a gym?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            We generally need details about your available space, intended
                            users, training requirements, preferred equipment and estimated
                            budget.
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <!-- Orders & Support -->
        <div class="faq-group">
            <h5 class="faq-group__title">Orders &amp; Support</h5>

            <div class="accordion-wrapper">

                <div class="accordion-item active">
                    <div class="accordion-header">
                        <h4>How can I enquire about a product or gym setup?</h4>
                        <span class="accordion-icon">−</span>
                    </div>
                    <div class="accordion-content" style="display: block">
                        <p>
                            You can contact Fitway through our enquiry form and share your
                            requirements. Our team will get back to you with suitable
                            options and guidance.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can I enquire about multiple products at once?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. You can share a list of the products you are interested in
                            or simply tell us about your complete requirement.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you provide equipment delivery?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Delivery options depend on the product and location. Our team
                            can provide the relevant delivery details when you enquire.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Can I get assistance before placing an order?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Yes. Our team can help you understand the available options and
                            choose equipment that best matches your requirements.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Do you offer support after installation?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            You can contact our team for assistance related to your equipment
                            or setup. The available support may depend on the product and
                            service requirements.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>How do I get started with Fitway?</h4>
                        <span class="accordion-icon">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Simply share your requirements with us. Whether you need a
                            single piece of equipment or a complete fitness space, our team
                            will guide you through the next steps.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

    <section class="faq-secC">
        <div class="container">
            <div class="faq-secC__box">
                <h3>Still Have Questions?</h3>
                <p>
                    Our team is here to help you find the right equipment and fitness
                    solution for your space.
                </p>

                <div class="faq-secC__btns">
                    <a href="{{ route('contact-us') }}" class="btn btn-primary">Contact Us</a>
                    <a
                        href="javascript:void(0)"
                        data-model=".enquire-pop"
                        class="btn btn-outline-white"
                        >Enquire Now</a
                    >
                </div>
            </div>
        </div>
    </section>

@endsection
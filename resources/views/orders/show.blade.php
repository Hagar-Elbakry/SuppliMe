<x-head>
    <link rel="stylesheet" href="/assets/css/treack-order.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/myorders.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Order Status</h1>
    <x-header>Order Status</x-header>
</div>
<div class="status">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-9">
                <div class="status-body">
                    <div class="status-title">
                        <h5>Order Status</h5>
                        <p>Order Id : #EJFJ64656HFD</p>
                    </div>
                    <div
                        class="tracking-container d-flex flex-column align-items-stretch py-2 px-5 border border-1 rounded-5"
                    >
                        <div class="d-flex justify-content-between pt-3">
                            <x-order-status>Order Placed</x-order-status>
                            <x-order-status>Accepted</x-order-status>
                            <x-order-status>In Progress</x-order-status>
                            <x-order-status>On the Way</x-order-status>
                            <x-order-status>Delivered</x-order-status>

                        </div>
                        <div class="order-tracker mt-5 text-center">
                            <div
                                class="d-flex justify-content-center align-items-center gap-2 mb-4"
                                id="tracker"
                            >
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                            </div>
                        </div>
                        <div class="expected-date d-flex justify-content-end">
                            <p class="text-black-50">Expected</p>
                            <p class="text-black-50">16 July 2025</p>
                        </div>
                    </div>
                </div>
            </div>

           @include('_order')
        </div>
    </div>
</div>
<x-footer/>
<script>
    const steps = document.querySelectorAll("#tracker .badge");
    const bars = document.querySelectorAll("#tracker .flex-fill");
    const btn = document.getElementById("nextStep");
    let currentStep = 0;

    btn.addEventListener("click", () => {
        if (currentStep < steps.length) {
            steps[currentStep].classList.remove("bg-secondary");
            steps[currentStep].classList.add("bg-success");

            if (currentStep > 0) {
                bars[currentStep - 1].classList.remove("bg-secondary");
                bars[currentStep - 1].classList.add("bg-success");
            }

            currentStep++;
        } else {
            btn.disabled = true;
            btn.innerText = "Completed";
        }
    });
</script>
</x-head>

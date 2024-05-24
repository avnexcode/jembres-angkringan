<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid grid-cols-1 gap-0">
        <div class="card cart rounded-t-xl">
            <label
                class="title w-full h-10 relative flex items-center pl-5 border-b border-[rgba(16,86,82,0.75)]
                      font-bold text-sm text-black">
                CHECKOUT
            </label>
            <div class="steps flex flex-col p-5">
                <div class="step grid gap-2.5">
                    <div>
                        <span class="text-sm font-semibold text-black mb-2 block">SHIPPING</span>
                        <p class="text-xs font-semibold t
                        ext-black">221B Baker Street, W1U 8ED</p>
                        <p class="text-xs font-semibold text-black">London, United Kingdom</p>
                    </div>
                    <hr class="h-px bg-[rgba(16,86,82,0.75)] border-none">
                    <div>
                        <span class="text-sm font-semibold text-black mb-2 block">PAYMENT METHOD</span>
                        <p class="text-xs font-semibold text-black">Visa</p>
                        <p class="text-xs font-semibold text-black">**** **** **** 4243</p>
                    </div>
                    <hr class="h-px bg-[rgba(16,86,82,0.75)] border-none">
                    <div class="promo">
                        <span class="text-sm font-semibold text-black mb-2 block">HAVE A PROMO CODE?</span>
                        <form class="form grid grid-cols-[1fr_80px] gap-2.5 p-0">
                            <input type="text" placeholder="Enter a Promo Code"
                                class="input_field w-auto h-9 p-0 pl-3 rounded-md outline-none border border-[rgb(16,86,82)]
                          bg-[rgb(251,243,228)] transition-all duration-300 ease-[cubic-bezier(0.15,0.83,0.66,1)]
                          focus:border-transparent focus:shadow-[0_0_0_2px_rgb(251,243,228)]
                          focus:bg-[rgb(201,193,178)]" />
                            <button
                                class="flex flex-row justify-center items-center w-full h-9 bg-[rgba(16,86,82,0.75)]
                          shadow-[0px_0.5px_0.5px_#F3D2C9,0px_1px_0.5px_rgba(239,239,239,0.5)]
                          rounded-md border-0 font-semibold text-sm text-black">
                                Apply
                            </button>
                        </form>
                    </div>
                    <hr class="h-px bg-[rgba(16,86,82,0.75)] border-none">
                    <div class="payments">
                        <span class="text-sm font-semibold text-black mb-2 block">PAYMENT</span>
                        <div class="details grid grid-cols-[10fr_1fr] p-0 gap-1.25">
                            <span class="text-xs font-semibold text-black m-auto m-auto-0">Subtotal:</span>
                            <span class="text-sm font-semibold text-black m-auto m-auto-0">$240.00</span>
                            <span class="text-xs font-semibold text-black m-auto m-auto-0">Shipping:</span>
                            <span class="text-sm font-semibold text-black m-auto m-auto-0">$10.00</span>
                            <span class="text-xs font-semibold text-black m-auto m-auto-0">Tax:</span>
                            <span class="text-sm font-semibold text-black m-auto m-auto-0">$30.40</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card checkout rounded-b-xl">
            <div class="footer flex items-center justify-between p-2.5 p-2.5 p-5 bg-[rgba(16,86,82,0.5)]">
                <label class="price text-2xl font-black text-[#2B2B2F]">$280.40</label>
                <button
                    class="checkout-btn flex flex-row justify-center items-center w-[150px] h-9 bg-[rgba(16,86,82,0.55)]
                          shadow-[0px_0.5px_0.5px_rgba(16,86,82,0.75),0px_1px_0.5px_rgba(16,86,82,0.75)]
                          rounded-md border border-[rgb(16,86,82)] text-sm font-semibold text-black
                          transition-all duration-300 ease-[cubic-bezier(0.15,0.83,0.66,1)]">
                    Checkout
                </button>
            </div>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>

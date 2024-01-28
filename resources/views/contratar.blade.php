<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contratar') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="card-body bg-white">

            <form id="payment-form" action="{{ route('plan.create') }}" method="POST">
                @csrf
                <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                <div id="card-element"></div>
                <input type="text" name="name" id="card-holder-name" class="form-control" value=""
                    placeholder="Name on the card">
                <button type="submit" class="btn btn-primary" id="card-button"
                    data-secret="{{ $intent->client_secret }}">Purchase</button>


            </form>

        </div>

    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name')
        const cardButton = document.getElementById('card-button')
        const form = document.getElementById('payment-form')
        form.addEventListener('submit', async (e) => {
            e.preventDefault()
        })
    </script>

    @if ($plan->slug == 'unico')
        <script>
            alert('unico')
            cardButton.addEventListener('click', async (e) => {
                const {
                    paymentMethod,
                    error
                } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                );

                if (error) {
                    console.log(error)
                } else {
                    console.log(paymentMethod.id)

                    // Crear un nuevo elemento de entrada
                    var input = document.createElement("input");

                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", "paymentMethodId");
                    input.setAttribute("value", paymentMethod.id);
                    let contrato = document.createElement('input')
                    contrato.setAttribute('type', 'text')
                    contrato.setAttribute('name', 'contrato')
                    contrato.setAttribute('value', 'unico')
                    form.appendChild(contrato)
                    form.appendChild(input);
                    form.submit();
                }
            });
        </script>

    @else
        <script>
            alert('suscription')

            cardButton.addEventListener('click', async (e) => {
                cardButton.disabled = true
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    cardButton.dataset.secret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                )

                if (error) {
                    cardButton.disable = false
                } else {
                    let token = document.createElement('input')
                    token.setAttribute('type', 'hidden')
                    token.setAttribute('name', 'token')
                    token.setAttribute('value', setupIntent.payment_method)
                    let contrato = document.createElement('input')
                    contrato.setAttribute('type', 'text')
                    contrato.setAttribute('name', 'contrato')
                    contrato.setAttribute('value', 'suscription')
                    form.appendChild(contrato)
                    form.appendChild(token)
                    form.submit();
                }
            })
        </script>
    @endif
</x-app-layout>

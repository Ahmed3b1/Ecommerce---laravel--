// This is your test publishable API key.
const stripe = Stripe(config('stripe.api_key.public'));

initialize();

// Create a Checkout Session
async function initialize() {
  const fetchClientSecret = async () => {
    const response = await fetch("/pay", {
      method: "POST",
      headers: { "Content-Type": "application/json" }
    });
    const { clientSecret } = await response.json();
    return clientSecret;
  };

  const checkout = await stripe.initEmbeddedCheckout({
    fetchClientSecret,
  });

  // Mount Checkout
  checkout.mount('#checkout');
}
<x-layout>
    <div class="faq-page">
        <div class="h2text">
            <!-- Voeg hier eventueel andere inhoud toe -->
        </div>
        <div class="main-content">
            <section class="faq-section">
                <h1>
                    <span class="frequently">Frequently</span>
                    <span class="asked">Asked</span>
                    <span class="questions">Questions</span>
                </h1>
                <div class="faq-item">
                    <h3>Wat is de levertijd?</h3>
                    <p>Onze levertijd is doorgaans 3-5 werkdagen.</p>
                </div>
                <div class="faq-item">
                    <h3>Hoe kan ik een retour aanvragen?</h3>
                    <p>U kunt een retour aanvragen via onze retourpagina.</p>
                </div>
                <div class="faq-item">
                    <h3>Wat zijn de verzendkosten?</h3>
                    <p>De verzendkosten zijn €5,99 voor bestellingen onder de €50.</p>
                </div>
                <div class="faq-item">
                    <h3>Kan ik mijn bestelling annuleren?</h3>
                    <p>Ja, u kunt uw bestelling annuleren zolang deze nog niet is verzonden.</p>
                </div>
                <div class="faq-item">
                    <h3>Hoe kan ik betalen?</h3>
                    <p>Wij accepteren betalingen via iDEAL, creditcard en PayPal.</p>
                </div>
                <div class="faq-item">
                    <h3>Wat moet ik doen als ik een defect product ontvang?</h3>
                    <p>Neem contact op met onze klantenservice voor een vervangend product.</p>
                </div>
                <!-- Voeg meer FAQ-items toe zoals nodig -->
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Selecteer alle FAQ-item koppen
            document.querySelectorAll('.faq-item h3').forEach(item => {
                item.addEventListener('click', () => {
                    const parent = item.parentElement;
                    parent.classList.toggle('open'); // Toggle de 'open' klasse
                    const content = parent.querySelector('p');
                    if (content) {
                        content.style.display = content.style.display === 'block' ? 'none' : 'block'; // Toggle de zichtbaarheid van de paragraaf
                    }
                });
            });
        });
    </script>
</x-layout>

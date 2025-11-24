<x-general.layout>

    <x-slot name="payment_process_style">
        @vite(['resources/css/payment_process_style.css'])
    </x-slot>

    <x-slot name="payment_process_script">
        @vite(['resources/js/payment_process_script.js'])
    </x-slot>

    <x-slot name="payment_process_main">
        <form action="" method="post">
            <div class="payment-section">
                <h2>Proceso de Pago</h2>
                <div class="form-field">
                    <label for="card_type">Tipo de tarjeta</label>
                    <select id="card_type" name="card_type" required>
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="American Express">American Express</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="card_owner">Propietario</label>
                    <input id="card_owner" name="card_owner" type="text" required>
                </div>
                <div class="form-field">
                    <label for="card_number">Número</label>
                    <input id="card_number" name="card_number" type="text" maxlength="16" required>
                </div>
                <div class="row-form-fields">
                    <div class="form-field">
                        <label for="card_expiration">Expiración</label>
                        <input id="card_expiration" name="card_expiration" type="text" maxlength="5" placeholder="MM/AA" required>
                    </div>
                    <div class="form-field">
                        <label for="card_cvv">CVV</label>
                        <input id="card_cvv" name="card_cvv" type="text" maxlength="3" required>
                    </div>
                </div>
                <div class="pay-button">
                    <button type="submit" name="pay" class="small-button">Pagar</button>
                </div>
            </div>
        </form>
    </x-slot>

</x-general.layout>
